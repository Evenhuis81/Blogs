<?php

use \App\Blog;
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

Route::get('/', 'PagesController@home');
Route::resource('blogs', 'BlogsController');

Route::resource('/categories', 'CategoriesController');

Route::get('/sortoldnew', 'SortController@oldnew');
Route::get('/sortauthor', 'SortController@author');

Route::get('/comments/{comment}/edit', 'BlogCommentsController@edit');
Route::post('/blogs/{blog}/comments', 'BlogCommentsController@store');
Route::patch('/comments/{comment}', 'BlogCommentsController@update');
Route::delete('comments/{comment}', 'BlogCommentsController@destroy');

Route::post('blogcategories/{category}', 'BlogCategoriesController@store');
