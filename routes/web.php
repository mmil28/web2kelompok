<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kelas', [App\Http\Controllers\KelasController::class, 'index']); 
