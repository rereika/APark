<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [HomeController::class, 'index'])->name('home');

//画面遷移
Route::get('/select_theme', [HomeController::class, 'selectTheme'])->name('select.theme');
Route::get('/create_radar_chart', [HomeController::class, 'createRadarChart'])->name('create.radar.chart');
Route::get('/enter_pitch', [HomeController::class, 'enterPitch'])->name('enter.pitch');
Route::get('/create_feedback',[HomeController::class, 'createFeedback'])->name('create.feed.back');

//
Route::post('/ideas/create', [IdeaController::class, 'create'])->name('ideas.create');
// Route::get('/select-theme/{id}', [IdeaController::class, 'selectTheme'])->name('select.theme');
Route::post('/ideas/{id}/update-theme', [IdeaController::class, 'updateTheme'])->name('ideas.update.theme');
