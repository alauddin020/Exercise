<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Form;
use Faker\Generator as Faker;

$factory->define(Form::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'number' => $faker->randomNumber(),
        'email' => $faker->safeEmail,
        'password' => $faker->text(20),
        'select' => $faker->randomElement(['home','office']),
        'textarea' => $faker->sentence,
        'radio' => $faker->randomElement(['male','female']),
        'color' => $faker->hexColor,
        'date' => $faker->date('Y-m-d'),
        'month' => $faker->monthName.' '.$faker->year(),
        'time' => $faker->time('h:i:s'),
    ];
});
