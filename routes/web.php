<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\TimesController;

Route::get('/', [CsvController::class,'index'])->name('index');

Route::post('/import', [CsvController::class,'import'])->name('import');

/* Route::post('/', [CsvController::class,'store'])->name('store'); */

/* Route::get('/print', [CsvController::class,'print'])->name('export'); */

Route::get('/sheet',[TimesController::class,'index'])->name('index');

Route::get('/timesheet', [TimesController::class, 'export'])->name('timesheet');

