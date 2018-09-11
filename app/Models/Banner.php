<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $guarded = ['id'];

    public function getImageAttribute($url)
    {
        if (substr($url, 0, 4) != 'http') {
            return url($url);
        }
        return $url;
    }
}
