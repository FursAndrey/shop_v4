<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PropertyRequest extends FormRequest
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
        
        if (!empty($this->property)) {
            $rules['name_ru'][] = Rule::unique('properties')->ignore($this->property->id);
            $rules['name_en'][] = Rule::unique('properties')->ignore($this->property->id);
        } else {
            $rules['name_ru'][] = Rule::unique('properties');
            $rules['name_en'][] = Rule::unique('properties');
        }
        return $rules;
    }
}
