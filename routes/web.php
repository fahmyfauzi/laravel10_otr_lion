<?php

use App\Http\Controllers\EngineerController;
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
