<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['as' => 'api.'], function () {
    Route::get('/prefectures/', [\App\Http\Controllers\API\PrefectureController::class, 'index'])
        ->name('prefectures.index')
    ;
    Route::get('/prefecture/{prefectureId}/cities', [\App\Http\Controllers\API\CityController::class, 'index'])
        ->name('cities.index')
        ->where(['prefectureId' => '[0-9]+'])
    ;
    Route::get('/prefecture/{prefectureId}/stations', [\App\Http\Controllers\API\StationController::class, 'index'])
        ->name('stations.index')
        ->where(['prefectureId' => '[0-9]+'])
    ;
    Route::get('/prefecture/{prefectureId}/cities/{cityId}/stations', [\App\Http\Controllers\API\StationController::class, 'index'])
        ->name('stations.index.city')
        ->where(['prefectureId' => '[0-9]+', 'cityId' => '[0-9]+'])
    ;
});
