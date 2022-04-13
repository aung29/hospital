<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Account;
use App\Http\Requests\SignupRequest;
use App\Mail\VerifyTemplate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SignupController extends Controller
{
    public function signup(SignupRequest $request){
        $accounts = new Account();

        // $reqName = $request->input('name');
        // session()->put('user',$reqName);

        $validate = $request->validated();
        $name = $validate['name'];
        $email = $validate['email'];
        $password = $validate['password'];
        $cfmpassword = $validate['cfmpassword'];
       

        
        // echo $validate;

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        $verify = false;
         for ($i = 0; $i < 12; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
             }
             
             

            $validateEmail = $accounts->findEmail($email);

            
    
             Log::critical("validated",[$validateEmail]);
           
            if($validateEmail == null || $validateEmail->email != $email){
                $accounts->insert($name,$password,$cfmpassword,$email,$randomString,$verify);
                $mail=[
                    'title' => $name,
                    'token' => $randomString
                    // 'text' => 'Thanks for registering for an account on Discord! Before we get started, we just need to confirm that this is you. Click below to verify your email address:'
                ];
        
                Mail::to($email)->send(new VerifyTemplate($mail));
                return View("mail.confirm");
            }else{

                return View("login.signup",['error' =>5 ]);
            }
        
            
        
           
      

     
    }

    public function compareName(){
        $accounts = new Account();
        $name = $accounts->accountName();
            print_r($name);
            foreach($name as $object) {
                $names[] = $object->name;
            }

            print_r( $names);
            foreach($names as $value){
                $string = "Aung";
                if($string  == $value){
                    echo "me";
                }
                echo $value;
            }
    //    $spName =  print_r( json_decode($name));
    }
         
}

