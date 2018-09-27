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
use App\Models\Honor;
use App\Models\MajorCategory;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Post;

class IndexController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('sort', 'desc')->orderBy('created_at', 'desc')->get();
        $posts = Post::take(9)
            ->orderBy('is_stick', 'desc')
            ->orderBy('sort', 'asc')
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        $partners = Partner::isRecommend()->orderBy('sort', 'desc')->orderBy('created_at', 'desc')->take(5)->get();

        return view('kslm.index', compact('posts', 'partners', 'banners'));
    }

    public function filter()
    {
        $majorCategories = MajorCategory::orderBy('sort', 'desc')->orderBy('created_at', 'desc')->get();

        $id = request('id', 0);

        return view('kslm.filter', compact('majorCategories', 'id'));
    }

    public function support()
    {
        $type = request('type', 0);

        $posts = Post::byType($type)->orderBy('is_stick', 'desc')->orderBy('sort')->orderBy('created_at', 'desc')->paginate();

        return view('kslm.support', compact('posts', 'type'));
    }

    public function cooperative()
    {
        $partners = Partner::orderBy('sort')->paginate();

        return view('kslm.cooperative', compact('partners'));
    }

    public function about()
    {
        $introduce = Page::find(1);

        $image = Page::find(2);

        $jobs = Page::find(3);

        $honors = Honor::orderBy('sort', 'desc')->orderBy('created_at', 'desc')->get();

        return view('kslm.about', compact('introduce', 'image', 'jobs', 'honors'));
    }

    public function contact()
    {
        return view('kslm.contact');
    }
}