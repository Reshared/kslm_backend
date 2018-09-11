<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker\Generator::class);

        $images = [
            'http://pevb27s43.bkt.clouddn.com/detail1.png',
            'http://pevb27s43.bkt.clouddn.com/detail2.png',
            'http://pevb27s43.bkt.clouddn.com/detail3.png',
        ];

        DB::table('products')->insert([
            [
                'name' => 'KOCH-SR100系列纳滤膜',
                'description' => $faker->text(),
                'seo_title' => '这里是seo标题',
                'seo_keywords' => '这里是seo关键词',
                'seo_description' => '这里是seo描述',
                'image' => array_random($images),
                'image_group' => implode(',', $images),
                'sort' => rand(0, 10),
                'content' => $faker->text(),
                'clicks' => rand(0, 1000),
            ],[
                'name' => 'KOCH-SR100系列纳滤膜',
                'description' => $faker->text(),
                'seo_title' => '这里是seo标题',
                'seo_keywords' => '这里是seo关键词',
                'seo_description' => '这里是seo描述',
                'image' => array_random($images),
                'image_group' => implode(',', $images),
                'sort' => rand(0, 10),
                'content' => $faker->text(),
                'clicks' => rand(0, 1000),
            ],[
                'name' => 'KOCH-SR100系列纳滤膜',
                'description' => $faker->text(),
                'seo_title' => '这里是seo标题',
                'seo_keywords' => '这里是seo关键词',
                'seo_description' => '这里是seo描述',
                'image' => array_random($images),
                'image_group' => implode(',', $images),
                'sort' => rand(0, 10),
                'content' => $faker->text(),
                'clicks' => rand(0, 1000),
            ],[
                'name' => 'KOCH-SR100系列纳滤膜',
                'description' => $faker->text(),
                'seo_title' => '这里是seo标题',
                'seo_keywords' => '这里是seo关键词',
                'seo_description' => '这里是seo描述',
                'image' => array_random($images),
                'image_group' => implode(',', $images),
                'sort' => rand(0, 10),
                'content' => $faker->text(),
                'clicks' => rand(0, 1000),
            ],[
                'name' => 'KOCH-SR100系列纳滤膜',
                'description' => $faker->text(),
                'seo_title' => '这里是seo标题',
                'seo_keywords' => '这里是seo关键词',
                'seo_description' => '这里是seo描述',
                'image' => array_random($images),
                'image_group' => implode(',', $images),
                'sort' => rand(0, 10),
                'content' => $faker->text(),
                'clicks' => rand(0, 1000),
            ],[
                'name' => 'KOCH-SR100系列纳滤膜',
                'description' => $faker->text(),
                'seo_title' => '这里是seo标题',
                'seo_keywords' => '这里是seo关键词',
                'seo_description' => '这里是seo描述',
                'image' => array_random($images),
                'image_group' => implode(',', $images),
                'sort' => rand(0, 10),
                'content' => $faker->text(),
                'clicks' => rand(0, 1000),
            ],[
                'name' => 'KOCH-SR100系列纳滤膜',
                'description' => $faker->text(),
                'seo_title' => '这里是seo标题',
                'seo_keywords' => '这里是seo关键词',
                'seo_description' => '这里是seo描述',
                'image' => array_random($images),
                'image_group' => implode(',', $images),
                'sort' => rand(0, 10),
                'content' => $faker->text(),
                'clicks' => rand(0, 1000),
            ],[
                'name' => 'KOCH-SR100系列纳滤膜',
                'description' => $faker->text(),
                'seo_title' => '这里是seo标题',
                'seo_keywords' => '这里是seo关键词',
                'seo_description' => '这里是seo描述',
                'image' => array_random($images),
                'image_group' => implode(',', $images),
                'sort' => rand(0, 10),
                'content' => $faker->text(),
                'clicks' => rand(0, 1000),
            ],[
                'name' => 'KOCH-SR100系列纳滤膜',
                'description' => $faker->text(),
                'seo_title' => '这里是seo标题',
                'seo_keywords' => '这里是seo关键词',
                'seo_description' => '这里是seo描述',
                'image' => array_random($images),
                'image_group' => implode(',', $images),
                'sort' => rand(0, 10),
                'content' => $faker->text(),
                'clicks' => rand(0, 1000),
            ],[
                'name' => 'KOCH-SR100系列纳滤膜',
                'description' => $faker->text(),
                'seo_title' => '这里是seo标题',
                'seo_keywords' => '这里是seo关键词',
                'seo_description' => '这里是seo描述',
                'image' => array_random($images),
                'image_group' => implode(',', $images),
                'sort' => rand(0, 10),
                'content' => $faker->text(),
                'clicks' => rand(0, 1000),
            ],[
                'name' => 'KOCH-SR100系列纳滤膜',
                'description' => $faker->text(),
                'seo_title' => '这里是seo标题',
                'seo_keywords' => '这里是seo关键词',
                'seo_description' => '这里是seo描述',
                'image' => array_random($images),
                'image_group' => implode(',', $images),
                'sort' => rand(0, 10),
                'content' => $faker->text(),
                'clicks' => rand(0, 1000),
            ],[
                'name' => 'KOCH-SR100系列纳滤膜',
                'description' => $faker->text(),
                'seo_title' => '这里是seo标题',
                'seo_keywords' => '这里是seo关键词',
                'seo_description' => '这里是seo描述',
                'image' => array_random($images),
                'image_group' => implode(',', $images),
                'sort' => rand(0, 10),
                'content' => $faker->text(),
                'clicks' => rand(0, 1000),
            ],[
                'name' => 'KOCH-SR100系列纳滤膜',
                'description' => $faker->text(),
                'seo_title' => '这里是seo标题',
                'seo_keywords' => '这里是seo关键词',
                'seo_description' => '这里是seo描述',
                'image' => array_random($images),
                'image_group' => implode(',', $images),
                'sort' => rand(0, 10),
                'content' => $faker->text(),
                'clicks' => rand(0, 1000),
            ],[
                'name' => 'KOCH-SR100系列纳滤膜',
                'description' => $faker->text(),
                'seo_title' => '这里是seo标题',
                'seo_keywords' => '这里是seo关键词',
                'seo_description' => '这里是seo描述',
                'image' => array_random($images),
                'image_group' => implode(',', $images),
                'sort' => rand(0, 10),
                'content' => $faker->text(),
                'clicks' => rand(0, 1000),
            ],[
                'name' => 'KOCH-SR100系列纳滤膜',
                'description' => $faker->text(),
                'seo_title' => '这里是seo标题',
                'seo_keywords' => '这里是seo关键词',
                'seo_description' => '这里是seo描述',
                'image' => array_random($images),
                'image_group' => implode(',', $images),
                'sort' => rand(0, 10),
                'content' => $faker->text(),
                'clicks' => rand(0, 1000),
            ],
        ]);
    }
}
