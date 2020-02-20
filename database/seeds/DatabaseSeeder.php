<?php

use OrdersTableSeeder as OTS;
use UsersTableSeeder as Us;
use MenusTableSeeder as MTS;
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
        // $this->call(UsersTableSeeder::class);
        $this->call(Us::class);
        $this->call(MTS::class);
        $this->call(OTS::class);
    }
}
