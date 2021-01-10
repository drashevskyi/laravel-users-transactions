<?php

use App\Models\User;
use App\Models\UserDetails;
use Faker\Generator as Faker;

$factory->define(UserDetails::class, function (Faker $faker) {
    return [
        'first_name' => 'test_'.$faker->name,
        'last_name' => 'test_'.$faker->name,
        'phone_number' => 111,
        'citizenship_country_id' => 1,
        'user_id' => User::where('email', 'LIKE', '%test_user_details_%')->firstOrFail()
    ];
});