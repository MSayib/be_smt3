<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return false; //harus login
    }

    public function rules()
    {
        /**
         * Bedanya dengan StoreRequest, ini tidak mandatory, jika data dikosongkan maka tidak akan diupdate
         */
        return [
            'status_id' => 'required|digits:1|exists:statuses,id',
            'name' => 'regex:/^[a-zA-Z ]{3,}$/', //kalo di isi minimal 3, kalo ga ya skip, yg ke save data lama
            'phone' => 'digits_between:10,13',
            'address' => 'string',
            'in_date_at' => 'date|before_or_equal:tomorrow',
            'out_date_at' => 'date|after_or_equal:in_date_at',
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'The name must contain only letters, spaces and minimum 3 characters',
        ];
    }
}
