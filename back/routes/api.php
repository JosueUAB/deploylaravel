<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::post('login',[\App\Http\Controllers\UserController::class, 'login']);

Route::get('productos',[\App\Http\Controllers\ProductoController::class,'index']) -> middleware(middleware: 'auth:sanctum') ;

Route::post('productos',[\App\Http\Controllers\ProductoController::class,'store'])-> middleware(middleware: 'auth:sanctum');

Route::put('productos/{id}',[\App\Http\Controllers\ProductoController::class,'update'])-> middleware(middleware: 'auth:sanctum');

Route::delete('productos/{id}',[\App\Http\Controllers\ProductoController::class,'destroy'])-> middleware(middleware: 'auth:sanctum');

Route::post('logout',[\App\Http\Controllers\UserController::class,'logout'])->middleware(middleware: 'auth:sanctum') ;