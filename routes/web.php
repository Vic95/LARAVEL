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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/article', 'ArticleController');

Route::resource('/commentaire', 'CommentaireController');

Route::get('/user', function() {
    return view('user');
});

Route::get('/admin', function() {
    return view('dashboard');
});

Route::resource('/adminarticle', 'AdminArticleController');

Route::resource('/admincommentaire', 'AdminCommentaireController');

Route::post('article/{id}/like', ['as' => 'article.like', 'uses' => 'ArticleController@like']);

Route::post('article/{id}/unlike', ['as' => 'article.unlike', 'uses' => 'ArticleController@unlike']);
