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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Articles routes
Route::prefix('articles')->group(function () {

    Route::get('', 'ArticleController@index');

    Route::get('/{article}', 'ArticleController@show');

    Route::post('', 'ArticleController@store');

    Route::put('/{article}', 'ArticleController@update');

    Route::delete('/{article}', 'ArticleController@delete');

});

// User auth routes
Route::prefix('auth')->group(function (){
    Route::post('/register', 'Auth\RegisterController@create');

    Route::get('/all', 'Auth\RegisterController@index');

    Route::post('/login', 'Auth\LoginController@login');
});




