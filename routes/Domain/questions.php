<?php

use App\Http\Livewire\Forms\FormQuestionTable;
use App\Http\Livewire\Forms\FormQuestionTypeTable;
use App\Panel\Forms\Controllers\FormQuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/forms/question/{id}/preview', FormQuestionController::class . "@preview")->name('questions.preview');
Route::delete('/forms/question/{id}/delete', FormQuestionController::class . "@delete")->name('forms.form.view.delete');
Route::get('/forms/questions', FormQuestionTable::class)->name('forms.questions');
Route::get('/forms/form/create', FormQuestionController::class . "@create")->name('forms.form.create');
Route::put('/questions/{id}', FormQuestionController::class . "@update")->name('questions.update');
Route::get('/questions/{id}', FormQuestionController::class . "@edit")->name('questions.edit');
Route::post('/forms/form/create', FormQuestionController::class . "@store")->name('forms.form.store');
Route::get('/forms/form/type', FormQuestionTypeTable::class)->name('questions.type');
Route::get('/forms/form/question', FormQuestionTable::class)->name('forms.form.question');
