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

Route::get(
    'posts',
    'PostsController@index'
)->name('posts.index')->middleware('auth');
Route::get('posts/create','PostsController@create')->middleware('auth');

Route::post('posts','PostsController@store')->middleware('auth');

Route::get('posts/edit/{id}','PostsController@edit')->middleware('auth');

Route::put('posts/update/{id}','PostsController@update')->middleware('auth');

Route::get('posts/view/{id}','PostsController@view')->middleware('auth');

Route::delete('posts/delete/{id}','PostsController@destroy')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');