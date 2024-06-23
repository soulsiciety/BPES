<?php

use App\Http\Controllers\QuisionerController;
use App\Models\MPertanyaan;
use App\Models\MUsaha;
use Illuminate\Support\Facades\Route;


Route::get('/create', function () {
    return view('create-quisioner');
});

Route::get('/upload', function () {
    return view('upload-quisioner');
});

Route::get('/upload', function () {
    return view('upload-quisioner');
});

Route::get('/', [QuisionerController::class, 'index']);

Route::get('/quisionerr/{id}', [QuisionerController::class, 'generateQuisioner']);

Route::get('/quisioner/{id}', [QuisionerController::class, 'downloadPDF']);

Route::get('/data', function () {
    $usaha = 1;
    $model = MPertanyaan::get();
    $model_usaha = MUsaha::find($usaha);

    echo ($model_usaha->usaha . $model_usaha->kode);
    echo ("<br>");
    foreach ($model as $key => $value) {
        echo ($value->pertanyaan . $value->jenis_jawaban);
        echo ("<br><ul>");
        foreach ($value->jawabans as $keye => $valuee) {
            if ($valuee->kode_usaha == $model_usaha->kode || $valuee->kode_usaha == "") {
                echo ('<li>' . $valuee . '</li>');
            }
        }
        echo ("</ul><br>");
    }
});
