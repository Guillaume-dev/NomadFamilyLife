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

Route::group([], function () {
    Route::resource('blog', 'Blog\BlogController');
});
