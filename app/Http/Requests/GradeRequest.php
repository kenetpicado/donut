<?php

namespace App\Http\Requests;

use App\Traits\FailedValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
{
    use FailedValidationTrait;

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
            'password' => 'required|min:5|max:6|alpha_num',
            'year' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'carnet',
            'password' => 'PIN',
            'year' => 'año',
        ];
    }
}
