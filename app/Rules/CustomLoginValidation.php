<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Account;
class CustomLoginValidation implements Rule

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
        $accounts = new Account();
        // $name = $accounts->accountName();
        
        // foreach($name as $dbname){
        //     if($value == $dbname->name){
        //         session()->put('user',$value->name);
        //         return redirect('dashboard');
        //     }else{
        //         return View('login.login');
        //     }
    // }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Username is Wrong';
    }
}
