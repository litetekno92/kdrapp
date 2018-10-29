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

$factory->define(App\Note::class, function (Faker $faker) {
    return [
        'title' => ucfirst($faker->sentence(5,true)),
        'body' => $faker->paragraph(10),
        'user_id' => App\User::all()->random()->id,
        'folder_id' => App\Folder::all()->random()->id,

            ];
});
