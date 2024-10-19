<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
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
            "name" => "required",
            "address" => "required",
            "phone" => "required",
            "city" => "required",
            "mernis" => "required|unique:companies,mernis",
            "district" => "required",
            "company_type" => "required",
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'İsim alanı zorunludur.',
            'address.required' => 'Adres alanı zorunludur.',
            'phone.required' => 'Telefon alanı zorunludur.',
            'city.required' => 'Şehir alanı zorunludur.',
            'mernis.required' => 'Mernis numarası zorunludur.',
            'mernis.unique' => 'Bu Mernis numarası zaten kayıtlıdır.',
            'district.required' => 'İlçe alanı zorunludur.',
            'company_type.required' => 'Şirket türü alanı zorunludur.',
        ];
    }
}
