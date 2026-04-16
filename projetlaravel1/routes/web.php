<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfesseurController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('professeurs', ProfesseurController::class);
Route::resource('etudiants', EtudiantController::class);
Route::resource('cours', CoursController::class);
Route::resource('notes', NoteController::class);