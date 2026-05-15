<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'category_id' => ['required'],
            'title' => ['required', 'string', 'max:255'],
            'point' => ['required', 'integer', 'min:1'],
        ];
    }
    public function messages(): array
    {
        return [
            'category_id.required' => 'カテゴリーが選ばれていません。',
            'title.required' => 'お手伝い名は必須です。',
            'title.string' => 'お手伝い名は文字列で記入してください。',
            'title.max' => 'お手伝い名は255文字以内で記入してください。',
            'point.required' => 'ポイントは必須です。',
            'point.integer' => 'ポイントは整数で記入してください。',
            'point.min' => 'ポイントは1以上で記入してください。',
        ];
    }
}
