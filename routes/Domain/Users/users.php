<?php

use App\Http\Livewire\Users\UsersTable;
use App\Panel\Users\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('error', UserController::class . "@error")->name('error');
Route::get('login', UserController::class . "@index")->name('login');
Route::post('custom-login', UserController::class . "@login")->name('log');
Route::get('signout', UserController::class . "@logout")->name('logout');
Route::get('/preview/{id}', UserController::class . "@preview")->name('preview');
Route::get('/show/{id}', UserController::class . "@show")->name('show');
Route::get('/create', UserController::class . "@create")->name('create');
Route::post('/create/users', UserController::class . "@store")->name('store');
Route::get('/users', UsersTable::class)->name('users')->middleware('auth');
Route::get('/users/{id}', UserController::class . "@edit")->name('edit');
Route::put('/users/{id}', UserController::class . "@update")->name('update');
Route::delete('/users/{id}/delete', UserController::class . "@delete")->name('delete');
Route::get('/{id}/reset/{remember_token}', UserController::class . "@reset")->name('reset');
Route::put('/{id}/reset', UserController::class . "@updatePassword")->name('updatePassword');
