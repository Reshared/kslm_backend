<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker\Generator::class);

        DB::table('partners')->insert([
            [
                'name' => '中凯联讯',
                'sort' => rand(0, 10),
                'image' => 'http://pevb27s43.bkt.clouddn.com/1.png',
                'is_recommend' => 0,
                'content' => $faker->text(),
                'clicks' => 0,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ], [
                'name' => '中凯联讯',
                'sort' => rand(0, 10),
                'image' => 'http://pevb27s43.bkt.clouddn.com/2.png',
                'is_recommend' => 0,
                'content' => $faker->text(),
                'clicks' => 0,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],[
                'name' => '中凯联讯',
                'sort' => rand(0, 10),
                'image' => 'http://pevb27s43.bkt.clouddn.com/3.png',
                'is_recommend' => 0,
                'content' => $faker->text(),
                'clicks' => 0,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],[
                'name' => '中凯联讯',
                'sort' => rand(0, 10),
                'image' => 'http://pevb27s43.bkt.clouddn.com/4.png',
                'is_recommend' => 0,
                'content' => $faker->text(),
                'clicks' => 0,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],[
                'name' => '中凯联讯',
                'sort' => rand(0, 10),
                'image' => 'http://pevb27s43.bkt.clouddn.com/5.png',
                'is_recommend' => 0,
                'content' => $faker->text(),
                'clicks' => 0,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],[
                'name' => '中凯联讯',
                'sort' => rand(0, 10),
                'image' => 'http://pevb27s43.bkt.clouddn.com/6.png',
                'is_recommend' => 0,
                'content' => $faker->text(),
                'clicks' => 0,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],[
                'name' => '中凯联讯',
                'sort' => rand(0, 10),
                'image' => 'http://pevb27s43.bkt.clouddn.com/7.png',
                'is_recommend' => 0,
                'content' => $faker->text(),
                'clicks' => 0,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],[
                'name' => '中凯联讯',
                'sort' => rand(0, 10),
                'image' => 'http://pevb27s43.bkt.clouddn.com/8.png',
                'is_recommend' => 0,
                'content' => $faker->text(),
                'clicks' => 0,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],[
                'name' => '中凯联讯',
                'sort' => rand(0, 10),
                'image' => 'http://pevb27s43.bkt.clouddn.com/9.png',
                'is_recommend' => 0,
                'content' => $faker->text(),
                'clicks' => 0,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],[
                'name' => '中凯联讯',
                'sort' => rand(0, 10),
                'image' => 'http://pevb27s43.bkt.clouddn.com/10.png',
                'is_recommend' => 0,
                'content' => $faker->text(),
                'clicks' => 0,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],[
                'name' => '中凯联讯',
                'sort' => rand(0, 10),
                'image' => 'http://pevb27s43.bkt.clouddn.com/11.png',
                'is_recommend' => 0,
                'content' => $faker->text(),
                'clicks' => 0,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],[
                'name' => '中凯联讯',
                'sort' => rand(0, 10),
                'image' => 'http://pevb27s43.bkt.clouddn.com/12.png',
                'is_recommend' => 0,
                'content' => $faker->text(),
                'clicks' => 0,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],[
                'name' => '中凯联讯',
                'sort' => rand(0, 10),
                'image' => 'http://pevb27s43.bkt.clouddn.com/5.png',
                'is_recommend' => 0,
                'content' => $faker->text(),
                'clicks' => 0,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],
        ]);
    }
}
