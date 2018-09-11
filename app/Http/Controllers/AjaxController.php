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

class AjaxController extends Controller
{
    public function getCategories()
    {
        $id = request('id');
        $category = Category::with('children')->findOrFail($id);
        $childrens = $category->children;
        $arr = [];
        foreach ($childrens as $children) {
            $arr[] = [
                'id' => $children->id,
                'name' => $children->name,
            ];
        }
        return response()->json(['ok' => true, 'data' => $arr]);
    }

    public function getProducts()
    {
        $id = request('id', 1);
        $ids = CategoryProductRelation::byCategory($id)->get()->pluck('product_id')->toArray();

        $products = Product::whereIn('id', $ids)->orderBy('sort')->select('id', 'name', 'description', 'image')->paginate();
        return response()->json($products);
    }
}