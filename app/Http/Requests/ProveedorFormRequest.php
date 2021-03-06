<?php

namespace activofijo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorFormRequest extends FormRequest
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
            'codigo' => 'required',
            'nombre' => 'required|max:50',
            'apellido'=> 'required|max:50',
            'telefono'=> 'required|max:10',
            'direccion' => 'max:250',
        ];
    }
}
