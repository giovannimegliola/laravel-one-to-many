<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:200', 'unique:projects'],
            'body' => ['nullable'],
            'image' => ['nullable', 'image']
        ];
    }

    public function messages(){
        return[
            'title.required' => 'il titolo è obbligatorio',
            'title.min' => 'il titolo deve avere almeno :min caratteri',
            'title.max' => 'il titolo deve avere massimo :max caratteri',
            'title.unique' => 'questo titolo esiste già',
            'image.image' => 'l\'immagine deve essere di tipo url',

        ];
    }
}
