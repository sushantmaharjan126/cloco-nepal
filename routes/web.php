<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\Auth\ForgetPasswordController;
use App\Http\Controllers\User\Auth\ResetPasswordController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ArtistController;
use App\Http\Controllers\User\MusicController;

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


Route::get('user/register', [RegisterController::class, 'showForm'])->name('user.register');
Route::post('user/register', [RegisterController::class, 'register'])->name('user.register.submit');


Route::get('user/password/reset', [ForgetPasswordController::class, 'showLinkRequestForm'])->name('user.password.request');
Route::post('user/password/email', [ForgetPasswordController::class, 'sendResetLinkEmail'])->name('user.password.email');

Route::get('user/password/reset/{token}/{email}', [ResetPasswordController::class, 'showResetForm'])->name('user.password.reset');
Route::post('user/password/reset', [ResetPasswordController::class, 'reset']);

Route::prefix('user')->middleware(['auth:web'])->name('user.')->group(function () {
	Route::get('logout', [LoginController::class, 'logout'])->name('logout');

	Route::get('/', [DashboardController::class, 'index']);
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

	Route::get('/users', [UserController::class, 'index'])->name('users.get');
	Route::get('/users/create/', [UserController::class, 'create'])->name('users.create');
	Route::post('/users/store/', [UserController::class, 'store'])->name('users.store');
	Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
	Route::post('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
	Route::get('/users/destory/{user}', [UserController::class, 'destory'])->name('users.destory');

	Route::get('/artists', [ArtistController::class, 'index'])->name('artists.get');
	Route::get('/artists/create/', [ArtistController::class, 'create'])->name('artists.create');
	Route::post('/artists/store/', [ArtistController::class, 'store'])->name('artists.store');
	Route::get('/artists/edit/{artist}', [ArtistController::class, 'edit'])->name('artists.edit');
	Route::post('/artists/update/{artist}', [ArtistController::class, 'update'])->name('artists.update');
	Route::get('/artists/destory/{artist}', [ArtistController::class, 'destory'])->name('artists.destory');
	Route::get('/artists/download/csv-file', [ArtistController::class, 'csvDownload'])->name('artists.download.csv-file');
	Route::post('/artists/upload/csv-file', [ArtistController::class, 'csvUpload'])->name('artists.upload.csv-file');

	Route::get('/artists/{artist}/musics', [ArtistController::class, 'musics'])->name('artists.musics');
	Route::post('artists/{artist}/musics', [ArtistController::class, 'storeMusics'])->name('artists.musics.store');
	Route::get('artists/{artist}/musics/edit/{music}', [ArtistController::class, 'editMusics'])->name('artists.musics.edit');
	Route::post('artists/{artist}/gallery/edit/{music}', [ArtistController::class, 'updateMusics'])->name('artists.musics.update');
	Route::get('artists/musics/destory/{id}', [ArtistController::class, 'destroyMusics'])->name('artists.musics.destory');


	Route::get('/musics', [MusicController::class, 'index'])->name('musics.get');
	Route::get('/musics/create/', [MusicController::class, 'create'])->name('musics.create');
	Route::post('/musics/store/', [MusicController::class, 'store'])->name('musics.store');
	Route::get('/musics/edit/{music}', [MusicController::class, 'edit'])->name('musics.edit');
	Route::post('/musics/update/{music}', [MusicController::class, 'update'])->name('musics.update');
	Route::get('/musics/destory/{music}', [MusicController::class, 'destory'])->name('musics.destory');

});

Route::get('/', function () {
    return view('welcome');
})->name('home');
