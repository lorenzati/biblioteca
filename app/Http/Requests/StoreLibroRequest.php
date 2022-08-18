<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLibroRequest extends FormRequest
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
            "titulo" => "required|max:200",
            "descripcion" => "required",
            "cantidad_paginas" => "required",
            "autor" => "required|max:50",
            "editorial" => "required|max:50",
            "fecha_publicacion" => "required",
        ];
    }
}