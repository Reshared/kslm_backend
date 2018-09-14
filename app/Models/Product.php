<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function getImageAttribute($url)
    {
        if (substr($url, 0, 4) != 'http') {
            return url($url);
        }
        return $url;
    }

    public function getImageGroupAttribute($urls)
    {
        if (!$urls) {
            return [];
        }

        $urls = explode(',', $urls);
        foreach ($urls as &$url) {
            if (substr($url, 0, 4) != 'http') {
                $url = url($url);
            }
        }

        return $urls;
    }

    public function setImageGroupAttribute($urls)
    {
        if (is_array($urls)) {
            $this->attributes['image_group'] = implode(',', $urls);
        } else {
            $this->attributes['image_group'] = $urls;
        }
    }

    public function majorCategory()
    {
        return $this->belongsTo(MajorCategory::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'product_post_relations');
    }

    public function scopeByCategory($query, $cid)
    {
        return $query->where('category_id', $cid);
    }
}
