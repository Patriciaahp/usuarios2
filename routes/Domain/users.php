<?php

use App\Http\Controllers\UserController;
use App\Http\Livewire\Users\CreateUser;
use App\Http\Livewire\Users\DeleteUser;
use App\Http\Livewire\Users\EditUser;
use App\Http\Livewire\Users\UsersTable;
use Domain\Users\Users\Actions\StoreUserAction;
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

Route::get('/preview/{id}', UserController::class . "@preview")->name('preview');
Route::get('/show/{id}', UserController::class . "@show")->name('show');
Route::get('/create', UserController::class . "@create")->name('create');
Route::post('/create/users', UserController::class . "@store")->name('store');
Route::get('/users', UsersTable::class)->name('users');
Route::get('/users/create', CreateUser::class )->name('users.create');
Route::get('/users/{id}/edit', EditUser::class )->name('users.edit');
Route::get('/users/{id}', UserController::class . "@edit")->name('edit');
Route::put('/users/{id}', UserController::class . "@update")->name('update');
Route::get('/users/{id}/delete', UserController::class . "@delete")->name('delete');
