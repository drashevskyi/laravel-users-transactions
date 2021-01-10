<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'email' => 'test_'.$faker->safeEmail,
        'active' => 1,
        'updated_at' => new \DateTime(),
        'created_at' => new \DateTime()
    ];
});
