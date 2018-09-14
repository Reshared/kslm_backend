<?php
/**
 * Created by PhpStorm.
 * User: pineapplebeer
 * Date: 2018/9/10
 * Time: 下午1:06
 */

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\CategoryProductRelation;
use App\Models\Product;
use App\Models\Message;
use App\Http\Requests\MessageRequest;

class AjaxController extends Controller
{
    public function getCategories()
    {
        $id = request('id', 0);
        $isCategory = false;
        if (!$id) {
            $childrens = Category::whereIsRoot()->defaultOrder()->get();
            $isCategory = true;
        } else {
            //优先尝试获取产品
            $childrens = Product::byCategory($id)->get();
            if (count($childrens) <= 0) {
                $category = Category::with('children')->findOrFail($id);
                $childrens = $category->children;
                $isCategory = true;
            }
        }
        $arr = [];
        foreach ($childrens as $children) {
            $tmp = [
                'id' => $children->id,
                'name' => $children->name,
            ];
            $tmp['product'] = !$isCategory;
            $arr[] = $tmp;
        }
        return response()->json(['ok' => true, 'data' => $arr]);
    }

    public function getProducts()
    {
        $majorCategoryId = request('mid', 0);
        $categoryId = request('cid', 0);

        $categoryIds = [];

        if ($categoryId) {
            $categoryIds = explode(',', $categoryId);
        }

        if ($majorCategoryId == 0) {
            if ($categoryIds) {
                $products = Product::orderBy('sort')
                    ->whereIn('category_id', $categoryIds)
                    ->with('majorCategory')
                    ->paginate();
            } else {
                $products = Product::orderBy('sort')
                    ->with('majorCategory')
                    ->paginate();
            }
        } else {
            if ($categoryIds) {
                $products = Product::where('major_category_id', $majorCategoryId)
                    ->whereIn('category_id', $categoryIds)
                    ->orderBy('sort')
                    ->with('majorCategory')
                    ->paginate();
            } else {
                $products = Product::where('major_category_id', $majorCategoryId)
                    ->orderBy('sort')
                    ->with('majorCategory')
                    ->paginate();
            }
        }

        return response()->json($products);
    }

    public function postMessage(MessageRequest $request)
    {
        Message::create($request->only([
            'name', 'company', 'address', 'mobile', 'email', 'job', 'content', 'interest', 'area'
        ]));

        return redirect()->back()->with('msg', '留言成功');
    }
}