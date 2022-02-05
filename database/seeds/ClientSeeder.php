<?php

use App\Models\Client;
use App\Models\Title;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(Title::class, 5)->create();
        factory(Client::class, 50)->create();
    }
}
