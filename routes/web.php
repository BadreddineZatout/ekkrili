<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::controller(AdController::class)->prefix('ads')->group(function () {

    Route::get('/', 'index');
    Route::get('/{ad}', 'show');
    Route::post('/{ad}/like', 'addLike');
    Route::post('/{ad}/unlike', 'removeLike');
});
