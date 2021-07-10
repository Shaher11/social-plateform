<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
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
            'feature_name' => 'required|alpha|unique:features,feature_name',
            'description' =>'required|min:3|max:5000',
            'feature_cost' => 'required|numeric|min:1',
            'enable' =>'required|boolean'
        ];
    }
}
