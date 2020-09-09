<?php

namespace activofijo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BienFormRequest extends FormRequest
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
                'CodBien' => 'required',
                'Nombre'=>'required',
                'FechaAdquisicion'=>'required',
                'ValorCompra' => 'required',
                'Estado' => 'required',
                'UbicacionDepartamento'=>'required',
                'UbicacionAlmacen' =>'required',
                'CodCategoria'=>'required',
                'CodRubro'=>'required',
        ];
    }
}
