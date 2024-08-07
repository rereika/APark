<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\OpenAIController;

Route::get('/', [IdeaController::class, 'index'])->name('home');

// 画面遷移用のルート
Route::get('/select_theme/{id}', [HomeController::class, 'selectTheme'])->name('get.select.theme');
Route::get('/create_radar_chart/{id}', [HomeController::class, 'createRadarChart'])->name('get.create.radar.chart');
Route::get('/enter_pitch/{id}', [HomeController::class, 'enterPitch'])->name('get.enter.pitch');
Route::get('/create_feedback/{id}', [HomeController::class, 'createFeedback'])->name('get.create.feed.back');
Route::get('/my_page', [HomeController::class, 'myPage'])->name('get.my.page');
Route::get('/ideas/draft/{id}', [IdeaController::class, 'showDraft'])->name('get.draft');
Route::get('draft/enter_pitch/{id}', [IdeaController::class, 'draftToPitch'])->name('get.draft.to.pitch');
Route::get('/draft', [IdeaController::class, 'listDraft'])->name('get.list.draft');
Route::delete('/ideas/{id}', [IdeaController::class, 'destroy'])->name('ideas.destroy');



// データ作成用のルート
Route::post('/ideas/create', [IdeaController::class, 'create'])->name('ideas.create');
Route::post('/ideas/update-theme/{id}', [IdeaController::class, 'updateTheme'])->name('ideas.update.theme');
Route::post('/ideas/update-chart/{id}', [IdeaController::class, 'updateChart'])->name('ideas.update.chart');
Route::post('/ideas/update-elevator/{id}', [IdeaController::class, 'updateElevator'])->name('ideas.update.elevator');
Route::get('/radar-chart/{id}', [App\Http\Controllers\IdeaController::class, 'showSelfRadarChart'])->name('ideas.show.self.radar.chart');



//下書き保存のルート
Route::get('/ideas/draft/{id}', [IdeaController::class, 'showDraft'])->name('ideas.show.draft');
Route::post('/draft/delete', [IdeaController::class, 'draftDelete'])->name('ideas.draft.delete');

//投稿
Route::get('/ideas/post/{id}', [IdeaController::class, 'postIdea'])->name('ideas.post');

//APIテスト
Route::post('/generate/{id}', [OpenAIController::class, 'generateAndRedirect'])->name('generateAndRedirect');
