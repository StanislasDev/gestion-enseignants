<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/admin/enseignants', EnseignantController::class,)->except('show')->names('admin.enseignants');
