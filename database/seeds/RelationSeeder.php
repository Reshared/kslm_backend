<?php

use Illuminate\Database\Seeder;

use App\Models\Product;
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

        $posts = Post::all()->pluck('id')->toArray();

        $pp = [];
        while (count($pp) < 10) {
            $pp[] = [
                'product_id' => array_random($products),
                'post_id' => array_random($posts)
            ];
        }

        DB::table('product_post_relations')->insert($pp);
    }
}
