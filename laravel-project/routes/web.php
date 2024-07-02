<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/select_theme', [HomeController::class, 'selectTheme'])->name('select.theme');

Route::get('/create_radar_chart', [HomeController::class, 'createRadarChart'])->name('create.radar.chart');
