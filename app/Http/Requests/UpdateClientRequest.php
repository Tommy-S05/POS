<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',

            'cedula' => 'required|string|unique:clients, cedula,'.
                $this->route('client')->id.'|max:11|min:11',

            'ruc' => 'nullable|string|unique:clients, ruc,'.
                $this->route('client')->id.'|max:11|min:11',

            'address' => 'nullable|string|max:255',

            'phone' => 'required|string|unique:clients, phone,'.
                $this->route('client')->id.'|max:10|min:10',

            'email' => 'nullable|string|email|unique:clients, email,'.
                $this->route('client')->id.'|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es requerido.',
            'name.string' => 'El valor no es correcto.',
            'name.max' => 'Solo se permiten 100 caracteres.',

            'cedula.required' => 'Este campo es requerido.',
            'cedula.string' => 'El valor no es correcto.',
            'cedula.unique' => 'El producto ya está registrado',
            'cedula.max' => 'Solo se permiten 11 caracteres.',
            'cedula.min' => 'Se requiere de 11 caracteres.',

            'ruc.string' => 'El valor no es correcto.',
            'ruc.unique' => 'El producto ya está registrado',
            'ruc.max' => 'Solo se permiten 11 caracteres.',
            'ruc.min' => 'Se requiere de 11 caracteres.',

            'address.string' => 'El valor no es correcto.',
            'address.max' => 'Solo se permiten 255 caracteres.',

            'phone.required' => 'Este campo es requerido.',
            'phone.string' => 'El valor no es correcto.',
            'phone.unique' => 'Ya se encuentra registrado',
            'phone.max' => 'Solo se permiten 10 caracteres.',
            'phone.min' => 'Se requiere de 10 caracteres.',

            'email.string' => 'El valor no es correcto.',
            'email.email' => 'No es un correo electronico',
            'email.unique' => 'Ya se encuentra registrado',
            'email.max' => 'Solo se permiten 255 caracteres.'
        ];
    }
}
