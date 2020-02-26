<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'address' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Wajib Diisi',
            'name.min'  => 'Nama Minimal Memiliki :min Karakter',
            'address.required' => 'Alamat Wajib Diisi',
            'address.min'   =>  'Alamat minimal memiliki :min Karakter'
        ];
    }
}
