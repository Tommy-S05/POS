<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            "name" => 'required|string|max:100|unique:products',
            "picture" => 'required',
//            "image" => 'required|dimensions:min_width=100,min_height=200',
            "sell_price" => 'required',
            "category_id" => 'required|integer',
            "provider_id" => 'required|integer'
//            "category_id" => 'required|integer|exists:App\Models\Category, id',
//            "provider_id" => 'required|integer|exists:App\Models\Provider, id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es requerido.',
            'name.string' => 'El valor no es correcto.',
            'name.max' => 'Solo se permiten 100 caracteres.',
            'name.unique' => 'El producto ya está registrado',

            'picture.required' => 'Este campo es requerido.',
//            'image.dimensions' => 'Solo se permiten imágenes de 100x200 px.',

            'sell_price.required' => 'Este campo es requerido.',

            'category_id.required' => 'Este campo es requerido.',
            'category_id.integer' => 'El valor no es correcto.',
//            'category_id.exists' => 'La categoria no existe.',

            'provider_id.required' => 'Este campo es requerido.',
            'provider_id.integer' => 'El valor no es correcto.',
//            'provider_id.exists' => 'El proveedor no existe.'
        ];
    }
}
