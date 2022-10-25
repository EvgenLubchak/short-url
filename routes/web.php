<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\URLController;

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

Route::get('/{url:token}', [URLController::class, 'redirect'])
    ->where('url', '^[a-zA-Z-0-9]{8}$')
    ->name('url.redirect');

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::prefix('url')->group(function () {
    Route::post('/', [URLController::class, 'store'])
        ->name('store.url');
    Route::get('/{url}', [URLController::class, 'shortUrl'])
        ->where('url', '[0-9]+')
        ->name('short.url');
});
