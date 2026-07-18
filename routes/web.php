<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Demo\ReservationController;
use App\Http\Controllers\Demo\Admin\{AuthController as AdminAuthController, DashboardController, ReservationController as AdminReservationController, ServiceController as AdminServiceController, StaffController as AdminStaffController, ScheduleController, BlockedTimeController};

Route::view('/', 'home')->name('home');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');
Route::view('/old', 'welcome')->name('old');

Route::view('/demo', 'demo')->name('demo');
Route::view('/demo2', 'demo2')->name('demo2');

Route::prefix('demo/reservation')->name('demo.reservation.')->group(function () {
    Route::get('/', [ReservationController::class, 'index'])->name('index');
    Route::get('/staffs/{service}', [ReservationController::class, 'staffs'])->name('staffs');
    Route::get('/slots', [ReservationController::class, 'slots'])->name('slots');
    Route::post('/confirm', [ReservationController::class, 'confirm'])->name('confirm');
    Route::post('/complete', [ReservationController::class, 'store'])->name('store');
    Route::get('/complete', [ReservationController::class, 'complete'])->name('complete');
});

Route::prefix('demo/admin')->name('demo.admin.')->group(function(){
    Route::middleware('guest')->group(function(){Route::get('/login',[AdminAuthController::class,'create'])->name('login');Route::post('/login',[AdminAuthController::class,'store'])->name('login.store');});
    Route::middleware('auth')->group(function(){
        Route::post('/logout',[AdminAuthController::class,'destroy'])->name('logout'); Route::get('/',DashboardController::class)->name('dashboard');
        Route::resource('reservations',AdminReservationController::class)->except('destroy'); Route::patch('reservations/{reservation}/status',[AdminReservationController::class,'status'])->name('reservations.status');
        Route::resource('services',AdminServiceController::class)->only(['index','store','update','destroy']); Route::resource('staffs',AdminStaffController::class)->only(['index','store','update','destroy']);
        Route::get('schedules',[ScheduleController::class,'index'])->name('schedules.index'); Route::put('schedules/business',[ScheduleController::class,'business'])->name('schedules.business'); Route::put('schedules/staff/{staff}',[ScheduleController::class,'staff'])->name('schedules.staff');
        Route::resource('blocks',BlockedTimeController::class)->only(['index','store','destroy']);
    });
});
