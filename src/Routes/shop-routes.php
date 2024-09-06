<?php

use Illuminate\Support\Facades\Route;
use Webkul\ConvertStoreToWeb\Http\Controllers\Shop\ConvertStoreToWebController;

Route::group(['middleware' => ['web', 'theme', 'locale', 'currency'], 'prefix' => 'convertstoretoweb'], function () {
    Route::get('', [ConvertStoreToWebController::class, 'index'])->name('shop.convertstoretoweb.index');
});