<?php

use App\Http\Controllers\ImpersonationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/createUser', function () {
    Artisan::call('db:seed');
    return redirect()->route('users.index')->with('success', 'User created successfully');
})->name('createusers');


Route::controller(ImpersonationController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('home')->middleware('auth');
    Route::get('/impersonate/{user}', 'impersonate')->name('impersonate');
    Route::get('/stop-impersonating', 'stopImpersonating')->name('stop-impersonating');
});
Route::resource('users', UserController::class)->middleware('guest');
Route::controller(NotificationController::class)->group(function () {
    Route::get('/notification-read/{id}/update', 'markAsRead')->name('notification.read');
    Route::get('/notifications', 'index')->name('notifications.index')->middleware('guest');
    Route::get('/notifications/create', 'create')->name('notifications.create')->middleware('guest');
    Route::post('/notifications/store', 'sendNotification')->name('notifications.store')->middleware('guest');
    Route::get('notifications/changeStatus', 'changeStatus')->middleware('guest');
});
