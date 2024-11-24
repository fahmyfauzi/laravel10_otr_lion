<?php

use App\Http\Controllers\EngineerController;
use App\Http\Controllers\PicController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::middleware(['auth', 'role:applicant'])->prefix('/applicant')->group(function () {
    // submission
    Route::resource('/submission', EngineerController::class)->except(['destroy']);
});

Route::middleware(['auth', 'role:pic_coordinator'])->prefix('/pic-coordinator')->group(function () {
    Route::get('/home', [PicController::class, 'index'])->name('pic.index');
    Route::get('/submission/{id}/show', [PicController::class, 'show'])->name('pic.show');
    Route::patch('/submission/{id}/update', [PicController::class, 'update'])->name('pic.update');
});
