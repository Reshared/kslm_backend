<?php
/**
 * Created by PhpStorm.
 * User: resharedhou
 * Date: 2018/11/4
 * Time: 11:27 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    public $timestamps = false;

    protected $guarded = [];

    public function getSvalueAttribute($value)
    {
        if ($this->stype == 'image') {
            return url($value);
        } elseif ($this->stype == 'images') {
            if (!$value) return [];
            $images = explode(',', $value);
            $arr = [];
            foreach ($images as $image) {
                if ($image) {
                    $arr[] = url($image);
                }
            }
            return $arr;
        }
        return $value;
    }

    public function getImagesPathsAttribute()
    {
        return $this->attributes['svalue'];
    }
}