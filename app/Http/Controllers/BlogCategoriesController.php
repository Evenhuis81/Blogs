<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogCategoriesController extends Controller
{
    public function store()
    {
        if (request()->has('category')) {
            // voeg toe aan pivot
        } else {
            // verwijder uit pivot
        }
        return redirect('blogs/{blog}');
    }
}
