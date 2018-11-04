<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(AdminSeeder::class);
//        $this->call(BannerSeeder::class);
//        $this->call(CategorySeeder::class);
//        $this->call(PartnerSeeder::class);
//        $this->call(PostSeeder::class);
//        $this->call(ProductSeeder::class);
//        $this->call(RelationSeeder::class);
//        $this->call(HonorSeeder::class);
//        $this->call(PageSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
