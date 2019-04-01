<?php

namespace App\Model\Tiket;

use Illuminate\Database\Eloquent\Model;
use \App\Model\Category\category;

class Tiket extends Model
{
    //protected $guarded= [];
    protected $fillable = ['nama_tiket', 'harga_tiket', 'id_category', 'qty'];
    public function Categories(){
        return $this->belongsTo(Category::class,'id_category','id');
    }
    public function Users(){
        return $this->belongsto('App\User','foreign key', 'other key');
    }
}
