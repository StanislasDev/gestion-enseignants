<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\presence\PresencesController;

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
Route::resource('/admin/classes', ClasseController::class,)->except('show')->names('admin.classes');
Route::resource('/admin/seances', SeanceController::class)->names('admin.seances');

Route::get('/admin/presences', [PresencesController::class, 'index'])->name('presence.index');


Route::get('/seance/{id}/presence/create', [PresencesController::class, 'create'])->name('presence.create');
Route::post('/seance/{id}/presence', [PresencesController::class, 'store'])->name('presence.store');

Route::get('/seance/{id}/presence/{presence_id}/edit', [PresencesController::class, 'edit'])->name('presence.edit');
Route::put('/seance/{id}/presence/{presence_id}', [PresencesController::class, 'update'])->name('presence.update');

Route::delete('/seance/{id}/presence/{presence_id}', [PresencesController::class, 'destroy'])->name('presence.destroy');
