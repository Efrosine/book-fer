<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WriterRequest extends FormRequest
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
        //$table->string('name');
        //$table->string('image')->nullable();
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            return [
                'name' => 'sometimes|string',
                'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        }
        return [
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required!',
            'name.string' => 'Name must be a string!',
            'image.image' => 'Image must be an image!',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg!',
            'image.max' => 'Image must be less than 2048 kilobytes!',
        ];
    }
}
