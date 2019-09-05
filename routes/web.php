<?php

use \App\Blog;
use \App\User;
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

Route::get('/', 'PagesController@home')->name('home');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/profile', 'PagesController@profile')->name('profile');
Route::get('/guestprofiles', function (user $user) {
    $users = User::where('role', 'guest')->get();
    return view('gprof', compact('users'));
});

Route::middleware(['auth'])->group(function () {
    Route::resource('blogs', 'BlogsController')->name('index', 'blogs');
});

Route::get('ajax', 'BlogsController@ajax');
Route::get('ajax2', 'BlogsController@ajax2');


Route::resource('/categories', 'CategoriesController')->name('index', 'categories')->middleware('admin');

// Route::get('/sortoldnew', 'SortController@oldnew');
// Route::get('/sortauthor', 'SortController@author');

Route::get('/comments/{comment}/edit', 'BlogCommentsController@edit');
Route::post('/blogs/{blog}/comments', 'BlogCommentsController@store');
Route::patch('/comments/{comment}', 'BlogCommentsController@update');
Route::delete('comments/{comment}', 'BlogCommentsController@destroy');

Route::post('blogcategories/{category}', 'BlogCategoriesController@store');

Route::patch('/blogpremium/{blog}', function (blog $blog) {
    $blog->update([
        'premium' => request()->has('premium')
    ]);
    return back();
});

Route::patch('/guestpremium/{guest}', function (user $user) {
    $user->update([
        'premium' => request()->has('guestpremium')
    ]);
    return back();
});



Route::get('form/{blog}', 'FormController@show');
// Route::get('form', 'FormController@create');
Route::post('form', 'FormController@store');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
