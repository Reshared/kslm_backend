<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker\Generator::class);

        DB::table('banners')->insert([
            [
                'title' => $faker->word,
                'image' => 'http://pevb27s43.bkt.clouddn.com/banner1.png',
                'sort' => 0,
                'url' => 'https://baidu.com',
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ], [
                'title' => $faker->word,
                'image' => 'http://pevb27s43.bkt.clouddn.com/banner2.png',
                'sort' => 1,
                'url' => null,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ], [
                'title' => $faker->word,
                'image' => 'http://pevb27s43.bkt.clouddn.com/banner3.png',
                'sort' => 2,
                'url' => null,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ], [
                'title' => $faker->word,
                'image' => 'http://pevb27s43.bkt.clouddn.com/banner4.png',
                'sort' => 3,
                'url' => 'https://baidu.com',
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ], [
                'title' => $faker->word,
                'image' => 'http://pevb27s43.bkt.clouddn.com/banner5.png',
                'sort' => 4,
                'url' => null,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],
        ]);
    }
}
