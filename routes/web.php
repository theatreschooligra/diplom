<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'middleware'    => 'admin',
    'prefix'        => 'admin',
    'namespace'     => 'Admin',
    'as'            => 'admin.'
], function () {

    Route::get('/', 'HomeController@index')->name('home');


    Route::resource('company', 'CompaniesController')->only('index', 'update');
    Route::resource('user',    'UsersController');
    Route::resource('group',   'GroupsController');
    Route::resource('lesson',  'LessonsController');


    Route::group(['prefix' => 'search', 'as' => 'search.'], function () {
        Route::post('users', 'HomeController@user_search')->name('users');
    });

    Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
        Route::post('get-rooms', 'HomeController@lesson_room')->name('lesson_date');
    });
});


Auth::routes();


