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

Route::get('/', 'Backend\FrontController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'Backend\FrontController@showDashboard')->name('dashboard');
});

Route::get('/login', 'Backend\FrontController@showLoginForm')->name('login');
Route::post('/login', 'Backend\FrontController@processLogin');

Route::get('/register', 'Backend\FrontController@showRegistrationForm')->name('register');
Route::post('/register', 'Backend\FrontController@processRegistration');

Route::get('/verify/{token}', 'Backend\FrontController@verifyEmail')->name('verify');

Route::get('/post', 'Backend\FrontController@post');

Route::get('/logout', 'Backend\FrontController@logout')->name('logout');

// Categories
Route::get('/categories', 'Backend\CategoryController@index')->name('categories.index');
Route::get('/categories/add', 'Backend\CategoryController@create')->name('categories.create');
Route::post('/categories', 'Backend\CategoryController@store')->name('categories.store');
Route::get('/categories/{id}', 'Backend\CategoryController@show')->name('categories.show');
Route::get('/categories/{id}/edit', 'Backend\CategoryController@edit')->name('categories.edit');
Route::put('/categories/{id}', 'Backend\CategoryController@update')->name('categories.update');
Route::delete('/categories/{id}', 'Backend\CategoryController@delete')->name('categories.delete');

// Posts
Route::resource('/posts', 'Backend\PostController');
