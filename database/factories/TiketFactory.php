<?php

use Faker\Generator as Faker;
use App\Model\Category\Category;

$factory->define(App\Model\Tiket\Tiket::class, function (Faker $faker) {
    $isian = $faker ->word ;
    return [
        'nama_tiket' => $isian,
        'harga_tiket' => rand(1,100000),
        'jenis_tiket' => $isian,
        'id_category' => function(){
            //konektor ke tabel category
            return Category::all()->random();
        }


    ];
});
