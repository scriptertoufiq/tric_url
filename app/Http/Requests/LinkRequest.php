<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
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
            'categories_id' => 'required',
            'target_url' => 'required|unique:links,target_url',
            'sort_url' => 'required|unique:links,sort_url',
            'redirect_type' => 'required|in:301,302,307,cloaked',
        ];
    }
}
