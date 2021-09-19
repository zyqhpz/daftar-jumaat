<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\DaftarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/semak', [CheckController::class, 'index'])->name('semak');
Route::post('/semak', [CheckController::class, 'store']);

// Route::get('/register', [RegisterController::class, 'index'])->name('register');
// Route::post('/register', [RegisterController::class, 'store']);

Route::get('/daftar/baru', [RegisterController::class, 'index'])->name('register');
Route::post('/daftar/baru', [RegisterController::class, 'store']);

Route::get('/daftar/giliran', [DaftarController::class, 'index'])->name('daftar');
Route::post('/daftar/giliran', [DaftarController::class, 'store']);

Route::get('/login', function () {
    return view('welcome');
});


Route::get('/', function () {
    return view('layouts.home');
});

// Route::view('/semak', 'semak');


// Route::get('/register', function () {
//     return view('auth.register');
// });

// Route::view('/daftar/baru', 'layouts.daftar.daftar-baru');
// Route::view('/daftar/giliran', 'layouts.daftar.daftar');
// Route::view('/semak', 'layouts.semak.semak');
