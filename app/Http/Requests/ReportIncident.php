<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportIncident extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'reportType' => 'required',
            'location' => 'required',
            'specificLocation' => 'required|string|regex:/^[a-zA-ZÑñ 0-9\s]+$/]'
        ];
        
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'reportType.required' => 'Report type is required',

            'location.required' => 'Location is Required',

            'specificLocation.required' => 'Please input the specific location of the incident',
            'specificLocation.string' => 'Please input the valid regex: a-zA-ZÑñ 0-9',
        ];
    }
}
