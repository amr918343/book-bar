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

Route::get('/', 'HomeController@main')->name('main');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();



// Users routes
Route::get('/categories', 'users\UserCategoriesController@index');
Route::get('/authors', 'users\UserAuthorsController@index')->name('authors');
Route::get('/author/{id}/books', 'users\UserAuthorsController@books')->name('authorbooks');

Route::group(['middleware' => 'preventBack'], function() {

    Route::group(['prefix' => 'auth', 'middleware' => 'admin'], function() {

        Route::get('/home', 'HomeController@index')->name('home');

        Route::delete('/books/delete', 'AdminBooksController@deleteSelected')->name('deleteSelected-book');
        Route::delete('/users/delete', 'AdminUsersController@deleteSelected')->name('deleteSelected-user');
        Route::delete('/categories/delete', 'AdminCategoriesController@deleteSelected')->name('deleteSelected-category');

        Route::resource('users', 'AdminUsersController');
        Route::resource('categories', 'AdminCategoriesController');
        Route::resource('books', 'AdminBooksController');

    });

});