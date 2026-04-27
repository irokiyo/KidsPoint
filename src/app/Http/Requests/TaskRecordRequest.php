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
            'task_id' => ['required'],
            'date' => ['required', 'date'],
            'comment' => ['nullable', 'string'],
            'point' => ['nullable', 'integer', 'min:0'],
        ];
    }
    public function messages(): array
    {
        return [
            'task_id.required' => 'お手伝いが選ばれていません。',
            'date.required' => '日付を選択してください。',
            'date.date' => '日付が有効ではありません。',
            'comment.string' => 'コメントは文字列でなければなりません。',
            'point.integer' => 'ポイントは整数で記入してください。',
            'point.min' => 'ポイントは0以上で記入してください。',
        ];
    }

}
