<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeRequest extends FormRequest
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
            'name' => 'required|unique:types|max:50|min:3',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il titolo é obbligatorio',
            'name.min' => 'Il titolo deve essere piú lungo di :min caratteri',
            'name.max' => 'Il titolo non puó superare i :max caratteri.',
            'name.unique:types' => 'il titolo esiste giá'

        ];
    }
}
