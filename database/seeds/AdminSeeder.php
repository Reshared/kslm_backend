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
                'title' => '主分类管理',
                'icon' => 'fa-anchor',
                'uri' => '/major_categories',
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],[
                'parent_id' => 0,
                'order' => 6,
                'title' => '辅分类管理',
                'icon' => 'fa-certificate',
                'uri' => '/categories',
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ], [
                'parent_id' => 0,
                'order' => 7,
                'title' => '产品管理',
                'icon' => 'fa-product-hunt',
                'uri' => '/products',
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],[
                'parent_id' => 0,
                'order' => 8,
                'title' => '留言管理',
                'icon' => 'fa-product-hunt',
                'uri' => '/messages',
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],[
                'parent_id' => 0,
                'order' => 9,
                'title' => '荣誉管理',
                'icon' => 'fa-product-hunt',
                'uri' => '/honors',
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],
        ]);
    }
}
