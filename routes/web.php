<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LbkpigdController;
use App\Http\Controllers\LptukjController;
use App\Http\Controllers\LptubController;
use App\Http\Controllers\LptubdController;
use App\Http\Controllers\LptupaController;
use App\Http\Controllers\LdmriController;
use App\Http\Controllers\LskbirController;
use App\Http\Controllers\LbkpiController;
use App\Http\Controllers\UserController;


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
    return view('user.login', ['title' => '']);
})->name('user.login');

Route::get('index', function () {
    return view('index', ['title' => 'index']);
})->name('index');



Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');


Route::get('lbkpigd', [LbkpigdController::class, 'index'])->name('lbkpigd');
Route::post('caridata', [LbkpigdController::class, 'coba'])->name('caridata');

Route::get('ldmri', [LdmriController::class, 'index'])->name('ldmri');
Route::post('caridatadiagnosa', [LdmriController::class, 'cari'])->name('caridatadiagnosa');

Route::get('lskbir', [LskbirController::class, 'index'])->name('lskbir');
Route::post('caridatasensus', [LskbirController::class, 'carisensus'])->name('caridatasensus');

Route::get('lbkpi', [LbkpiController::class, 'index'])->name('lbkpi');
Route::post('caridataigd', [LbkpiController::class, 'cariigd'])->name('caridataigd');

Route::get('lptukj', [LptukjController::class, 'index'])->name('lptukj');
Route::post('caridatakm', [LptukjController::class, 'carikamar'])->name('caridatakm');
Route::get('pdf', [LptukjController::class, 'cetak_pdf'])->name('pdf');
Route::get('excel', [LptukjController::class, 'cetak_excel'])->name('excel'); 
Route::get('cetakkamar/{tglawal}/{tglakhir}', [LptukjController::class, 'cetak_pdf2']);


Route::get('lptub', [LptubController::class, 'index'])->name('lptub');
Route::post('caridatabim', [LptubController::class, 'caribim'])->name('caridatabim');

Route::get('lptupa', [LptupaController::class, 'index'])->name('lptupa');
Route::post('caridatapa', [LptupaController::class, 'caripa'])->name('caridatapa');

Route::get('lptubd', [LptubdController::class, 'index'])->name('lptubd');
Route::post('caridatabd', [LptubdController::class, 'caribd'])->name('caridatabd');