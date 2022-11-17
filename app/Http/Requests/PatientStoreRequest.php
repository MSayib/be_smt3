<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        /**
         * tomorrow = Si User bisa isi dengan tanggal hari ini,
         * kalau pilih today, itu si User tidak bisa isi tanggal hari ini
         * Saya pakai regex pada name untuk validasi alphabet dan spasi
         */
        return [
            'status_id' => 'required|digits:1|exists:statuses,id', //memvalidasi status_id hanya boleh 1 digit dan harus sesuai dengan list di Model Status
            'name' => 'required|min:3|regex:/^[a-zA-Z ]*$/',
            'phone' => 'required|digits_between:10,13',
            'address' => 'required|string',
            'in_date_at' => 'required|date|before_or_equal:tomorrow',
            'out_date_at' => 'required|date|after_or_equal:in_date_at',
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'The name must contain only letters and spaces',
        ];
    }
}
