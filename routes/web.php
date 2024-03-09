<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPWController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPWController;
use App\Http\Controllers\EventController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class, 'index']);
Route::get('/event/{event_id}', [DetailsController::class, 'index']);

// auth
Route::middleware('guest')->group(function () {
    // login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    // register
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    // forgot pw
    Route::get('/forgot-password', [ForgotPWController::class, 'index'])->name('password.forgot');
    Route::post('/forgot-password', [ForgotPWController::class, 'send_reset_link']);
    // reset pw
    Route::get('/reset-password/{token}', [ResetPWController::class, 'index'])->name('password.reset');
    Route::post('/reset-password', [ResetPWController::class, 'reset_pw'])->name('reset_pw');
});

// logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::post('/reserve_ticket/{event_id}', [TicketController::class, 'reserve_ticket']);
    Route::post('/event/create', [EventController::class, 'create']);

    Route::middleware('role:Admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::put('/valid_event/{event_id}', [EventController::class, 'valid']);
        Route::put('/update_user_role/{user_id}', [UserController::class, 'update_role']);
        Route::delete('/delete_user/{user_id}', [UserController::class, 'delete_user']);
        // category mng
        Route::post('/category/create', [CategoryController::class, 'create']);
        Route::delete('/category/{category_id}/destroy', [CategoryController::class, 'destroy']);
        Route::put('/category/update', [CategoryController::class, 'update']);
    });

    Route::middleware('role:Admin|Organizer')->group(function () {
        Route::put('/not_valid_event/{event_id}', [EventController::class, 'not_valid']);
        Route::get('/my/events', [EventController::class, 'my_events']);
        Route::get('/event/{event_id}/edit', [EventController::class, 'edit']);
        Route::put('/event/{event_id}/update', [EventController::class, 'update']);
        Route::put('/ticket/{ticket_id}/approve', [TicketController::class, 'approve']);
        Route::delete('/ticket/{ticket_id}/deny', [TicketController::class, 'deny']);
    });
});
