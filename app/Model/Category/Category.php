<?php

namespace App\Model\Category;

use Illuminate\Database\Eloquent\Model;
use \App\Model\Tiket\Tiket;

class Category extends Model
{
    public function Tikets(){
        return $this->hasMany(Tiket::class, 'id_category','id');
    }

    protected $fillable =[
        'nama_category'
    ];
}

