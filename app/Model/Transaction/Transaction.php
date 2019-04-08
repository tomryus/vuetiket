<?php

namespace App\Model\Transaction;

use Illuminate\Database\Eloquent\Model;
use \App\Model\Tiket\Tiket;

class Transaction extends Model
{
    //agar data bisa di isi
    protected $fillable =['tiket_id','status','qty'];

    public function tiket(){
        return $this->belongsTo(Tiket::class, 'tiket_id', 'id');
    }
}
