<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('honors')->insert([
            [
                'name' => '第一个',
                'image' => 'http://pevb27s43.bkt.clouddn.com/honor1.png',
                'sort' => rand(0, 10),
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],
            [
                'name' => '第2个',
                'image' => 'http://pevb27s43.bkt.clouddn.com/honor2.png',
                'sort' => rand(0, 10),
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],
            [
                'name' => '第4个',
                'image' => 'http://pevb27s43.bkt.clouddn.com/honor4.png',
                'sort' => rand(0, 10),
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],
            [
                'name' => '第4个',
                'image' => 'http://pevb27s43.bkt.clouddn.com/honor4.png',
                'sort' => rand(0, 10),
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],
            [
                'name' => '第5个',
                'image' => 'http://pevb27s43.bkt.clouddn.com/honor5.png',
                'sort' => rand(0, 10),
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],
            [
                'name' => '第6个',
                'image' => 'http://pevb27s43.bkt.clouddn.com/honor6.png',
                'sort' => rand(0, 10),
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],
        ]);
    }
}
