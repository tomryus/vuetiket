<?php

use Faker\Generator as Faker;
use \App\User;

$factory->define(App\Model\Transaction\Transaction::class, function (Faker $faker) {
    $isian =  $faker ->word;
    $status = 'sukses';
    return [
        'user_id' => function(){
            return User::all()->random();
        },
        'qty' => rand(1,20),
        'status' => $status,



    ];
});
