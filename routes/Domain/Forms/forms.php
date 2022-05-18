<?php

use App\Http\Livewire\Forms\FormsTable;
use App\Panel\Forms\Form\Controllers\FormController;
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

Route::get('/admin/forms', FormsTable::class)->name('forms');
Route::get('/admin/forms/questions/{id}', FormController::class . "@view")->name('forms.view');
Route::get('/admin/forms/create', FormController::class . "@create")->name('forms.create');
Route::post('/admin/forms/create', FormController::class . "@store")->name('forms.store');
Route::get('/admin/forms/preview/{id}', FormController::class . "@preview")->name('forms.preview');
Route::delete('/admin/forms/preview/{id}', FormController::class . "@delete")->name('forms.delete');
Route::get('/admin/forms/show/{id}', FormController::class . "@show")->name('forms.show');
Route::get('/admin/forms/{id}', FormController::class . "@edit")->name('forms.edit');
Route::put('/admin/forms/{id}', FormController::class . "@update")->name('forms.update');
