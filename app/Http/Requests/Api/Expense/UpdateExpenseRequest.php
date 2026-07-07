<?php

namespace App\Http\Requests\Api\Expense;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Helpers\ApiResponse;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateExpenseRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'amount'  => 'required|numeric|min:0',
            'date'  => 'required|date',
            'notes' => 'nullable|string',

        ];
    }
        public function messages(): array
    {
        return [
            'category_id.required' => 'الفئة مطلوبة',
            'category_id.exists'   => 'الفئة غير موجودة',
            'title.required'       => 'العنوان مطلوب',
            'amount.required'      => 'المبلغ مطلوب',
            'amount.numeric'       => 'المبلغ لازم يكون رقم',
            'amount.min'           => 'المبلغ لازم يكون أكبر من 0',
            'date.required'        => 'التاريخ مطلوب',
            'date.date'            => 'التاريخ غير صحيح',
        ];
    }
        protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            ApiResponse::send(422, false, 'خطأ في البيانات', null, $validator->errors())
        );
    }

}
