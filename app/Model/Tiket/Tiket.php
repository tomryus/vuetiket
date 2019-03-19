<?php

namespace App\Model\Tiket;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    public function Categories(){
        return $this->belongsTomany('App\Model\Category\Category');
    }
}
