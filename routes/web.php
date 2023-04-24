<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\Auth\ForgetPasswordController;
use App\Http\Controllers\User\Auth\ResetPasswordController;
use App\Http\Controllers\User\DashboardController;

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

Route::get('user/login', [LoginController::class, 'showLoginForm'])->name('user.login');
Route::post('user/login', [LoginController::class, 'login'])->name('user.login.submit');


Route::get('user/login', [RegisterController::class, 'showForm'])->name('user.register');
Route::post('user/login', [RegisterController::class, 'register'])->name('user.register.submit');


Route::get('user/password/reset', [ForgetPasswordController::class, 'showLinkRequestForm'])->name('user.password.request');
Route::post('user/password/email', [ForgetPasswordController::class, 'sendResetLinkEmail'])->name('user.password.email');

Route::get('user/password/reset/{token}/{email}', [ResetPasswordController::class, 'showResetForm'])->name('user.password.reset');
Route::post('user/password/reset', [ResetPasswordController::class, 'reset']);

Route::prefix('user')->middleware(['auth:web'])->name('user.')->group(function () {
	Route::get('logout', [LoginController::class, 'logout'])->name('logout');

	Route::get('/', [DashboardController::class, 'index']);
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


});

Route::get('/', function () {
    return view('welcome');
})->name('home');
