<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'         => $faker->sentence(10),
        'sub_title'     => $faker->sentence(20),
        'description'   => $faker->sentence(550),
        'image'         => 'postimage/1637413439.png',
        'featured'      => '0',
        'date'          => $faker->dateTimeThisMonth(),
        'category_id'   => $faker->numberBetween($min = 1, $max = 3),
        'created_at'    => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at'    => Carbon\Carbon::now()->format('Y-m-d H:i:s')
    ];
});
