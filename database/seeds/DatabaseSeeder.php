<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(City::class);
        $this->call(ClientSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
