<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productoController;


//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('/', fn() => redirect()->route('productos.index'));
Route::resource('productos', productoController::class);
