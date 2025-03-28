<?php

use App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Api\ProductController;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::post('/register', [AuthController::class, 'register']);
//Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('/products/{id}', [ProductController::class, 'showProduct'])->name('products.show');
});




/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', [Auth\AuthController::class, 'login']);
        Route::post('register', [Auth\AuthController::class, 'register']);
        Route::middleware(['auth:user-api'])->group(function () {
            Route::post('logout', [Auth\AuthController::class, 'logout']);
            Route::post('me', [Auth\AuthController::class, 'me']);
        });

        /*Route::middleware(['auth:admin-api'])->group(function () {
            Route::post('logout', [Auth\AuthController::class, 'logout']);
            Route::post('me', [Auth\AuthController::class, 'me']);
        });*/
    });
    Route::prefix('settings')->group(function () {
        Route::get('/', [Api\MainSettingController::class, 'index']);
    });
    Route::prefix('sliders')->group(function () {
        Route::get('/', [Api\SliderController::class, 'index']);
    });
    Route::prefix('extras')->group(function () {
        Route::post('/', [Api\ExtraController::class, 'index']);
    });
    Route::prefix('categories')->group(function () {
        Route::post('/', [Api\CategoryController::class, 'index']);
    });
});
