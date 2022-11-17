<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * fillable = field yang boleh diisi
     * with = join otomatis ke fungsi status yg sudah dibuat, saat model ini di fetch
     */
    use HasFactory;
    protected $fillable = ['status_id', 'name', 'phone', 'address', 'in_date_at', 'out_date_at'];
    protected $with = ['status'];

    /**
     * Join table status (many to one)
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
