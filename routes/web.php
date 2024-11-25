<?php

use App\Http\Controllers\EngineerController;
use App\Http\Controllers\PicController;
use App\Http\Controllers\QualityInspectorController;
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

// role applicant
Route::middleware(['auth', 'role:applicant'])->prefix('/applicant')->group(function () {
    // submission
    Route::resource('/submission', EngineerController::class)->except(['destroy']);
});

// role pic coordinator
Route::middleware(['auth', 'role:pic_coordinator'])->prefix('/pic-coordinator')->group(function () {
    Route::get('/home', [PicController::class, 'index'])->name('pic.index');

    //submission check
    Route::get('/submission/{id}/show', [PicController::class, 'show'])->name('pic.show');
    Route::patch('/submission/{id}/update', [PicController::class, 'update'])->name('pic.update');
});

// role quality inspector
Route::middleware(['auth', 'role:quality_inspector'])->prefix('/quality-inspector')->group(function () {
    Route::get('/home', [QualityInspectorController::class, 'index'])->name('quality-inspector.index');

    // assessment
    Route::get('/assessment/{id}/edit', [QualityInspectorController::class, 'assessment'])->name('quality-inspector.edit');
    Route::post('/assessment/{id}/update', [QualityInspectorController::class, 'postAssessment'])->name('quality-inspector.update');
    Route::get('/assessment/{id}/show', [QualityInspectorController::class, 'show'])->name('quality-inspector.show');
});
