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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Ici on y met tout les routes en lien avec la partie Blog
Route::get('/blog', 'Blog\BlogController@index');

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function () {
    //Route::resource('blog', 'Blog\BlogController');
    Route::get('/new', 'BlogController@create');
    Route::get('/{blog}', 'BlogController@show');
    Route::post('/', 'BlogController@store');
});


//PARTIE DASHBOARD
Route::group([], function () {
    Route::resource('admin', 'Admin\AdminController');
});
