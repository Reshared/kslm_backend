<?php

use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\MajorCategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MajorCategory::insert([
            [
                'name' => '反渗透膜',
                'sort' => 4,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ], [
                'name' => '水净化用纳滤膜',
                'sort' => 3,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ], [
                'name' => '水净化超滤膜',
                'sort' => 2,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ], [
                'name' => '物料分离膜',
                'sort' => 1,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ], [
                'name' => '电泳漆超滤膜',
                'sort' => 0,
                'created_at' => '2018-09-10 02:16:45',
                'updated_at' => '2018-09-10 02:16:45',
            ],
        ]);
        Category::create(['name' => '水净化用膜']);
        Category::create(['name' => '物料分离膜']);
        $root1 = Category::where('name', '水净化用膜')->first();
        $root1->children()->create(['name' => '按精度分']);
        $root1->children()->create(['name' => '按用途分']);
        $root2 = Category::where('name', '按精度分')->first();
        $root2->children()->create(['name' => '多聚糖净化、悬浮物去除、酶制剂澄清、酒类净化和澄清、RO/NF预']);
        $root2->children()->create(['name' => '胶体铁、硅去除、抗生素澄清、酶制剂浓缩、乳清浓缩、糖类中色素去']);
        $root3 = Category::where('name', '多聚糖净化、悬浮物去除、酶制剂澄清、酒类净化和澄清、RO/NF预')->first();
        $root3->children()->create(['name' => '反渗透膜系列']);
        $root4 = Category::where('name', '反渗透膜系列')->first();
        $root4->children()->create(['name' => 'HR系列']);
        $root4->children()->create(['name' => 'FR系列']);
        $root4->children()->create(['name' => 'XR系列']);
        $root4->children()->create(['name' => 'SW系列']);
        $root4->children()->create(['name' => 'HF系列']);
        $root4->children()->create(['name' => '热消毒系列']);
    }
}
