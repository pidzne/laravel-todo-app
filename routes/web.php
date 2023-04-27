<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::resource('todos', TodoController::class)->except('index');
Route::get('/', [TodoController::class, 'index'])->name('todos.index');
Route::get('/todo-trash', [TodoController::class, 'trash'])->name('todos.trash');
Route::post('/todo-restore-one/{id}', [TodoController::class, 'restoreOne'])->name('todos.restore_one');
Route::post('/todo-restore-all', [TodoController::class, 'restoreAll'])->name('todos.restore_all');
Route::delete('/todo-remove-one/{id}', [TodoController::class, 'removeOne'])->name('todos.remove_one');
Route::delete('/todo-remove-all', [TodoController::class, 'removeAll'])->name('todos.remove_all');
Route::get('/todo-search', [TodoController::class, 'search'])->name('todos.search');

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');