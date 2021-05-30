<?php

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

use App\Http\Controllers\GameController;

Route::get('/', [GameController::class, 'index'])->middleware('auth');
Route::get('/games/create', [GameController::class, 'create'])->middleware('auth');
Route::get('/games/mygames', [GameController::class, 'mygames'])->middleware('auth');
Route::get('/games/mylibrary', [GameController::class, 'mylibrary'])->middleware('auth');
Route::get('/games/gamestore', [GameController::class, 'gamestore'])->middleware('auth');
Route::post('/games', [GameController::class, 'store'])->middleware('auth');
Route::get('/games/{id}', [GameController::class, 'show'])->middleware('auth');
Route::post('/games/pucharse/{id}', [GameController::class, 'buyGame'])->middleware('auth');
Route::get('/games/edit/{id}', [GameController::class, 'edit'])->middleware('auth');
Route::put('/games/update/{id}', [GameController::class, 'update'])->middleware('auth');
Route::delete('/games/{id}', [GameController::class, 'destroy'])->middleware('auth');
Route::get('/dashboard', [GameController::class, 'dashboard'])->middleware('auth');
Route::put('/dashboard/editAccount/', [GameController::class, 'updateAccount'])->middleware('auth');
