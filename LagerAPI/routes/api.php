<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//skapa väg till controller
use App\Http\Controllers\productcontroller;
//inkludera AuthController
use App\Http\Controllers\authcontroller;

//skapa routes med skydd från otillbörlig access (sanctum)
Route::resource('lager', productcontroller::class)->middleware('auth:sanctum');

/*skapa publika routes
anropa via /register -> använd metod register i AuthController; 
anropar funktion register*/
Route::post('/register', [authcontroller::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
