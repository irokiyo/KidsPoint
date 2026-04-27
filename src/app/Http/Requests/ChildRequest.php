<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ChildRequest extends FormRequest
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
            'birthday' => ['required', 'date'],
            'sex' => ['required'],
            'img_url' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => '名前は必須です。',
            'name.string' => '名前は文字列でなければなりません。',
            'name.max' => '名前は255文字以内でなければなりません。',
            'birthday.required' => '誕生日は必須です。',
            'birthday.date' => '誕生日が有効ではありません。',
            'sex.required' => '性別は必須です。',
            'img_url.image' => '画像は有効な形式でなければなりません。',
            'img_url.mimes' => '画像はjpeg, png, jpg, gifのいずれかの形式でアップロードしてください。',
            'img_url.max' => '画像は2MB以内でなければなりません。',
        ];
    }

}
