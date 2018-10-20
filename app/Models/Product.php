<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    protected $perPage = 16;

    public function getImageAttribute($url)
    {
        if (substr($url, 0, 4) != 'http') {
            return url($url);
        }
        return $url;
    }

    public function getFilesAttribute($files)
    {
        if (!$files) {
            return [];
        }

        $urls = explode(',', $files);
        foreach ($urls as &$url) {
            if (substr($url, 0, 4) != 'http') {
                $url = url($url);
            }
        }

        return $urls;
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
        $imagesPaths = str_replace(['"",', ',,'], ['', ','], $urls);
        $this->attributes['image_group'] = trim($imagesPaths, ',');
    }

    public function setFilesAttribute($urls)
    {
        $imagesPaths = str_replace(['"",', ',,'], ['', ','], $urls);
        $this->attributes['files'] = trim($imagesPaths, ',');
    }

    public function getImagesPathsAttribute()
    {
        return $this->attributes['image_group'];
    }

    public function getFilesPathsAttribute()
    {
        return $this->attributes['files'];
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
