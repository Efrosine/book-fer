<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        //$table->foreignId('writer_id')->constrained('writers')->cascadeOnDelete()->cascadeOnUpdate();
        // $table->string('title');
        // $table->string('image')->nullable();
        // $table->enum('genre', ['horror', 'comedy', 'drama', 'action', 'others'])->default('others');
        // $table->text('description');
        // $table->integer('price');
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            return [
                'writer_id' => 'sometimes|exists:writers,id',
                'title' => 'sometimes|string',
                'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'genre' => 'sometimes|in:horror,comedy,drama,action,others',
                'description' => 'sometimes|string',
                'price' => 'sometimes|integer',
            ];
        }
        return [
            'writer_id' => 'required|exists:writers,id',
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'genre' => 'required|in:horror,comedy,drama,action,others',
            'description' => 'required|string',
            'price' => 'required|integer',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'writer_id.required' => 'Writer ID is required!',
            'writer_id.exists' => 'Writer ID does not exist!',
            'title.required' => 'Title is required!',
            'title.string' => 'Title must be a string!',
            'image.image' => 'Image must be an image!',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg!',
            'image.max' => 'Image must be less than 2048 kilobytes!',
            'genre.required' => 'Genre is required!',
            'genre.in' => 'Genre must be one of the following: horror, comedy, drama, action, others!',
            'description.required' => 'Description is required!',
            'description.string' => 'Description must be a string!',
            'price.required' => 'Price is required!',
            'price.integer' => 'Price must be an integer!',
        ];
    }
}
