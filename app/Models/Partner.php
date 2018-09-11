<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $guarded = ['id'];

    protected $perPage = 12;

    public function scopeIsRecommend($query)
    {
        return $query->where('is_recommend', 1);
    }

    public function getImageAttribute($url)
    {
        if (substr($url, 0, 4) != 'http') {
            return url($url);
        }
        return $url;
    }
}
