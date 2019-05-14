<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Atbalstitaj;
use Faker\Generator as Faker;

$factory->define(App\Atbalstitaj::class, function (Faker $faker) {
    return [
        'nosaukums' => $faker -> text(10)
    ];
});
