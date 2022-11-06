<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RangeRequest extends FormRequest
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
            'id' => 'required|min:9|max:10|alpha_dash',
            'password' => 'required|min:6|max:6|alpha_num',
            'from' => 'required|date_format:Y|before:to',
            'to' => 'required|date_format:Y',
        ];
    }
}
