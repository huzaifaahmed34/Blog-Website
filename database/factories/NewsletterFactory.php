<?php

use Faker\Generator as Faker;
use App\Newsletter;
 
$factory->define(newsletter::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
    ];
});
?>