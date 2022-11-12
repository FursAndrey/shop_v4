<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
                'between:3,32',
            ],
            'name_en' => [
                'required',
                'string',
                'between:3,32',
            ],
            'description_ru' => [
                'required',
                'string',
                'between:3,140',
            ],
            'description_en' => [
                'required',
                'string',
                'between:3,140',
            ],
            'category_id' => [
                'required',
                'integer',
                'exists:categories,id',
            ],
            'property_id' => [
                'required',
                'array',
            ],
            'property_id.*' => [
                'required',
                'integer',
                'exists:properties,id',
            ],
            'img' => [
                'nullable',
                'array',
            ],
            'img.*' => [
                'image',
                'mimes:jpeg,png,jpg',
            ],
        ];
        
        if (!empty($this->product)) {
            $rules['name_ru'][] = Rule::unique('products')->ignore($this->product->id);
            $rules['name_en'][] = Rule::unique('products')->ignore($this->product->id);
        } else {
            $rules['name_ru'][] = Rule::unique('products');
            $rules['name_en'][] = Rule::unique('products');
        }
        return $rules;
    }
}
