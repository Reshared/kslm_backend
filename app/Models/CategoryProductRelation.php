<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProductRelation extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function scopeByCategory($query, $cid)
    {
        return $query->where('category_id', $cid);
    }
}
