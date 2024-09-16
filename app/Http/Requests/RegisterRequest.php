<?php

namespace App\Http\Requests;

use App\Enums\UserRole;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "city" => "required",
            "kvkk_approve" => "required",
            "district" => "required",
            "phone" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:8|confirmed",
            "company_name" => "required_if:role," . UserRole::COMPANY->value,
            "company_type" => "required_if:role," . UserRole::COMPANY->value,
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'İsim alanı zorunludur.',
            'agree.required' => 'Lütfen bu alanı işaretleyiniz.',
            'role.required' => 'Rol alanı zorunludur.',
            'city.required' => 'Şehir alanı zorunludur.',
            'district.required' => 'İlçe alanı zorunludur.',
            'phone.required' => 'Telefon numarası zorunludur.',
            'email.required' => 'E-posta adresi zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'email.unique' => 'Bu e-posta adresi zaten kayıtlı.',
            'password.required' => 'Şifre alanı zorunludur.',
            'password.min' => 'Şifre en az 8 karakterden oluşmalıdır.',
            'password.confirmed' => 'Şifre onayı eşleşmiyor.',
            'company_name.required_if' => 'Şirket adı zorunludur, eğer rol company ise.',
            'company_type_code.required_if' => 'Şirket türü kodu zorunludur, eğer rol company ise.',
            'address.required_if' => 'Adres zorunludur, eğer rol company ise.',
        ];
    }
}
