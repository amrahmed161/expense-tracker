<?php

namespace App\Http\Requests\Api\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Helpers\ApiResponse;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'email'=>['required'],
            'password'=>['required']
        ];
    }
        public function messages(){
        return[
            'email.required'    => 'البريد الإلكتروني مطلوب',
            'email.email'       => 'البريد الإلكتروني غير صحيح',
            'password.required' => 'كلمة المرور مطلوبة',

        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            ApiResponse::send(422, false, 'خطأ في البيانات', null, $validator->errors())
        );
    }
}
