<?php

use App\Http\Livewire\CreateUser;
use App\Http\Livewire\DeleteUser;
use App\Http\Livewire\EditUser;
use App\Http\Livewire\UsersTable;
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

Route::get('/users', UsersTable::class)->name('users');
Route::get('/users/create', CreateUser::class )->name('users.create');
Route::get('/users/{id}/edit', EditUser::class )->name('users.edit');
Route::get('/users/{id}/delete', DeleteUser::class )->name('users.delete');
