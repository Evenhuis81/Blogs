<?php

use \App\Blog;
use \App\User;
use App\Digest;
use Illuminate\Http\Request;
use App\Mail\WeeklyBlogDigest;
use Illuminate\Support\Facades\Mail;

Route::get('/', 'PagesController@home')->name('home');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact', 'PagesController@contact')->name('contact');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', 'PagesController@profile')->name('profile');
    Route::resource('blogs', 'BlogsController')->name('index', 'blogs');
    
    Route::get('ajax', 'BlogsController@ajax');
    Route::get('ajax2', 'BlogsController@ajax2');
    Route::post('checkprem/{blog}', 'BlogsController@ajax3');

    Route::get('/comments/{comment}/edit', 'BlogCommentsController@edit');
    Route::post('/blogs/{blog}/comments', 'BlogCommentsController@store');
    Route::patch('/comments/{comment}', 'BlogCommentsController@update')->name('updaa');
    Route::delete('comments/{comment}', 'BlogCommentsController@destroy');

    Route::get('form/{blog}', 'FormController@show');
    Route::post('form', 'FormController@store');
    Route::delete('form/{blog}', 'FormController@destroy');
});

Route::get('/guestprofiles', function (user $user) {
    $users = User::where('role', 'guest')->get();
    return view('gprof', compact('users'));
});

Route::post('digest', function (Request $request) {
    $user = User::find($request->digestselect);
    if ($user->premium == 0) {
        $dblogs = Blog::where('premium', 0)->get();
        // and ofc , on create dates of that week
    } else {
        $dblogs = Blog::all();
        // and ofc, on create dates of that week
    }
    
    Digest::create([
        'user_id' => $user->id,
        'week' => 38
    ]);
    
    Mail::to($user->email)->send(
        new WeeklyBlogDigest($dblogs)
    );

    session()->flash('digestsent', '>> digest week ' . date('W') . ' sent for user' . $user->last_name . ' <<');

    return back();
});

Route::resource('/categories', 'CategoriesController')->middleware('admin')->name('index', 'categories');

// Route::get('/sortoldnew', 'SortController@oldnew');
// Route::get('/sortauthor', 'SortController@author');

// Route::post('blogcategories/{category}', 'BlogCategoriesController@store');

Route::patch('/blogpremium/{blog}', function (Blog $blog) {
    $blog->update([
        'premium' => request()->has('premium')
    ]);
    return back();
});

Route::patch('/guestpremium/{user}', function (User $user) {
    $user->update([
        'premium' => request()->has('premium')
    ]);

    if ($user->premium == true) {
        session()->flash('gprem', '>> premium set for ' . $user->last_name . ' <<');
    } else {
        session()->flash('gprem', '>> premium removed from ' . $user->last_name . ' <<');
    }

    return back();
});

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
