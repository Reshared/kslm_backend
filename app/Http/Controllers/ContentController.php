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
use App\Models\Partner;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductPostRelation;

class ContentController extends Controller
{
    public function filter($id)
    {
        $from = request('from');

        $banners = Banner::orderBy('sort')->get();

        $categories = Category::whereIsRoot()->defaultOrder()->get();

        if (!$from) {
            $from = $categories->first()->id;
        }

        $product = Product::findOrFail($id);

        $product->increment('clicks');

        $product = $product->toArray();

        $ids = ProductPostRelation::where('product_id', $id)->take(3)->get()->pluck('post_id')->toArray();

        $releases = Post::whereIn('id', $ids)->get();

        return view('kslm.filter_detail', compact('banners', 'categories', 'product', 'from', 'releases'));
    }

    public function support($id)
    {
        $banners = Banner::orderBy('sort')->get();

        $post = Post::findOrFail($id);

        $post->increment('clicks');

        $next = Post::byType($post->type)->where('id', '>', $id)->orderBy('id')->first();

        $pre = Post::byType($post->type)->where('id', '<', $id)->orderBy('id', 'desc')->first();

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