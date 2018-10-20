<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/10
 * Time: 下午5:03
 */

namespace App\Http\Controllers;


use App\Models\Banner;
use App\Models\Category;
use App\Models\MajorCategory;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductPostRelation;

class ContentController extends Controller
{
    public function filter($id)
    {
        $banners = Banner::orderBy('sort')->get();

        $categories = MajorCategory::orderBy('sort', 'desc')->orderBy('created_at', 'desc')->get();

        $product = Product::findOrFail($id);

        $product->increment('clicks');

        $product = $product->toArray();

        $ids = ProductPostRelation::where('product_id', $id)->take(3)->get()->pluck('post_id')->toArray();

        $releases = Post::whereIn('id', $ids)->get();

        return view('kslm.filter_detail', compact('banners', 'categories', 'product', 'releases'));
    }

    public function support($id)
    {
        $banners = Banner::orderBy('sort')->get();

        $post = Post::findOrFail($id);

        $post->increment('clicks');

        $type = 0;
        if ($post->type == '服务与帮助') $type = 1;
        elseif ($post->type == '行业动态') $type = 2;

        $posts = Post::byType($type)->select('id')->orderBy('is_stick', 'desc')->orderBy('sort')->orderBy('created_at', 'desc')->get()->pluck('id')->toArray();

        $key = array_search($id, $posts);

        if ($key == 0) {
            $pre = null;
            $next = Post::find($posts[$key + 1]);
        } elseif ($key == count($posts) - 1) {
            $next = null;
            $pre = Post::find($posts[$key - 1]);
        } else {
            $pre = Post::find($posts[$key - 1]);
            $next = Post::find($posts[$key + 1]);
        }

        return view('kslm.support_detail', compact('banners', 'post', 'pre', 'next'));
    }

    public function cooperative($id)
    {
        $banners = Banner::orderBy('sort')->get();

        $partner = Partner::findOrFail($id);

        $partner->increment('clicks');

        $next = Partner::where('id', '>', $id)->orderBy('id')->first();

        $pre = Partner::where('id', '<', $id)->orderBy('id', 'desc')->first();

        return view('kslm.cooperative_detail', compact('banners', 'partner', 'pre', 'next'));
    }
}