<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    protected $dates = ['created_at'];

    public function author()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id');
    }

    public function addComment($comment)
    {

        $this->comments()->create($comment);
        // return Task::create([
        //     'post_id' => $this->id,
        //     'description' => $description
        // ]);
    }

    public function blogtasks()
    {
        return $this->hasMany(Blogtask::class, 'blog_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
