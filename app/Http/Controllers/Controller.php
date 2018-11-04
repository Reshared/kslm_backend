<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MajorCategory;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function categories($noProduct = false)
    {
        if ($noProduct) {
            $categories = Category::withDepth()->defaultOrder()->withCount('products')->get();
        } else {
            $forbidIds = Category::hasChildren()->get()->pluck('id')->toArray();
            $categories = Category::withDepth()->defaultOrder()->whereNotIn('id', $forbidIds)->get();
        }
        $cateArr = [];
        foreach ($categories as $category) {
            if ($noProduct && $category->products_count > 0) {
                continue;
            }

            $prefix = '|—';
            for ($i = 0; $i < $category->depth; $i++) {
                $prefix .= '——';
            }
            $cateArr[$category->id] = $prefix . $category->name;
        }
        return $cateArr;
    }

    protected function majorCategories()
    {
        $majorCategories = MajorCategory::get();
        $majorArr = [];
        foreach ($majorCategories as $category) {
            $majorArr[$category->id] = $category->name;
        }
        return $majorArr;
    }

    protected function posts()
    {
        $posts = Post::all();
        $postArr = [];
        foreach ($posts as $post) {
            $postArr[$post->id] = '【' . $post->type . '】' . $post->title;
        }
        return $postArr;
    }

    protected function getSetting($add = [])
    {
        $keys = array_merge(['logo', 'wechat_qrcode', 'top_words', 'qa_tel', 'contact_way'], $add);
        $settings = Setting::whereIn('skey', $keys)->get();
        $result = [];
        $result['logo'] = $settings->where('skey', 'logo')->first()->svalue;
        $result['qrcode'] = $settings->where('skey', 'wechat_qrcode')->first()->svalue;
        $result['top_words'] = $settings->where('skey', 'top_words')->first()->svalue;
        $result['tel'] = $settings->where('skey', 'qa_tel')->first()->svalue;
        $result['contact'] = json_decode($settings->where('skey', 'contact_way')->first()->svalue, true);
        foreach ($add as $value) {
            $result[$value] = $settings->where('skey', $value)->first()->svalue;
        }
        return $result;
    }
}
