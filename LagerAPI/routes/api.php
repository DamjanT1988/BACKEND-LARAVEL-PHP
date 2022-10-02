<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//skapa väg till controller
use App\Http\Controllers\productcontroller;

//skapa routes
Route::resource('lager', productcontroller::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
