<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/encyclopedia', [SpeciesController::class, 'index'])
    ->name('species.index');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('reports', ReportController::class);

    Route::get('/quiz', [QuizController::class, 'index'])
        ->name('quiz.index');

    Route::get('/quiz/{id}', [QuizController::class, 'show'])
        ->name('quiz.show');

    Route::post('/quiz/{id}/submit', [QuizController::class, 'submit'])
        ->name('quiz.submit');

    Route::get('/leaderboard', [QuizController::class, 'leaderboard'])
        ->name('quiz.leaderboard');

});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/admin/reports', [ReportController::class, 'admin'])
        ->name('admin.reports');

    Route::put('/admin/reports/{id}', [ReportController::class, 'updateStatus'])
        ->name('admin.reports.update');

    Route::delete('/admin/reports/{id}', [ReportController::class, 'destroy'])
        ->name('admin.reports.delete');

    Route::get('/admin/species', [SpeciesController::class, 'admin'])
        ->name('admin.species');

    Route::get('/admin/species/create', [SpeciesController::class, 'create'])
        ->name('admin.species.create');

    Route::post('/admin/species', [SpeciesController::class, 'store'])
        ->name('admin.species.store');

    Route::delete('/admin/species/{id}', [SpeciesController::class, 'destroy'])
        ->name('admin.species.delete');

    Route::get('/admin/quiz', [QuizController::class, 'admin'])
        ->name('admin.quiz');

    Route::get('/admin/quiz/create', [QuizController::class, 'create'])
        ->name('admin.quiz.create');

    Route::post('/admin/quiz', [QuizController::class, 'store'])
        ->name('admin.quiz.store');

    Route::delete('/admin/quiz/{id}', [QuizController::class, 'destroy'])
        ->name('admin.quiz.delete');

});

require __DIR__.'/auth.php';