<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OptionRequest extends FormRequest
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
            'property_id' => [
                'required',
                'integer',
                'exists:properties,id',
            ],
        ];
        
        if (!empty($this->option)) {
            $rules['name_ru'][] = Rule::unique('options')->ignore($this->option->id);
            $rules['name_en'][] = Rule::unique('options')->ignore($this->option->id);
        } else {
            $rules['name_ru'][] = Rule::unique('options');
            $rules['name_en'][] = Rule::unique('options');
        }
        return $rules;
    }
}
