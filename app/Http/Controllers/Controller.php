<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MajorCategory;
use App\Models\Post;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function categories()
    {
        $categories = Category::withDepth()->defaultOrder()->get();
        $cateArr = [];
        foreach ($categories as $category) {
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
}
