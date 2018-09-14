<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;

    protected $guarded = ['id'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'category_post_relations');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeGetChildren($query, Category $category)
    {
        return $query->where('_lft', '>', $category->_lft)->where('_rgt', '<', $category->_rgt);
    }
}
