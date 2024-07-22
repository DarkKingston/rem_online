<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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

Route::get('/', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/recovery', [\App\Http\Controllers\LoginController::class, 'recovery'])->name('recovery');
Route::get('/register', [\App\Http\Controllers\LoginController::class, 'register'])->name('register');


Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'settings', 'as'=>'settings.'], function () {
    Route::get('/general', [App\Http\Controllers\SettingsController::class, 'general'])->name('general');
    Route::get('/branches', [App\Http\Controllers\SettingsController::class, 'branches'])->name('branches');
    Route::get('/users', [App\Http\Controllers\SettingsController::class, 'users'])->name('users');
});
