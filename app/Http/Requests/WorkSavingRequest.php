<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkSavingRequest extends FormRequest
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
            'title.*' => 'required',
            'preview' => 'nullable|image|max:2048',
            'work' => 'nullable|image|max:10000'
        ];
    }
}
