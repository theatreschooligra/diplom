<?php

use Illuminate\Http\Request;

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


Route::group(['namespace' => 'Api'], function () {

    Route::post('auth/login', 'AuthController@login');

    Route::group(['middleware' => 'auth.jwt'], function () {

        Route::group(['prefix' => 'auth'], function () {
            Route::get('me',        'AuthController@me');
            Route::get('logout',    'AuthController@logout');
        });

        Route::group(['prefix' => 'igra'], function () {
            Route::apiResource('user',         'UsersController');
            Route::apiResource('group',        'GroupsController');
            Route::apiResource('lesson',       'LessonController');

            Route::get('lesson_time', 'HomeController@lesson_time');
        });
    });

});

Route::apiResource('group-user',    'Api\GroupUserController')->only('index', 'update');

