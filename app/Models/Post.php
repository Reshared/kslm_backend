<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    protected $typeMap = [
        '技术支持', '服务与帮助', '行业动态'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_post_relations');
    }

    public function getTypeAttribute($type)
    {
        return $this->typeMap[$type];
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }
}
