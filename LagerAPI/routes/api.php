<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//skapa väg till controller
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\othercontroller;
//use App\Http\Controllers\imageuploadcontroller;
//inkludera AuthController
use App\Http\Controllers\authcontroller;

//skapa routes med skydd från otillbörlig access (sanctum)
Route::resource('lager', productcontroller::class)->middleware('auth:sanctum');


/*
//For adding an image
Route::get('/add-image',[imageuploadcontroller::class,'addImage'])->name('images.add');

//For storing an image
Route::post('/store-image',[imageuploadcontroller::class,'storeImage'])
->name('images.store');

//For showing an image
Route::get('/view-image',[imageuploadcontroller::class,'viewImage'])->name('images.view');
*/


//säkerhetsnyckel
Route::resource('securitykey', othercontroller::class);

/*skapa publika routes
anropa via /register -> använd metod register i AuthController; 
anropar funktion register*/
Route::post('/register', [authcontroller::class, 'register']);

//skapa route för login
Route::post('/login', [authcontroller::class, 'login']);

//inloggade kan komma åt utloggfunktion
Route::post('/logout', [authcontroller::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
