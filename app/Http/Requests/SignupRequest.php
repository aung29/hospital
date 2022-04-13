<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CustomValidation;
use App\Rules\CustomPasswordValidation;

class SignupRequest extends FormRequest
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
            'name' => ['required', new CustomValidation()],
            'email' =>['required'],
            'password' => ['required','min:3','max:16',new CustomPasswordValidation()],
            'cfmpassword' => ['required','min:3','max:16',new CustomPasswordValidation()]
           
            // 'password' => ['required','min:3','max:16'],
            // 'cfmpassword' => ['required','min:3','max:16']
           
        ];
    }
}
