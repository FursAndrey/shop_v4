<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SkuRequest extends FormRequest
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
            'price' => [
                'required',
                'numeric',
                'min:0.01',
            ],
            'count' => [
                'required',
                'integer',
                'min:0',
            ],
            'product_id' => [
                'required',
                'integer',
                'exists:products,id',
            ]
        ];
        if (!empty($this->sku)) {
            $rules['option_id'] = [
                'required',
                'array',
            ];
            $rules['option_id.*'] = [
                'required',
                'integer',
                'exists:options,id',
            ];
        }
        
        return $rules;
    }
}
