<?php


use App\Http\Livewire\Forms\Sessions;
use App\Panel\Forms\FormSessions\Controllers\FormSessionController;
use Illuminate\Support\Facades\Route;

Route::post('/forms/sessions/{id}', FormSessionController::class . "@create")->name('session');
Route::get('/forms/send/{id}', Sessions::class)->name('send');
Route::get('/forms/{id}/{hash}', FormSessionController::class . "@form")->name('session.forms');
Route::post('/answer/create/{id}', FormSessionController::class . "@createAnswer")->name('answer.create');
Route::get('/principal', FormSessionController::class . "@principal")->name('principal');



