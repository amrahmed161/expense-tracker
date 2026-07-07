<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Helpers\ApiResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
class RegisterRequest extends FormRequest
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
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ];
    }
    public function messages(){
        return[
            'name.required'     => 'الاسم مطلوب',
            'email.required'    => 'البريد الإلكتروني مطلوب',
            'email.email'       => 'البريد الإلكتروني غير صحيح',
            'email.unique'      => 'البريد الإلكتروني مستخدم بالفعل',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min'      => 'كلمة المرور لازم تكون 8 أحرف على الأقل',
            'password.confirmed'=> 'تأكيد كلمة المرور غير متطابق',

        ];
    }
        protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            ApiResponse::send(422, false, 'خطأ في البيانات', null, $validator->errors())
        );
    }

}
