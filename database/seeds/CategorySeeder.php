<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker_ar = Faker::create('ar_SA');

        for ($i = 0; $i < 10; $i++) {
            DB::table('categories')->insert([
                'name'=> $faker_ar->name,
                'is_active' => rand(0,1)
            ]);
        }
    }
}
