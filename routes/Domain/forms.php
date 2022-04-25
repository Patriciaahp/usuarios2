<?php

use App\Http\Livewire\Forms\FormsTable;
use App\Panel\Forms\Controllers\FormController;
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

Route::get('/forms', FormsTable::class)->name('forms');
Route::get('/create', FormController::class . "@create")->name('create');
Route::post('/create/forms', FormController::class . "@store")->name('store');
Route::get('/forms/{id}', FormController::class . "@edit")->name('edit');
Route::put('/forms/{id}', FormController::class . "@update")->name('update');
Route::get('/preview/{id}', FormController::class . "@preview")->name('preview');
Route::delete('/forms/{id}/delete', FormController::class . "@delete")->name('delete');
