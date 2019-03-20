<?php

namespace App\Model\Transaction;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //agar data bisa di isi
    protected $fillable =['user_id','status','qty'];
}
