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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Person::class, function (Faker\Generator $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->e164PhoneNumber,
        'address' => $faker->address,
        'personal_code' => $faker->randomNumber(5) . $faker->randomNumber(6),
        'work_place' => $faker->company,
    ];
});

$factory->define(App\Registration::class, function (Faker\Generator $faker) {
    return [
        'student_id' => factory(App\Person::class)->create()->id,
        'parent1_id' => factory(App\Person::class)->create()->id,
        'parent2_id' => factory(App\Person::class)->create()->id,
        'field_id' => App\Field::get()->random()->id,
        'comment' => $faker->sentence,
        'status' => 'new',
    ];
});
