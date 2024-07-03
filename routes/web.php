<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\JenisJawabanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonalIdentityController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\QuisionerController;
use App\Http\Controllers\UsahaController;
use Illuminate\Support\Facades\Route;


// Route::get('/xcl', [QuisionerController::class, 'creatTempExcelQuisioner']);

Route::get('/', [QuisionerController::class, 'index']);

Route::prefix('/quisioner')->group(function () {
    Route::get('/', [QuisionerController::class, 'quisioner']);
    Route::get('/get/{id}', [QuisionerController::class, 'downloadQuisioner']);
    Route::get('/upload', [QuisionerController::class, 'uploadQuisioner']);
    Route::get('/template-excel', [QuisionerController::class, 'downloadTempExcelQuisioner']);
    Route::post('/upload', [QuisionerController::class, 'acUploadQuisioner']);
    Route::get('/pi/{id}', [QuisionerController::class, 'hasil']);
    Route::get('/perusahaan/{id}', [QuisionerController::class, 'perusahaan']);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'acLogin']);
});

Route::prefix('/admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
    });

    Route::prefix('/jenis-jawaban')->group(function () {
        Route::middleware(['auth'])->group(function () {
            Route::get('/', [JenisJawabanController::class, 'index'])->name('jenis-jawaban');
            Route::post('/getdata', [JenisJawabanController::class, 'shgetdata']);
            Route::get('/modal/{id}', [JenisJawabanController::class, 'modal']);
            Route::post('/save', [JenisJawabanController::class, 'store'])->middleware('xss');
            Route::get('/{id}', [JenisJawabanController::class, 'show']);
            Route::put('/{id}', [JenisJawabanController::class, 'update'])->middleware('xss');
            Route::delete('/{id}', [JenisJawabanController::class, 'destroy']);
            Route::post('/getJenisJawaban', [JenisJawabanController::class, 'shJenisJawaban']);
        });
    });

    Route::prefix('/jawaban')->group(function () {
        Route::middleware(['auth'])->group(function () {
            Route::get('/', [JawabanController::class, 'index'])->name('jawaban');
            Route::post('/getdata', [JawabanController::class, 'shgetdata']);
            Route::get('/modal/{id}', [JawabanController::class, 'modal']);
            Route::post('/save', [JawabanController::class, 'store'])->middleware('xss');
            Route::get('/{id}', [JawabanController::class, 'show']);
            Route::put('/{id}', [JawabanController::class, 'update'])->middleware('xss');
            Route::delete('/{id}', [JawabanController::class, 'destroy']);
            Route::post('/getJenisJawaban', [JawabanController::class, 'shJenisJawaban']);
        });
    });

    Route::prefix('/pertanyaan')->group(function () {
        Route::middleware(['auth'])->group(function () {
            Route::get('/', [PertanyaanController::class, 'index'])->name('pertanyaan');
            Route::post('/getdata', [PertanyaanController::class, 'shgetdata']);
            Route::get('/modal/{id}', [PertanyaanController::class, 'modal']);
            Route::post('/save', [PertanyaanController::class, 'store'])->middleware('xss');
            Route::get('/{id}', [PertanyaanController::class, 'show']);
            Route::put('/{id}', [PertanyaanController::class, 'update'])->middleware('xss');
            Route::delete('/{id}', [PertanyaanController::class, 'destroy']);
            Route::post('/getJenisJawaban', [PertanyaanController::class, 'shJenisJawaban']);
        });
    });

    Route::prefix('/usaha')->group(function () {
        Route::middleware(['auth'])->group(function () {
            Route::get('/', [UsahaController::class, 'index'])->name('usaha');
            Route::post('/getdata', [UsahaController::class, 'shgetdata']);
            Route::get('/modal/{id}', [UsahaController::class, 'modal']);
            Route::post('/save', [UsahaController::class, 'store'])->middleware('xss');
            Route::get('/{id}', [UsahaController::class, 'show']);
            Route::put('/{id}', [UsahaController::class, 'update'])->middleware('xss');
            Route::delete('/{id}', [UsahaController::class, 'destroy']);
            Route::post('/getJenisJawaban', [UsahaController::class, 'shJenisJawaban']);
        });
    });

    Route::prefix('/personal-identity')->group(function () {
        Route::middleware(['auth'])->group(function () {
            Route::get('/', [PersonalIdentityController::class, 'index'])->name('personal-identity');
            Route::post('/getdata', [PersonalIdentityController::class, 'shgetdata']);
            Route::get('/modal/{id}', [PersonalIdentityController::class, 'modal']);
            Route::post('/save', [PersonalIdentityController::class, 'store'])->middleware('xss');
            Route::get('/{id}', [PersonalIdentityController::class, 'show']);
            Route::put('/{id}', [PersonalIdentityController::class, 'update'])->middleware('xss');
            Route::delete('/{id}', [PersonalIdentityController::class, 'destroy']);
            Route::post('/getJenisJawaban', [PersonalIdentityController::class, 'shJenisJawaban']);
        });
    });
});
