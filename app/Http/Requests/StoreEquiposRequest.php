<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquiposRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>'required',
            'dt'=>'required',
            'escudo'=>'required|image'
        ];
    }
    public function messages(){
        return[
            'nombre.required'=>'El nombre es obligatorio',
            'dt.required'=>'El D.T. es obligatorio',
            'escudo.required'=>'El escudo es obligatorio',
            'escudo.image'=>'El escudo debe ser una imagen'
        ];
    }
}
