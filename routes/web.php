<?php

use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\berobatcontroller;
use App\Http\Controllers\ekspedisicontroller;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\ImtaqController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\PsmPeduliController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\rekomendasicontroller;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\sptsppdcontroller;
use App\Http\Controllers\suratmasukcontroller;
use App\Http\Controllers\UserController;
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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/register', [RegisterController::class, 'register'])->name('register')->middleware('admin');
Route::post('actionregister', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('/home', [homecontroller::class, 'index'])->name('home')->middleware('auth');

Route::resource('berobat', berobatcontroller::class)->middleware('auth');

Route::resource('beasiswa', BeasiswaController::class)->middleware('auth');

Route::resource('modalusaha', ModalController::class)->middleware('auth');

Route::resource('peduli', PsmPeduliController::class)->middleware('auth');

Route::resource('imtaq', ImtaqController::class)->middleware('auth');

Route::resource('suratmasuk', suratmasukcontroller::class)->middleware('auth');

Route::resource('ekspedisi', ekspedisicontroller::class)->middleware('auth');

Route::resource('pengguna', HomeUserController::class)->middleware('auth');

Route::resource('sptsppd',sptsppdcontroller::class )->middleware('auth');

Route::resource('rekomendasi', rekomendasicontroller::class)->middleware('auth');

Route::resource('user', UserController::class)->middleware('admin');

// pencarian ->
Route::get('/cari-beasiswa', [SearchController::class, 'caribeasiswa'])->name('cari.beasiswa');
Route::get('/cari-berobat', [SearchController::class, 'cari'])->name('cari.berobat');
Route::get('/cari-modus', [SearchController::class, 'modalusaha'])->name('cari.modus');
Route::get('/cari-peduli', [SearchController::class, 'peduli'])->name('cari.peduli');
Route::get('/cari-imtaq', [SearchController::class, 'imtaq'])->name('cari.imtaq');
Route::get('/cari-surat', [SearchController::class, 'surat'])->name('cari.surat');
Route::get('/cari-sptsppd', [SearchController::class, 'sptsppd'])->name('cari.sptsppd');
Route::get('/cari-ekspedisi', [SearchController::class,'ekspedisi'])->name('cari.ekspedisi');
Route::get('/cari-rekomendasi', [SearchController::class,'rekomendasi'])->name('cari.rekomendasi');

