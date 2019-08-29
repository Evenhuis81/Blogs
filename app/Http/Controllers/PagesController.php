<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
// use Carbon\Carbon;

class PagesController extends Controller
{
    public function home()
    {

        $blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('welcome', compact('blogs'));
    }

    public function profile(Blog $blog)
    {
        if (auth()->id() == 0) {
            return redirect(route('login'));
        }

        if (auth()->user()->role == 'writer') {
            $blogs = Blog::where('owner_id', auth()->id())->get();
            return view('profile', compact('blogs'));
        } else {
            return view('profile');
        }
    }
}
