<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TaskRecordRequest extends FormRequest
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
            'tasks' => ['required','array', 'min:1'],
            'comment' => ['nullable', 'string'],
            'point' => ['nullable', 'integer', 'min:0'],
        ];
    }
    public function messages(): array
    {
        return [
            'tasks.required' => 'お手伝いが選ばれていません。',
            'tasks.min' => 'お手伝いは1つ以上選択してください。',
            'comment.string' => 'コメントは文字列でなければなりません。',
            'point.integer' => 'ポイントは整数で記入してください。',
            'point.min' => 'ポイントは0以上で記入してください。',
        ];
    }

}
