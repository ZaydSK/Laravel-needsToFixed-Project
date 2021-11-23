<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestModelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Unprotected routes
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::prefix('/tests')->group(function(){
    Route::get('/',[TestModelController::class,'index']);
    Route::get('/{test}',[TestModelController::class,'show']);
    Route::get('/search/{name}',[TestModelController::class,'search']);
});


//  Protected routes
Route::group(['middleware'=>['auth:sanctum']] ,function () {
    Route::prefix('/tests')->group(function(){
        Route::post('/',[TestModelController::class,'store']);
        Route::put('/{test}',[TestModelController::class,'update']);
        Route::delete('/{test}',[TestModelController::class,'destroy']);
    });
    Route::post('/logout',[AuthController::class,'logOut']);
});

