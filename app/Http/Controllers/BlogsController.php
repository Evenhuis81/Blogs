<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\User;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $sortMethod = 'newold';
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        // dd($blogs);
        //$categories = $blogs
        return view('blogs.index', compact('blogs', 'sortMethod', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    public function ajax(Request $request, Blog $blog)
    {

        $numbers = ($request->get('numbers'));
        $category_ids = preg_split("/\,/", $numbers);
        
        // dd($blog);
        // $blogs = [];
        // $blogss = [];
        // $blogstemp = Blog::all();
        
        // foreach ($blogstemp as $blog) {
        //     foreach ($blog->categories as $blogcat) {
        //         foreach ($category_ids as $catid) {
        //             if ($catid == )
        //         }
        //     }
        // }

        $blogs = Blog::whereHas('categories', function($query) use ($category_ids) {
            $query->whereIn('categories.id', $category_ids);
        })->get();
        



        // for ($i = 0; $i < count($str_arr); $i++) {
        //     $catblog[] = Category::find($str_arr[$i])->blogs()->get();
        // }
        // var_dump($catblog);


        // $blogs = [];

        // foreach ($category_ids as $category_id) {
        //     $catbloo = Category::find($category_id)->blogs()->get();


        //     foreach ($catbloo as $blog) {
        //         if (count($blogs) == 0) {
        //             $blogs[] = $blog;
        //         } else {
        //             for ($i = 0; $i < count($blogs); $i++) {
        //                 if ($blogs[$i]->id == $blog->id) {
        //                     continue;
        //                 } else $blogs[] = $blog;
        //             } 
                    
        //         }
        //     }
        // }

        // array_push($catblog, $catbloo);




        // $array = array_push($numbers);


        // for ($i = 0; $i < strlen($numbers); $i++) {
        # code...
        // }


        // foreach ($numbers as $number) {
        // }
        // $cat = Category::find(1);
        // $catz = $cat->blogs()->get();
        // dd($catz);
        return view('.\ajax', compact('blogs'));
    }

    public function ajax2(Blog $blog) {
        $blogs = Blog::all();
        return view('.\ajax', compact('blogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3'],
        ]);
        Blog::create($attributes);
        return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->categories()->sync(request('categories'));
        // if (request()->has('cid')) {
        //     if (request()->has('category')) {
        //         dd('add category');
        //     } else {
        //         dd('remove category');
        //     }
        //     // voeg toe aan pivot
        // } else {
        //     dd('update blog');
        //     // verwijder uit pivot
        // }
        $blog->update(request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3']
        ]));
        return redirect('/blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect('/blogs');
    }
}
