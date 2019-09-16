<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Digest extends Model
{
    protected $fillable = [
        'week', 'user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
