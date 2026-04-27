<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RewardRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'point' => ['required', 'integer', 'min:0'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => '名前を入力してください。',
            'name.string' => '名前は文字列で記載してください。',
            'name.max' => '名前は255文字以内で記入してください。',
            'point.required' => 'ポイントは必須です。',
            'point.integer' => 'ポイントは整数のみ使用できます。',
            'point.min' => 'ポイントは0以上で記入してください。',
        ];
    }
}
