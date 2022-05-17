<?php


use App\Form\FormSessions\Controllers\FormSessionController;
use App\Http\Livewire\Forms\Sessions;
use Illuminate\Support\Facades\Route;

Route::post('/forms/sessions/{id}', FormSessionController::class . "@create")->name('session');
Route::get('/forms/send/{id}', Sessions::class)->name('send');
Route::get('/forms/{id}/{hash}', FormSessionController::class . "@form")->name('session.forms');
