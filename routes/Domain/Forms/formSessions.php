<?php


use App\Http\Livewire\Forms\Sessions;
use App\Panel\Forms\FormSessions\Controllers\FormSessionController;
use Illuminate\Support\Facades\Route;

Route::post('/forms/sessions/{id}', FormSessionController::class . "@create")->name('session');
Route::get('/forms/send/{id}', Sessions::class)->name('send');
Route::get('/forms/{id}/{hash}', FormSessionController::class . "@form")->name('session.forms');
Route::post('/forms/{id}/{hash}', FormSessionController::class . "@createAnswer")->name('answer.create');
Route::get('/principal', FormSessionController::class . "@principal")->name('principal');
Route::get('/send/email/{id}/{hash}', FormSessionController::class . "@sendEmail")->name('sendEmail');
Route::post('/send/email/{id}/{hash}', FormSessionController::class . "@email")->name('send.email');


