<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Blog;
use \App\User;

class SortController extends Controller
{
    public function oldnew()
    {
        $sortMethod = 'oldnew';
        $blogs = Blog::orderBy('created_at', 'asc')->get();
        return view('blogs.index', compact('blogs', 'sortMethod'));
    }

    public function author()
    {
        $sortMethod = 'author';
        // $blogs = Blog::join('users', 'blogs.owner_id', '=', 'users.id')->orderBy(array('users.lastname' => 'desc', 'users.firstname' => 'asc'))->get();
        $blogs = Blog::join('users', 'blogs.owner_id', '=', 'users.id')->orderBy('users.last_name', 'asc')->orderBy('users.first_name', 'desc')->get();
        return view('blogs.index', compact('blogs', 'sortMethod'));
    }
}
