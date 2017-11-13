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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/users', 'UserController@index')->name('view_users');
    Route::get('/users/change_pass', 'UserController@change_pass')->name('change_pass');

    Route::get('/my_store', 'MyStoreController@index')->name('my_store');
});

Auth::routes();

// Route::get('/register/success', 'Auth\RegisterController@success')->name("reg_success");
