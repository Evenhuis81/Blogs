<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Digest extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
