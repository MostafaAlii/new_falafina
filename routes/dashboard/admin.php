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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('admins', Dashboard\AdminController::class);
        Route::resource('categories', Dashboard\CategoryController::class);
        Route::resource('sizes', Dashboard\SizeController::class);
        Route::resource('item_types', Dashboard\ItemTypeController::class);
        Route::resource('items', Dashboard\ItemController::class);
        Route::resource('products', Dashboard\ProductController::class);
        Route::resource('branches', Dashboard\BranchController::class);

        Route::get('dashboard', Dashboard\DashboardController::class)->name('dashboard');
    });
});
