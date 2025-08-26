<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/import', [App\Http\Controllers\ImportController::class, 'showForm']);
Route::post('/import', [App\Http\Controllers\ImportController::class, 'importExcel']);
Route::post('/importapplied', [App\Http\Controllers\ImportController::class, 'importAppliedExcel']);
Route::post('/importrefresher', [App\Http\Controllers\ImportController::class, 'importRefresherExcel']);

