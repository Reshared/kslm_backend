<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Honor extends Model
{
    protected $guarded = ['id'];

    public function getImageAttribute($url)
    {
        return url($url);
    }
}
