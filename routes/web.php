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

    Route::resource('user',    'UsersController');
    Route::resource('group',   'GroupsController');
    Route::resource('lesson',  'LessonsController');


    Route::group(['prefix' => 'search', 'as' => 'search.'], function () {
        Route::post('users', 'HomeController@user_search')->name('users');
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
