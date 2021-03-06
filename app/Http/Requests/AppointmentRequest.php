<?php

namespace App\Http\Requests;

use App\Rules\AppointmentTimeValidation;
use App\Rules\DoctorNameValidation;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'name' => ['required',new  DoctorNameValidation()],
            'room' =>['required'],
            'date' =>['required'],
            'time' => ['required',new AppointmentTimeValidation()],
        ];
    }
}
