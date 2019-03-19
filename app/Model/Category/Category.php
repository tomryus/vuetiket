<?php

namespace App\Model\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Tikets(){
        return $this->belongsTomany('App\Model\Tiket\Tiket');
    }
}

