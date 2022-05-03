<?php

use App\Http\Livewire\Forms\FormQuestionTable;
use App\Http\Livewire\Forms\FormQuestionTypeTable;
use App\Http\Livewire\Forms\FormsTable;
use App\Panel\Forms\Controllers\FormController;
use App\Panel\Forms\Controllers\FormQuestionController;
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
Route::get('/forms/form/{id}/questions', FormController::class . "@question")->name('forms.form.questions');
Route::get('/forms/create', FormController::class . "@create")->name('forms.create');
Route::post('/forms/create', FormController::class . "@store")->name('forms.store');
Route::get('/forms/questions', FormQuestionTable::class)->name('forms.questions');
Route::get('/forms/form', FormQuestionController::class . "@show")->name('forms.form');
Route::get('/forms/form/create', FormQuestionController::class . "@create")->name('forms.form.create');
Route::post('/forms/form/create', FormQuestionController::class . "@store")->name('forms.form.store');
Route::get('/forms/form/type', FormQuestionTypeTable::class)->name('forms.form.type');
Route::get('/forms/form/question', FormQuestionTable::class)->name('forms.form.question');
Route::get('/forms/preview/{id}', FormController::class . "@preview")->name('forms.preview');
Route::delete('/forms/preview/{id}', FormController::class . "@delete")->name('forms.delete');
Route::get('/forms/show/{id}', FormController::class . "@show")->name('forms.show');
Route::get('/forms/{id}', FormController::class . "@edit")->name('forms.edit');
Route::put('/forms/{id}', FormController::class . "@update")->name('forms.update');
