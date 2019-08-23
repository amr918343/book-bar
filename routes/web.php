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

Route::get('/', function () {
    return view('main_page');
})->name('main');

Auth::routes();



Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => 'preventBack'], function() {

    Route::group(['prefix' => 'auth', 'middleware' => 'admin'], function() {

        Route::get('/home', 'HomeController@index')->name('home');

        Route::resource('users', 'AdminUsersController');
        Route::resource('categories', 'AdminCategoriesController');
        Route::resource('books', 'AdminBooksController');
    });

});
