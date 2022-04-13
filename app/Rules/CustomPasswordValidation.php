<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomPasswordValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    

     private $data;
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
        
        // $sessionName = session()->get('user');

        // if(strpos($sessionName,$value)){
        //     session()->pull('user');
        //     return true;
        // }
        // return false;

        $name = session()->get('user');
        $nameChar = preg_replace("/[^a-zA-Z]+/", " ", $name);
        $valueChar = preg_replace("/[^a-zA-Z]+/", " ", $value);
    
        if(strlen($nameChar) <= strlen($valueChar)){

          if(stripos($valueChar, $nameChar) === false){
          
            return true;
          }

          return false;
        }else{
          if(stripos($nameChar, $valueChar) === false){
          
            return true;
          }

          return false;
        }
         
          
        //  return  stripos($valueChar, $nameChar)  ? true : false;
           
        

       
     
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Password must be between 8 to 16 characters and username character don't include in this!";
    }
}
