<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required|integer',
            'title' => 'required|string|min:5',
            'author' => 'required|string|min:2',
            'status' => 'required|string',
            'image' => 'nullable|file|image|mimes:jpeg,png',
            'description' => 'nullable|string|max:1000',
            'display' => 'nullable|boolean'
        ];
    }

}
