<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientSingleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'status_id' => $this->status_id,
            'name' => $this->name,
            'status' => $this->status->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'in_date_at' => $this->in_date_at,
            'out_date_at' => $this->out_date_at,
        ];
    }
}
