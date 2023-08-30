<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class ManagerRequestsController extends Controller
{

    /**
     * ManagerRequestsController constructor.
     */
    public function __construct()
    {
        $this->middleware('role:manager');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $requests = Feedback::all(); // Получаем все заявки

        return view('manager-requests.index', compact('requests'));
    }

    /**
     * @param Request $request
     * @param Feedback $feedback
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAsResponded(Request $request, Feedback $feedback)
    {
        $feedback->update(['is_responded' => true]);

        return redirect()->route('manager-requests.index')->with('success', 'Заявка успешно отмечена как отвеченная.');
    }
}
