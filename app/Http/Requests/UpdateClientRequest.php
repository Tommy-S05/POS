<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
//            .Rule::unique('providers')->ignore($this->provider->id)
            'name' => 'required|string|max:255',
            'cedula' => 'required|string|max:11|min:11|'.Rule::unique('clients')->ignore($this->client->id),
            'ruc' => 'nullable|string|max:11|min:11|'.Rule::unique('clients')->ignore($this->client->id),
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:10|min:10|'.Rule::unique('clients')->ignore($this->client->id),
            'email' => 'nullable|string|email|max:255|'.Rule::unique('clients')->ignore($this->client->id)
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
