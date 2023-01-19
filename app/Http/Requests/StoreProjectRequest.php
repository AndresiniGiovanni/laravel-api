<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|unique:Projects|max:150|min:3',
            'content' => 'nullable',
            'cover_image' => 'nullable|image|max: 1000',
            'type_id' => 'nullable|exists:types,id'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Il titolo é obbligatorio',
            'title.min' => 'Il titolo deve essere piú lungo di :min caratteri',
            'title.max' => 'Il titolo non puó superare i :max caratteri.',
            'title.unique:projects' => 'il titolo esiste giá'
        ];
    }
}
