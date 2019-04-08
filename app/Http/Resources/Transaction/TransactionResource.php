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
            'id'         => $this->id, //'id' bisa diganti & $this->id itu mengambil data dari entiti ID pada tabel transaksi
            'tiket_id'   => $this->tiket->id, //tiket berasal dari fungsi model eloquent transaction & id dari tabel tikets
            'nama_tiket' => $this->tiket->nama_tiket,
            'harga_tiket'=> $this->tiket->harga_tiket,
            'total'      => $this->qty * $this->tiket->harga_tiket,
            'qty'        => $this->qty,
            'status'     => $this->status,

        ];
    }
}
