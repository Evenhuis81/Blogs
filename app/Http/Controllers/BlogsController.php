<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\User;
use App\Mail\BlogCreated;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    //     $this->middleware('can:update,project')
    //         ->except(['index', 'store', 'create']);
    // }
    // public function __construct()
    // {
    //     $this->middleware('auth')->only(['store', 'update']);
    //     $this->middleware('auth')->except(['store', 'update']);
    // }
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

    public function ajax(Request $request, Blog $blog, ?User $user)
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

        $blogs = Blog::whereHas('categories', function ($query) use ($category_ids) {
            $query->whereIn('categories.id', $category_ids);
        })->get();

        // index example:
        // auth()->id() 0 = guest , rest = user_id
        // auth->user()  not sure what you get , all user data?
        // auth->check() check to see if user is logged in , boolean
        // auth(->)guest()  if guest , do this ...
        // $projects = Project::where('owner_id', auth()->id())->get();  select * from projects where owner_id = auth user id

        return view('.\ajax', compact('blogs'));
    }

    public function ajax3(Request $request, Blog $blog)
    {
        $blogid = ($request->get('blogid'));
        $blog = Blog::find($blogid);
        if ($blog->premium == true) {
            $blog->update([
                'premium' => false
            ]);
        } else {
            $blog->update([
                'premium' => true
            ]);
        }
        // $blog->update([
        //     'premium' => request()->has('premium')
        // ]);
        return view('.\checkprem', compact('blog'));
    }

    public function ajax2(Blog $blog)
    {
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
            'description' => ['required', 'min:3']
        ]);
        $attributes['owner_id'] = auth()->id();
        // Project::create($attributes + ['owner_id' => 6]);
        Blog::create($attributes + ['premium' => 1]);

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
        if (auth()->user()->role == 'guest' && auth()->user()->premium == false && $blog->premium == true) {
            abort(403);
        }
        // $this->authorize('view', $blog);
        // if (\Gate::denies('view', $blog)) {
        //     return redirect('home');
        // }
        // if ($project->owner_id !== auth()->id()) {
        //     abort(403);
        // }
        // abort_if($project->owner_id !== auth()->id(), 403);
        // abort_if (! auth()->user()->owns($project), 403);
        // abort_unless(auth()->user()->owns($project), 403);

        // public function owns($project){ return (auth()->user()->id == $project->owner_id); }  in user model
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
        // dd(request('categories'));
        
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
        $blog->categories()->sync(request('categories'));
        // $categories = Category::all();
        return view('blogs.show', compact('blog'));
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
        return redirect(route('blogs'));
    }
}
