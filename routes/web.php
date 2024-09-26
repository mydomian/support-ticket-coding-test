<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\TicketController as AdminTicketController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use Illuminate\Support\Facades\Route;


//admin route
Route::get('/admin', fn() => redirect()->route('admin.login'));
Route::match(['get','post'],'/admin/login', [AuthController::class,'admin_login'])->name('admin.login');
Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('admin-tickets',[AdminTicketController::class,'index'])->name('admin.tickets');
    Route::get('ticket-status/{id}',[AdminTicketController::class,'status'])->name('admin.ticket.status');
    Route::get('/admin-logout',[AuthController::class,'admin_logout'])->name('admin.logout');
});

// user route
Route::get('/', fn() => redirect()->route('login'));
Route::match(['get','post'],'/login', [AuthController::class,'login'])->name('login');
Route::middleware(['auth'])->group(function () {
    Route::resource('tickets',TicketController::class);
    Route::get('tickets-delete/{id}',[TicketController::class,'destroy'])->name('ticket.destroy');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});


