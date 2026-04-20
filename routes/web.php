<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\SectionHeadController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (): void {
    Route::get('/registration', [AuthController::class, 'showLoginForm'])->name('registration');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function (): void {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [DashboardController::class, 'index'])->name('kpidashboard');
    Route::get('/quantitative-observations', [DashboardController::class, 'quantitativeObservations'])->name('quantitativeobservations');
    Route::get('/academicreports', [DashboardController::class, 'academicReports'])->name('academicreports');
    Route::get('/qualitative-observations', [DashboardController::class, 'qualitativeObservations'])->name('qualitativeobservations');
    Route::get('/adminpanel', [DashboardController::class, 'adminPanel'])->name('adminpanel');
    Route::get('/systemsettings', [DashboardController::class, 'systemSettings'])->name('systemsettings');
    Route::put('/systemsettings/avatar', [DashboardController::class, 'updateOwnAvatar'])->name('systemsettings.avatar');
    Route::get('/sechead', [SectionHeadController::class, 'index'])->name('sechead');
    Route::post('/section-heads', [SectionHeadController::class, 'store'])->name('section-heads.store');
    Route::put('/section-heads/{user}', [SectionHeadController::class, 'update'])->name('section-heads.update');
    Route::delete('/section-heads/{user}', [SectionHeadController::class, 'destroy'])->name('section-heads.destroy');
    Route::get('/teachermanagement', [FacultyController::class, 'index'])->name('teachermanagement');
    Route::post('/faculty', [FacultyController::class, 'store'])->name('faculty.store');
    Route::put('/faculty/{user}', [FacultyController::class, 'update'])->name('faculty.update');
    Route::delete('/faculty/{user}', [FacultyController::class, 'destroy'])->name('faculty.destroy');
    Route::get('/faculty', fn () => redirect()->route('teachermanagement'));
    Route::get('/observations', [DashboardController::class, 'observations'])->name('observations');
    Route::post('/observations', [DashboardController::class, 'storeObservation'])->name('observations.store');
    Route::put('/observations/{observation}', [DashboardController::class, 'updateObservation'])->name('observations.update');
});
