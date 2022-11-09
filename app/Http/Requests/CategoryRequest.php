<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name_ru' => [
                'required',
                'string',
                'between:3,32'
            ],
            'name_en' => [
                'required',
                'string',
                'between:3,32'
            ],
        ];
        
        if (!empty($this->category)) {
            $rules['name_ru'][] = Rule::unique('categories')->ignore($this->category->id);
            $rules['name_en'][] = Rule::unique('categories')->ignore($this->category->id);
        } else {
            $rules['name_ru'][] = Rule::unique('categories');
            $rules['name_en'][] = Rule::unique('categories');
        }
        return $rules;
    }
}
