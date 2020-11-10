<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MontirController;
use App\Http\Controllers\Api\SparepartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ServisController;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'v1', 'as' => 'api.'],function (){
    Route::post('register',[UserController::class,'register'])->name('register');
    Route::post('login',[UserController::class,'login'])->name('login');
    Route::get('profile',[UserController::class,'getProfile'])->name('profile');

    Route::group(['middleware' => ['bengkel', 'auth:api'], 'prefix' => 'manage/bengkels'],function (){
        Route::group(['prefix' => 'montirs'],function (){
           Route::post('/',[MontirController::class,'store'])->name('store');
           Route::post('update/{id}',[MontirController::class,'update'])->name('update');
           Route::get('/',[MontirController::class,'index'])->name('index');
           Route::delete('delete/{id}',[MontirController::class,'destroy'])->name('destroy');
           Route::get('show/{id}',[MontirController::class,'show'])->name('show');
       });

        Route::group(['prefix' => 'spareparts'],function (){
            Route::post('/',[SparepartController::class,'store'])->name('store');
            Route::post('update/{id}',[SparepartController::class,'update'])->name('update');
            Route::get('/',[SparepartController::class,'index'])->name('index');
            Route::delete('delete/{id}',[SparepartController::class,'destroy'])->name('destroy');
            Route::get('show/{id}',[SparepartController::class,'show'])->name('show');
        });

        Route::group(['prefix' => 'servis'],function (){
            Route::post('/',[ServisController::class,'store'])->name('store');
            Route::post('update/{id}',[ServisController::class,'update'])->name('update');
            Route::get('/',[ServisController::class,'index'])->name('index');
            Route::delete('delete/{id}',[ServisController::class,'destroy'])->name('destroy');
            Route::get('show/{id}',[ServisController::class,'show'])->name('show');
        });
    });


    Route::group(['middleware' => ['auth:api']],function (){
        Route::group(['prefix' => 'categories'],function (){
            Route::post('/',[CategoryController::class,'store'])->name('store');
            Route::post('update/{id}',[CategoryController::class,'update'])->name('update');
            Route::get('/',[CategoryController::class,'index'])->name('index');
            Route::delete('delete/{id}',[CategoryController::class,'destroy'])->name('destroy');
            Route::get('show/{id}',[CategoryController::class,'show'])->name('show');
            Route::get('relations/{id}',[CategoryController::class,'getRelations'])->name('getRelations');
            Route::get('bengkels/{id}',[CategoryController::class,'getBengkelByCategory'])->name('bengkels');
        });


    });

});
