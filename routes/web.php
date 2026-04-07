<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\kpidashboard::class, 'index'])->name('kpidashboard');
Route::get('/quantitative-observations', [App\Http\Controllers\kpidashboard::class, 'quantitativeobservations'])->name('quantitativeobservations');
Route::get('/academicreports', [App\Http\Controllers\kpidashboard::class, 'academicreports'])->name('academicreports');
Route::get('/qualitative-observations', [App\Http\Controllers\kpidashboard::class, 'qualitativeobservations'])->name('qualitativeobservations');
Route::get('/adminpanel', [App\Http\Controllers\kpidashboard::class, 'adminpanel'])->name('adminpanel');
Route::get('/registration', [App\Http\Controllers\kpidashboard::class, 'registration'])->name('registration');
Route::get('/systemsettings', [App\Http\Controllers\kpidashboard::class, 'systemsetthings'])->name('systemsettings');
Route::get('/sechead', [App\Http\Controllers\kpidashboard::class, 'sechead'])->name('sechead');
Route::get('/teachermanagement', [App\Http\Controllers\kpidashboard::class, 'teachermanagement'])->name('teachermanagement');
Route::get('/observation', [App\Http\Controllers\kpidashboard::class, 'observation'])->name('observation');
