<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\TwoFactorAuthController;
use App\Http\Controllers\Auth\SettingsController;
use App\Http\Controllers\Auth\GithubController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\HouseController;
// routes/web.php
use App\Http\Controllers\ApiController;

Route::get('/users', [ApiController::class, 'getUsers']);
Route::get('/artigos', [ApiController::class, 'getPosts']);
Route::get('/comments', [ApiController::class, 'getComments']);
Route::get('/todos', [ApiController::class, 'getTodos']);
Route::get('/albums', [ApiController::class, 'getAlbums']);
Route::get('/photos', [ApiController::class, 'getPhotos']);

Route::get('/weather', [HouseController::class, 'fetchWeather'])->name('weather');
Route::get('users/manage', [UserController::class, 'index'])->name('users.manage');

// Rota para atualizar o nível de acesso de um usuário
Route::put('users/{user}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');

Route::resource('posts', PostController::class);

Route::get('/auth/github', [GithubController::class, 'redirectToGithub'])->name('auth.github');
Route::get('/auth/github/callback', [GithubController::class, 'handleGithubCallback'])->name('auth.github.callback');
Route::get('/two-factor', [TwoFactorAuthController::class, 'show'])->name('auth.two-factor');
Route::post('/two-factor', [TwoFactorAuthController::class, 'verify']);
Route::post('/two-factor/resend', [TwoFactorAuthController::class, 'resend'])->name('auth.two-factor.resend');


Route::middleware('auth')->group(function () {
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/two-factor', [SettingsController::class, 'toggleTwoFactor'])->name('settings.toggleTwoFactor');
});

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
