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

    Route::get('/submission/{id}/pdf', [EngineerController::class, 'downloadPdf'])->name('submission.pdf');
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
    // assessment
    Route::resource('/assessment', QualityInspectorController::class)->except(['destroy'])->except(['destroy', 'create', 'store'])->names('quality-inspector');

    Route::get('/assessment/{id}/create', [QualityInspectorController::class, 'create'])->name('quality-inspector.create');

    Route::post('/assessment/{id}', [QualityInspectorController::class, 'store'])->name('quality-inspector.store');
});
