<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WidgetController;

Route::get('/', function () { return view('order'); })->name('order');
Route::post('/widget-caluclator', [WidgetController::class, 'getWidgetPacks'])->name('widget-caluclator');