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

Route::resource('/categories', 'CategoriesController')->middleware('auth');

Route::get('/sortoldnew', 'SortController@oldnew');
Route::get('/sortauthor', 'SortController@author');

Route::get('/comments/{comment}/edit', 'BlogCommentsController@edit');
Route::post('/blogs/{blog}/comments', 'BlogCommentsController@store');
Route::patch('/comments/{comment}', 'BlogCommentsController@update')->name('updaa');
Route::delete('comments/{comment}', 'BlogCommentsController@destroy');

Route::post('blogcategories/{category}', 'BlogCategoriesController@store');

Route::patch('/blogpremium/{blog}', function (blog $blog) {
    $blog->update([
        'premium' => request()->has('premium')
    ]);
    return back();
});

Route::get('ajax', 'BlogsController@ajax');
Route::get('ajax2', 'BlogsController@ajax2');

Route::get('form/{blog}', 'FormController@show');
// Route::get('form', 'FormController@create');
Route::post('form', 'FormController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
