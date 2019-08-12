<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comment;

class BlogCommentsController extends Controller
{
    public function store(Blog $blog)
    {
        $attributes = request()->validate([
            'description' => 'required|min:3',
            'subject' => 'required|min:3'
        ]);
        $blog->addComment($attributes);
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
        $comment->update(request(['subject', 'description']));
        return redirect()->route('blogs.show', ['id' => $comment->blog_id]);
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect('comments.edit', compact('comment'));
    }
}
