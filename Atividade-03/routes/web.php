<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cambio', function () {
    return view('cambio');
})->name('cambio');

Route::get('/horoscopo', function () {
    return view('horoscopos');
})->name('horoscopo');

Route::get('/horoscopo/{signo}', function ($signo) {
    return view('signo', ['signo' => $signo]);
})->name('horoscopo.signo');
