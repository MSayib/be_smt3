<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    /**
     * Join table patient (one to many) = 1 status bisa memiliki banyak pasien
     */
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
