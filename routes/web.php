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

/*Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/', 'HomeController@index');
//Route::get('/article', 'ArticlesController@index');


Route::get('welcome', 'PostsController@list');

//Route::get('/articles', 'ArticlesController@list');


Route::get('/article/{post_name}', 'PostsController@show');


//
Route::get('/email_contact', 'ContactController@show');

Route::get('/contact', 'ContactController@create');

Route::post('/contacts', 'ContactController@store');


//
Route::post('/Commentaire', 'CommentController@create');

Route::get('/Commentaire', 'CommentController@show');

Route::post('{post}/comments', 'CommentController@store');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/articles', 'ArticlesController');//->only(['index']);



//Route::resource('users', 'UserController');

Route::middleware('can:gestion-users')->group(function (){
    Route::resource('users', 'UserController');
});






//Route::get('admin/createArticles', 'ArticlesController@create')->name('admin.createArticles');

//Route::post('admin', 'ArticlesController@store')->name('admin.store');

//Route::get('admin/articles', 'ArticlesController@index')->name('admin.articles');

//Route::get('admin/{id}/edit', 'ArticlesController@edit')->name('admin.edit');

//Route::patch('admin/{id}', 'ArticlesController@update')->name('admin.update');

//Route::delete('admin/{id}', 'ArticlesController@destroy')->name('admin.destroy');


// Les Users

Route::get('profiles/{id}', 'ProfileController@show')->name('profiles.show');

Route::get('profiles/{id}/edit', 'ProfileController@edit')->name('profiles.edit');

Route::patch('profiles/edit', 'ProfileController@update')->name('profiles.update');

//Route::patch('profiles/{id}', 'ProfileController@destroy')->name('profiles.destroy');
