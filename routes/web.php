<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\UsermanagementController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\ValidasiController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\LoggingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/panel', [LoginController::class, 'index'])->name('panel')->middleware('guest');
Route::post('/panel', [LoginController::class, 'authentication'])->name('authentication');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login', [LoginUserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginUserController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [LoginUserController::class, 'logout'])->name('logout');


Route::resource('welcome', HomepageController::class);
Route::resource('register', RegisterController::class);
Route::resource('dashboard', DashboardController::class);
Route::resource('pengaduan', PengaduanController::class)->middleware('auth:masyarakat');
Route::resource('usermanagement', UsermanagementController::class)->middleware(['auth:petugas', 'admin']);
Route::resource('logging', LoggingController::class)->middleware(['auth:petugas', 'admin']);
Route::resource('verifikasi', VerifikasiController::class)->middleware('auth:petugas');
Route::resource('validasi', ValidasiController::class)->middleware('auth:petugas');

Route::get('/pdf', [PDFController::class, 'index'])->name('pdf')->middleware('auth:petugas');;
Route::post('/generatepdf', [PDFController::class, 'generatepdf'])->name('generatepdf');