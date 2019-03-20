<?php

namespace App\Http\Resources\Transaction;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //memilih data yang mau ditampilkan
        return [
            'id' => $this->id, //'id' bisa diganti & $this->id itu mengambil data dari entiti ID pada tabel transaksi
            'user_id' => $this->user_id,
            'status' => $this->status,

        ];
    }
}
