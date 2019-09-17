<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comment;

class BlogCommentsController extends Controller
{
    public function store(Blog $blog)
    {
        $attributes1 = request()->validate([
            'description' => 'required|min:3',
            'subject' => 'required|min:3',
            // 'blog_id' => $blog->id ??
            // aka the blog_id magical laravel fill it in
        ]);
        $attributes2 = array('owner_id' => auth()->user()->id);
        $attributes3 = $attributes1 + $attributes2;
        // dd($attributes3);
        $blog->addComment($attributes3);
        // Task::create([
        //     'post_id' => $post->id,
        //     'description' => request('description')
        // ]);

        return back();

        // owner_id = default, has to be the one that is logged in


        // $attributes = request()->validate([
        //     'title' => ['required', 'min:3', 'max:255'],
        //     'description' => ['required', 'min:3'],
        // ]);
        // Blog::create($attributes);
        // return redirect('/blogs');
    }

    public function update(Comment $comment)
    {
        $comment->update(request()->validate([
            'subject' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3']
            ]));

        session()->flash('updatecomment', '>> comment updated <<');
        return redirect()->route('blogs.show', ['id' => $comment->blog_id]);
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function destroy(Comment $comment)
    {
        $commid = $comment->blog_id;
        $comment->delete();
        return redirect()->route('blogs.show', ['id' => $commid]);
        
    }
}
