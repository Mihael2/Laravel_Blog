<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'This field must be filled',
            'title.string' => 'This field must be a string',
            'content.required' => 'This field must be filled',
            'content.string' => 'This field must be a string',
            'preview_image.required' => 'This field must be filled',
            'preview_image.file' => 'This field must be a file type',
            'main_image.required' => 'This field must be filled',
            'main_image.file' => 'This field must be file type',
            'category_id.required' => 'This field must be filled',
            'category_id.exists' => 'This category do not exist',
            'tag_ids.array' => 'Need to send the array',
        ];
    }
}
