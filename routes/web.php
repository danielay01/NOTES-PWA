<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NoteController;
use App\Http\Controllers\AuthController;

//Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');


//Route::get('/', [NoteController::class, 'index'])->name('back');
//Route::get('/show', [NoteController::class, 'showNote']);
//Route::get('/notes/show', [NoteController::class, 'showNote'])->name('notes.showNote');
//Route::post('/notes', [NoteController::class, 'store']);
//Route::put('/notes/{note}', [NoteController::class, 'update']);
//Route::delete('/notes/{note}', [NoteController::class, 'destroy']);

//Route::get('/', function () {
   // return view('auth.login');
//})->name('login');

//Route::post('/login', function () {
   // return redirect()->route('notes.index');
//})->name('login.submit');

Route::post('/notes', [NoteController::class, 'store']);
Route::delete('/notes/{note}', [NoteController::class, 'destroy']);
Route::get('/register', [AuthController::class, 'index'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::get('/', function () {
    return view('auth.login');
})->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::get('/dashboard', [NoteController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

