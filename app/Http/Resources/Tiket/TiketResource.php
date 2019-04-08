<?php

namespace App\Http\Resources\Tiket;

use Illuminate\Http\Resources\Json\JsonResource;
use \App\Model\Tiket\Tiket;
use \App\Model\Category\Category;

class TiketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'nama_tiket'    => $this->nama_tiket,
            'harga_tiket'   => $this->harga_tiket,
            'qty'           => $this->qty,
            'id_category'   => $this->Categories->id,
            'nama_category' => $this->Categories->nama_category,
            
        ];
        //return parent::toArray($request);
    }
}
