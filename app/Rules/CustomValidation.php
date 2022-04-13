<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CustomValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pattern = "/^[A-][a-z0-9]{5,20}[!#%&]/";
        session()->put('user',$value);
        return preg_match($pattern,$value) < 1 ?  false : true; 
        // return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The First Letter Must be Capital and others are number and end with ampersand!!';
    }
}
