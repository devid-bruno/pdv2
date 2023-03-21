<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
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
Route::get('/', [UsersController::class, 'index'])->name('home');
Route::get("/dashboard", [UsersController::class, 'show'])->name('users');
Route::get('/register', [UsersController::class, 'create'])->name('adicionar');
Route::post('/registro', [UsersController::class, 'store'])->name('users.register');
Route::post('/login', [UsersController::class, 'login'])->name('login.submit');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy')->middleware('auth');

Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.lista')->middleware('auth');
Route::get('/categorias', [CategoriaController::class, 'create'])->name('categoria.adicionar')->middleware('auth');
Route::post('/criar', [CategoriaController::class, 'store'])->name('criar.categoria')->middleware('auth');
Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy')->middleware('auth');
