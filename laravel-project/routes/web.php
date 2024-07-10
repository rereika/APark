<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;

Route::get('/', [IdeaController::class, 'index'])->name('home');

// 画面遷移用のルート
Route::get('/select_theme/{id}', [HomeController::class, 'selectTheme'])->name('get.select.theme');
Route::get('/create_radar_chart/{id}', [HomeController::class, 'createRadarChart'])->name('get.create.radar.chart');
Route::get('/enter_pitch/{id}', [HomeController::class, 'enterPitch'])->name('get.enter.pitch');
Route::get('/create_feedback/{id}', [HomeController::class, 'createFeedback'])->name('get.create.feed.back');

// データ作成用のルート
Route::post('/ideas/create', [IdeaController::class, 'create'])->name('ideas.create');
Route::post('/ideas/update-theme/{id}', [IdeaController::class, 'updateTheme'])->name('ideas.update.theme');
Route::post('/ideas/update-chart/{id}', [IdeaController::class, 'updateChart'])->name('ideas.update.chart');
Route::post('/ideas/update-elevator/{id}', [IdeaController::class, 'updateElevator'])->name('ideas.update.elevator');


//下書き保存のルート
Route::get('/ideas/draft-elevator/{id}', [IdeaController::class, 'draftElevator'])->name('ideas.draft.elevator');
