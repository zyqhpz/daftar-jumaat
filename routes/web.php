<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DashboardController;

//import user model
use App\Models\User;

use Illuminate\Http\Request;

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
// Route::post('/dashboard/edit', [DashboardController::class, 'edit']);

// Route::resource('/dashboard', DashboardController::class);


Route::get('/dashboard/manage/{phone}', [DashboardController::class, 'delete'])->name('manage.delete');
// Route::post('/dashboard/update/{phone}', [DashboardController::class, 'update'])->name('manage.update');

// Route::resource('/dashboard/update/{phone}', DashboardController::class);
// Route::post('/dashboard/update/{phone}', [DashboardController::class, 'update'])->name('manage.update');

Route::get('/dashboard/manage/edit/{phone}', [DashboardController::class, 'edit'])->name('manage.edit');
Route::put('/dashboard/manage/{phone}/edit', [DashboardController::class, 'update']);
// Route::post('/dashboard/manage/update/{phone}', [DashboardController::class, 'update']);
// Route::put('/dashboard/manage/update/{phone}', function ($phone) {
//     echo $phone;
//     dd('end');
// });

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

Route::post('/edit', function() {
    return view('layouts.dashboard.edit');
});

// Route::view('/semak', 'semak');


// Route::get('/register', function () {
//     return view('auth.register');
// });

// Route::view('/daftar/baru', 'layouts.daftar.daftar-baru');
// Route::view('/daftar/giliran', 'layouts.daftar.daftar');
// Route::view('/semak', 'layouts.semak.semak');
