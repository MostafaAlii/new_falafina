<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\MediaController;
Route::get('/media/{folder}/{filename}', [MediaController::class, 'showMedia'])->where('file_name', '.*');
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('admins', Dashboard\AdminController::class);
        Route::controller(Dashboard\MainSettingsController::class)->prefix('mainSettings')->as('mainSettings.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
        });
        Route::resource('categories', Dashboard\CategoryController::class);
        Route::resource('sizes', Dashboard\SizeController::class);
        Route::resource('products', Dashboard\ProductController::class);
        Route::resource('branches', Dashboard\BranchController::class);
        Route::resource('extras', Dashboard\ExtraController::class);
        Route::resource('sliders', Dashboard\SliderController::class);
        Route::resource('types', Dashboard\TypeController::class);
        Route::get('dashboard', Dashboard\DashboardController::class)->name('dashboard');
    });
});
