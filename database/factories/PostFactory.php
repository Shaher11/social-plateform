<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => factory('App\User'),
        'title'   => $faker->sentence,
        'body'   => $faker->text(),
        'status' => $faker->boolean,
        'category_id' =>factory('App\Category'),
//        'photo_id'=>$faker->imageUrl('250','220')


    ];
});
