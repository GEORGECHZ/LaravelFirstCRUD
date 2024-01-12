<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'primer_ap' => 'required|string|max:50',
            'segundo_ap' => 'required|string|max:50',
            'rfc' => 'required|size:13',
            'telefono' => 'required|numeric',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'rfc.required' => 'The RFC field is required.',
    //         'rfc.max' => 'The RFC may not be greater than 13 characters.',
    //         'telefono.required' => 'The phone field is required.',
    //         'telefono.numeric' => 'The phone field must be a number.',
    //         'nombre.required' => 'The names field is required.',
    //         'nombre.max' => 'The names may not be greater than 255 characters.',
    //         'codigo_postal.required' => 'The postal code field is required.',
    //         'codigo_postal.numeric' => 'The postal code field must be a number.',
    //         'email.required' => 'The email field is required.',
    //         'email.email' => 'The email must be a valid email address.',
    //         'email.max' => 'The email may not be greater than 255 characters.',
    //         'email.unique' => 'The email has already been taken.',
    //     ];
    // }
}
