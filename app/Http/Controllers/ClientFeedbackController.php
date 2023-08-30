<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewFeedbackNotification;
use Illuminate\Support\Facades\Notification;

class ClientFeedbackController extends Controller
{
    /**
     * ClientFeedbackController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the client feedback form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Submit client feedback.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(Request $request)
    {
        $user = Auth::user();

        // Проверяем, прошло ли уже 24 часа с момента последней отправки
        if ($user->last_submitted_at && Carbon::parse($user->last_submitted_at)->diffInHours(Carbon::now()) < 24) {
            return redirect()->route('client-feedback.index')->with('error', 'Вы можете отправить заявку не чаще чем раз в сутки.');
        }

        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'attachment_link' => 'url|nullable',
        ]);

        // Создаем новую заявку
        $feedback = $user->feedbacks()->create([
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'attachment_link' => $request->input('attachment_link'),
        ]);
        $managerEmail = 'manager@example.com';
        $managerUser = User::where('email', $managerEmail)->first(); // Получите объект пользователя менеджера
        // Добавляем задание в очередь на отправку электронной почты
        Notification::send($managerUser, new NewFeedbackNotification($feedback));

        // Обновляем время последней отправки
        $user->update(['last_submitted_at' => Carbon::now()]);

        return redirect()->route('client-feedback.index')->with('success', 'Заявка успешно отправлена.');
    }
}
