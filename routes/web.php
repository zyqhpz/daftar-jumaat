<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DashboardController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Route::get('/login', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard/manage', [DashboardController::class, 'manage'])->name('manage');

// Route::get('/', [DashboardController::class, 'getLogout'])->name('logout');

Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

// Route::get('logout', ['uses' => 'DashboardController@getLogout', 'as' => 'logout']);

Route::get('/', function () {
    return view('layouts.home');
});

Route::get('/home', function() {
    return view('welcome');
});

Route::get('/keputusan', function() {
    return view('layouts.semak.keputusan');
});

// Route::view('/semak', 'semak');


// Route::get('/register', function () {
//     return view('auth.register');
// });

// Route::view('/daftar/baru', 'layouts.daftar.daftar-baru');
// Route::view('/daftar/giliran', 'layouts.daftar.daftar');
// Route::view('/semak', 'layouts.semak.semak');
