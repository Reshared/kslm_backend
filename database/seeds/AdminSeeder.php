<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //后台管理菜单
        DB::table('admin_menu')->insert([
            [
                'parent_id' => 0,
                'order' => 1,
                'title' => 'Banner管理',
                'icon' => 'fa-archive',
                'uri' => '/banners',
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ], [
                'parent_id' => 0,
                'order' => 2,
                'title' => '资讯管理',
                'icon' => 'fa-newspaper-o',
                'uri' => '/posts',
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ], [
                'parent_id' => 0,
                'order' => 3,
                'title' => '单页管理',
                'icon' => 'fa-pagelines',
                'uri' => '/pages',
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ], [
                'parent_id' => 0,
                'order' => 4,
                'title' => '合作企业管理',
                'icon' => 'fa-users',
                'uri' => '/partners',
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ], [
                'parent_id' => 0,
                'order' => 5,
                'title' => '产品分类管理',
                'icon' => 'fa-certificate',
                'uri' => '/categories',
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ], [
                'parent_id' => 0,
                'order' => 6,
                'title' => '产品管理',
                'icon' => 'fa-product-hunt',
                'uri' => '/products',
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],
        ]);
    }
}
