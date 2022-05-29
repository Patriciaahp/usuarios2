<?php

use App\Http\Livewire\Answers\Answers;
use App\Panel\Answers\Controllers\AnswerPdfController;
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

Route::get('/admin/answers/{id}', Answers::class)->name('answers');
Route::get('/admin/answers/pdf/{id}', AnswerPdfController::class . "@answerPdf")->name('answers.pdf');
