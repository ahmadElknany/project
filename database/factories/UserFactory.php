<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'provider_id'  => random_int(1, 200).random_int(1, 200), 
        'avatar' => 'user.png',
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Thread::class, function (Faker $faker) {
    return [
        'user_id' => function() {
        	return factory('App\User')->create()->id;
        },
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
    ];
});

$factory->define(App\Models\Reply::class, function (Faker $faker) {
    return [
        'user_id' => function() {
        	return factory('App\User')->create()->id;
        },
        'thread_id' => function() {
        	return factory('App\Models\Thread')->create()->id;
        },
        'body' => $faker->paragraph,
    ];
});
