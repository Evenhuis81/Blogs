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
}
