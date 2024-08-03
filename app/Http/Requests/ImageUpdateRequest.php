<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageUpdateRequest extends FormRequest
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
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Lütfen bir resim yükleyiniz.',
            'image.image' => 'Yüklediğiniz dosya bir resim olmalıdır.',
            'image.mimes' => 'Resim yalnızca jpeg, png, jpg, gif veya svg formatında olmalıdır.',
            'image.max' => 'Resim boyutu en fazla 2048 kilobyte olmalıdır.',
        ];
    }
}
