<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;




Route::get('/', [AddressController::class, 'index']);
Route::post('/upload', [AddressController::class, 'uploadExcel'])->name('upload');
Route::get('/export', [AddressController::class, 'export'])->name('export');
Route::post('/bulk-delete', [AddressController::class, 'bulkDelete'])->name('bulk-delete');