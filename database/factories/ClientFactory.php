<?php

use Faker\Generator as Faker;
require __DIR__ . '/../faker_data/document_number.php';

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'defaulter' => rand(0,1),
    ];
});

$factory->state(\App\Client::class, \App\Client::TYPE_INDIVIDUAL, function (Faker $faker) {
    $cpf = cpfs();
    return [
        'document_number' => $cpf[array_rand($cpf, 1)],
        'date_birth' => $faker->date(),
        'sex' => rand(0,10) % 2 == 0 ? 'F' : 'M',
        'physical_disability' => rand(0,10) % 2 == 0 ? $faker->word : null,
        'marital_status' => rand(1,3)
    ];
});

$factory->state(\App\Client::class, \App\Client::TYPE_LEGAL, function (Faker $faker) {
    $cnpj = cnpjs();
    return [
        'document_number' => $cnpj[array_rand($cnpj, 1)],
        'company_name' => $faker->company,
        'client_type' => rand(0,10) % 2 == 0 ? \App\Client::TYPE_LEGAL : \App\Client::TYPE_INDIVIDUAL
    ];
});
