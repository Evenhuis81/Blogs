<?php

namespace App;
// use App\Blog;

use App\Digest;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'role', 'premium',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function owns(Blog $blog) {
        return (auth()->user()->id == $blog->owner_id);
    }

    public function blogs() {
        return $this->hasMany(Blog::class, 'owner_id');
        // return (auth()->user()->id == $blog->owner_id);
    }

    public function digest() {
        return $this->hasOne(Digest::class, 'user_id');
    }
}
