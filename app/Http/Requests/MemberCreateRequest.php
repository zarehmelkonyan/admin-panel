<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberCreateRequest extends FormRequest
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
             
            "first_name" => ['required', 'string'],
            "last_name" => ['required', 'string'],
            "email" => ['required', 'string'],
            "avatar" => ['required', 'string'],
            "position" => ['required', 'string'],
            "salary" => ['required', 'integer'],
            "gender" => ['required', 'string'],
            "age" => ['required', 'integer'],
            "started_at" => ["required", "string"],
        ];
    }
}
