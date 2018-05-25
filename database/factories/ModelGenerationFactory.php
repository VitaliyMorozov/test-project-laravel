<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use Faker\Generator as Faker;

/**
 * Fake models factory.
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(App\Models\ModelGeneration::class, function (Faker $faker) {
    return [
        'generation' => str_random(10),
    ];
});
