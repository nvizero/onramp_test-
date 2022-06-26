<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CrawlerController;
use App\Http\Controllers\BrowsershotController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index']);
Route::post('crawler', [CrawlerController::class, 'crawler'])->name('crawler');
Route::get('/screenshot', [BrowsershotController::class, 'screenshotGoogle']);
