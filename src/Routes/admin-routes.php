<?php

use Illuminate\Support\Facades\Route;
use Webkul\ConvertStoreToWeb\Http\Controllers\Admin\ConvertStoreToWebController;

Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin/convertstoretoweb'], function () {
    Route::controller(ConvertStoreToWebController::class)->group(function () {
        Route::get('', 'index')->name('admin.convertstoretoweb.index');
    });
});