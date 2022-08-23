<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpleadoPost extends FormRequest
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
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required|max:8|min:8|unique:empleados,dni',
            'puesto_id' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required|unique:empleados',
            'altafip' => 'required',
            'horario_id' => 'required',
        ];
    }
}
