<?php
use App\Http\Controllers\ClientFeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerRequestsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/client-feedback', [ClientFeedbackController::class, 'index'])->name('client-feedback.index');
    Route::post('/submit-feedback', [ClientFeedbackController::class, 'submit'])->name('client-feedback.submit');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/manager-requests', [ManagerRequestsController::class, 'index'])->name('manager-requests.index');
    Route::put('/manager-requests/{feedback}/mark-responded', [ManagerRequestsController::class, 'markAsResponded'])->name('manager-requests.mark-responded');
});
