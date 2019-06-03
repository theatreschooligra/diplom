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

            Route::apiResource('user',         'UsersController')->except(['store', 'destroy']);
            Route::apiResource('group',        'GroupsController')->only(['index', 'show']);
            Route::apiResource('lesson',       'LessonController')->only(['index', 'show']);

            Route::apiResource('attendance',   'AttendanceController')->only(['show', 'update'])
                ->parameters([
                    'attendance' => 'lesson'
                ]);

            Route::get('lesson_time', 'HomeController@lesson_time');
        });
    });

});

Route::get('runtest', function () {
    $lesson = \App\Lesson::find(1);
    $lesson->students()->sync($lesson->group->students->pluck('id')->toArray());
    dd(
        $lesson->group->students->pluck('id')
    );
});

Route::apiResource('group-user',    'Api\GroupUserController')->only('index', 'update');

