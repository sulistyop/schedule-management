<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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

Auth::routes();

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('register', [\App\Http\Controllers\CustomRegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [\App\Http\Controllers\CustomRegisterController::class, 'register']);
Route::get('login', [\App\Http\Controllers\CustomLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\CustomLoginController::class, 'login']);
Route::post('logout', [\App\Http\Controllers\CustomLoginController::class, 'logout'])->name('logout');

Route::get('schedule', [\App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule.index');
Route::get('schedule/create', [\App\Http\Controllers\ScheduleController::class, 'create'])->name('schedule.create');
Route::get('schedule/show/{id}', [\App\Http\Controllers\ScheduleController::class, 'show'])->name('schedule.show');
Route::post('schedule', [\App\Http\Controllers\ScheduleController::class, 'store'])->name('schedule.store');
Route::get('schedule/edit/{id}', [\App\Http\Controllers\ScheduleController::class, 'edit'])->name('schedule.edit');
Route::post('schedule/{schedule}', [\App\Http\Controllers\ScheduleController::class, 'update'])->name('schedule.update');
Route::delete('schedule/destroy/{id}', [\App\Http\Controllers\ScheduleController::class, 'destroy'])->name('schedule.destroy');
