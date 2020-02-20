<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'resto_id'          =>  1,
        'user_id'           =>  1,
        'amount'            =>  $faker->numberBetween(99, 550),
        'isComplete'        =>  $faker->randomElement([0,1]),
        'completed_at'      =>  $faker->date('Y-m-d h:m:s'),
        'order_details'     =>  [
            'items'             =>  [1,2,3],
            'phone'             =>  $faker->phoneNumber,
            'customer_name'     =>  $faker->name,
            'customer_address'  =>  $faker->address,
        ],
    ];
});
