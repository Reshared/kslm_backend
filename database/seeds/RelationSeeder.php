<?php

use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryProductRelation;
use App\Models\ProductPostRelation;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all()->pluck('id')->toArray();

        $categories = Category::all()->pluck('id')->toArray();

        $posts = Post::all()->pluck('id')->toArray();

        $cp = [];
        $pp = [];
        while (count($cp) < 10 || count($pp) < 10) {
            $cp[] = [
                'product_id' => array_random($products),
                'category_id' => array_random($categories)
            ];
            $pp[] = [
                'product_id' => array_random($products),
                'post_id' => array_random($posts)
            ];
        }

        DB::table('category_product_relations')->insert($cp);
        DB::table('product_post_relations')->insert($pp);
    }
}
