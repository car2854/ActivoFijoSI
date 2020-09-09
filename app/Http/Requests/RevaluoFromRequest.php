<?php

namespace activofijo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RevaluoFromRequest extends FormRequest
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
          'NroRevision'=>'',
          'Estado'=>'required',
          'Monto'=>'required',
          'Descripcion'=>'required',
        ];
    }
}
