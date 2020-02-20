<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' =>   'Sherif Nabil',
            'email' =>   'admin@admin.com',
            'password' =>   bcrypt('123456'),
        ]);

        $user->resturants()->create([
            'name'      =>   'Fish and Chips',
            'location'  =>   'Cairo, Egypt',
        ]);
        
        $user->resturants()->create([
            'name'      =>   'Steak',
            'location'  =>   'Cairo, Egypt',
        ]);

        $user->resturants()->create([
            'name'      =>   'Homey Food',
            'location'  =>   'Cairo, Egypt',
        ]);
    }
}
