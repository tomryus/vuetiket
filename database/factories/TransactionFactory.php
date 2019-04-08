<?php

use Faker\Generator as Faker;
use \App\Model\Tiket\Tiket; 

$factory->define(App\Model\Transaction\Transaction::class, function (Faker $faker) {
    $isian =  $faker ->word;
    $status = 'sukses';
    return [
        //'user_id' => function(){   //mengambil data random dari user
        //    return User::all()->random();
        //},
        'tiket_id' => function(){
            //konektor ke tabel category
            return Tiket::all()->random();},
        'qty' => rand(1,20),
        'status' => $status,



    ];
});
