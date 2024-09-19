<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;


// 認証ルート
require __DIR__.'/auth.php';

// デフォルトのルートをログインページにリダイレクト
Route::get('/', function () {
    return view('APark.start');
})->name('start');
//     return redirect()->route('login');
// });


// ログインフォームの表示
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.show');

// ログイン処理
Route::post('login', [LoginController::class, 'login'])->name('login.submit');

// ログインフォームの表示
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');


//ログアウト
Route::get('logout', [LoginController::class, 'Logout'])->name('logout');

// 認証されたユーザーだけがアクセスできる
Route::get('home', [IdeaController::class, 'index'])->name('home')->middleware('auth');
Route::get('themeRankList', [IdeaController::class, 'themeRankList'])->name('themeRankList')->middleware('auth');

// 最初の画面へ戻る
Route::get('start', [HomeController::class, 'showStartPage'])->name('start.show');

//ユーザー登録
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
Route::post('register', [RegisterController::class, 'register'])->name('register');
// Route::get('home', function () {
//     return view('APark.home');
// })->name('home');


// 画面遷移用のルート
Route::middleware('auth')->group(function () {
    Route::get('/select_theme/{id}', [HomeController::class, 'selectTheme'])->name('get.select.theme');
    Route::get('/create_radar_chart/{id}', [HomeController::class, 'createRadarChart'])->name('get.create.radar.chart');
    Route::get('/enter_pitch/{id}', [HomeController::class, 'enterPitch'])->name('get.enter.pitch');
    Route::get('/create_feedback/{id}', [HomeController::class, 'createFeedback'])->name('get.create.feed.back');
    // Route::get('/my_page', [HomeController::class, 'myPage'])->name('get.my.page');
    Route::get('/ideas/draft/{id}', [IdeaController::class, 'showDraft'])->name('get.draft');
    Route::get('draft/enter_pitch/{id}', [IdeaController::class, 'draftToPitch'])->name('get.draft.to.pitch');
    Route::get('/draft', [IdeaController::class, 'listDraft'])->name('get.list.draft');
    Route::get('/my_page', [IdeaController::class, 'showMyPage'])->name('get.my.page');
    Route::delete('/ideas/{id}', [IdeaController::class, 'destroy'])->name('ideas.destroy');

    // データ作成用のルート
    Route::post('/ideas/create', [IdeaController::class, 'create'])->name('ideas.create');
    Route::post('/ideas/update-theme/{id}', [IdeaController::class, 'updateTheme'])->name('ideas.update.theme');
    Route::post('/ideas/update-chart/{id}', [IdeaController::class, 'updateChart'])->name('ideas.update.chart');
    Route::post('/ideas/update-elevator/{id}', [IdeaController::class, 'updateElevator'])->name('ideas.update.elevator');
    Route::get('/radar-chart/{id}', [IdeaController::class, 'showSelfRadarChart'])->name('ideas.show.self.radar.chart');

    // 下書き保存のルート
    Route::get('/ideas/draft/{id}', [IdeaController::class, 'showDraft'])->name('ideas.show.draft');
    Route::post('/draft/delete', [IdeaController::class, 'draftDelete'])->name('ideas.draft.delete');

    // 投稿
    Route::get('/ideas/post/{id}', [IdeaController::class, 'postIdea'])->name('ideas.post');
});

// APIテスト
Route::post('/generate/{id}', [OpenAIController::class, 'generateAndRedirect'])->name('generateAndRedirect');


Route::get('/ideas', [IdeaController::class, 'getIdeas'])->name('ideas.get');
//モーダルウィンドウ内でアイデアの削除
Route::post('/home/delete', [IdeaController::class, 'modalIdeaDelete'])->name('ideas.modal.delete');

Route::post('/my_page/delete', [IdeaController::class, 'myPageIdeaDelete'])->name('ideas.myPage.delete');
