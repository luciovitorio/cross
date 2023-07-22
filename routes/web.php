<?php

use App\Http\Controllers\AlertController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\QuantityController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
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

// ROTAS DE LOGIN
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');

// ROTAS PROTEGIDAS
Route::middleware(['login'])->group(function () {
    // ROTAS DE USUÁRIO
    Route::get('home', [AuthController::class, 'home'])->name('home');
    Route::get('users', [UserController::class, 'index'])->name('users.index')->can('is_admin');
    Route::post('users', [UserController::class, 'store'])->name('users.store')->can('is_admin');
    Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit')->can('is_admin');
    Route::post('users/update/{id}', [UserController::class, 'update'])->name('users.update')->can('is_admin');
    Route::get('users/delete/{id}', [UserController::class, 'delete'])->name('users.delete')->can('is_admin');
    Route::get('users/status/{id}', [UserController::class, 'alterStatus'])->name('users.alterStatus')->can('is_admin');

    // ROTAS DE AVISOS
    Route::get('alerts', [AlertController::class, 'index'])->name('alert.index');
    Route::post('alerts', [AlertController::class, 'store'])->name('alert.store')->can('is_admin');
    Route::get('alerts/edit/{id}', [AlertController::class, 'edit'])->name('alert.edit')->can('is_admin');
    Route::post('alerts/update/{id}', [AlertController::class, 'update'])->name('alert.update')->can('is_admin');
    Route::get('alerts/delete/{id}', [AlertController::class, 'delete'])->name('alert.delete')->can('is_admin');

    // ROTAS DE AGENDAMENTO
    Route::post('schedule', [ScheduleController::class, 'store'])->name('schedule.store');
    Route::get('schedule/hours/{hourId}/{dayId}', [ScheduleController::class, 'index'])->name('schedule.hours');
    Route::get('schedule/delete/{hourId}/{userId}', [ScheduleController::class, 'delete'])->name('schedule.delete');


    // ROTAS DE AVISOS
    Route::get('blocks', [BlockController::class, 'index'])->name('block.index')->can('is_admin');
    Route::get('day/status/{id}', [BlockController::class, 'alterStatus'])->name('block.alterStatus')->can('is_admin');
    Route::get('hour/status/{id}', [BlockController::class, 'alterHourStatus'])->name('block.alterHourStatus')->can('is_admin');

    // ROTA PARA ALTERAR QUANTIDADE DE ALUNOS PERMITIDOS
    Route::post('quantity', [QuantityController::class, 'update'])->name('quantity.update')->can('is_admin');

    // ROTA DE RESET
    Route::get('schedule/reset', [ScheduleController::class, 'reset'])->name('schedule.reset');
});


// Rota de logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
