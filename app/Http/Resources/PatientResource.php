<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    public function toArray($request)
    {
        /**
         * Mengembalikan data yang akan ditampilkan
         * Saya menghilangkan status_id karena tidak perlu ditampilkan, yang perlu adalah status namenya, namun bisa ditambahkan jika ingin
         * atau memodifikasi name menjadi nama, tapi value tetap sama
         */
        return [
            'id' => $this->id,
            // 'status_id' => $this->status_id,
            'name' => $this->name,
            'status' => $this->status->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'in_date_at' => $this->in_date_at,
            'out_date_at' => $this->out_date_at,
            // 'out_date_at' => Carbon::parse($this->in_date_at)->format('d-m-Y'), //Bisa juga seperti ini, jika ingin mengembalikan dengan format berbeda
        ];
    }
}
