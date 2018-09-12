<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/10
 * Time: 上午11:39
 */

namespace App\Http\Controllers;


use App\Models\Banner;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Post;

class IndexController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('sort')->get();

        $posts = Post::byType(0)
            ->take(9)
            ->orderBy('is_stick', 'desc')
            ->orderBy('sort', 'asc')
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        $partners = Partner::isRecommend()->orderBy('sort')->orderBy('created_at', 'desc')->take(5)->get();

        return view('kslm.index', compact('banners', 'posts', 'partners'));
    }

    public function filter()
    {
        $banners = Banner::orderBy('sort')->get();

        $categories = Category::whereIsRoot()->defaultOrder()->get();

        $id = request('id', 0);

        return view('kslm.filter', compact('banners', 'categories', 'id'));
    }

    public function support()
    {
        $type = request('type', 0);

        $posts = Post::byType($type)->orderBy('is_stick', 'desc')->orderBy('sort')->orderBy('created_at', 'desc')->paginate();

        $banners = Banner::orderBy('sort')->get();

        return view('kslm.support', compact('posts', 'type', 'banners'));
    }

    public function cooperative()
    {
        $banners = Banner::orderBy('sort')->get();

        $partners = Partner::orderBy('sort')->paginate();

        return view('kslm.cooperative', compact('banners', 'partners'));
    }

    public function about()
    {
        $banners = Banner::orderBy('sort')->get();

        return view('kslm.about', compact('banners'));
    }

    public function contact()
    {
        $banners = Banner::orderBy('sort')->get();

        return view('kslm.contact', compact('banners'));
    }
}