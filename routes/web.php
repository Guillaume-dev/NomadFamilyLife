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
Route::get('/about', 'Blog\AboutController@index')->name('about');
Route::get('/contact', 'Blog\ContactController@index')->name('contact');


//Ici on y met tout les routes en lien avec la partie Blog
//NOus permet de récuperer et d'afficher la liste de tout nos article
Route::get('/blog', 'Blog\BlogController@index');

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function () {
//Route::resource('blog', 'Blog\BlogController');
    Route::get('/', 'BlogController@index')->name('blog');
//Pour créer un article
    Route::get('/create', 'BlogController@create');
// Pour enregistrer l'article créé
    Route::post('/', 'BlogController@store');
//Pour afficher un article
    Route::get('/{blog}', 'BlogController@show');
// Pour Editer un article
    Route::get('/{blog}/edit', 'BlogController@edit');
// Pour Mettre à jours l'article éditer
    Route::put('/{blog}/update', 'BlogController@update');
// Pour supprimer l'article
    Route::delete('/{blog}/delete', 'BlogController@destroy');
});

Route::group(['namespace' => 'Blog', 'prefix' => 'category'], function () {
    Route::get('create', 'CategoriesController@create');
    Route::post('', 'CategoriesController@store');
    });
//PARTIE DASHBOARD
Route::group([], function () {
    Route::resource('admin', 'Admin\AdminController');
});
