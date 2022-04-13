<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    function login(Request $request){

        $accounts = new Account();
        if(session()->has('token')){
            
            $token = session('token');
            $accounts->verifyEdit($token);
         //    session()->pull('token');
         }

        if($request->isMethod('GET')){
            return View('login.login');
        }
        if(session()->has('user')){
            return redirect('dashboard');
        }

    //    Log::critical("message",["One time log"]);
       
        // $name = $accounts->accountName();

       

        
        $reqName = $request->input('name');
        $reqPassword =$request->input('password');


         $validateName = $accounts->findUserName($reqName);
        Log::critical("first data",[$validateName]);
            if($validateName == null){
                Log::critical("if null",[$validateName]);
                return View('login.login',['error'=>1]);
             
            }

            // foreach($validateName as $value){
               
                if(strcmp($validateName->password,$reqPassword) == 0){

                    if($validateName->verify == true){
                        session()->put('user',$validateName->name);
                        return redirect('dashboard');
                    }else{
                        // Log::critical("wrong verify",["wrong"]);
                        return View('login.login',['error' =>2]);
                    }
                }else{
                    // Log::critical("wrong password",["wrong"]);
                    return View('login.login',['error'=>3]);
                }
            

                //error
        // Log::critical("outside",[$reqPassword]);

        // foreach($name as $value){
        //     Log::critical("outside loop",[$value]);
        //     if($reqName == $value->name && $reqPassword == $value->password && $value->verify == true){
        //         session()->put('user',$value->name);
        //         Log::critical("inside",[$reqPassword]);
        //         Log::critical("inside verify 1",[$value->verify]);
        //         Log::critical("inside verify 1",[$value->name]);
        //         Log::critical("inside verify 1",[$value->password]);
        //         // Log::critical("message","here");
        //         Log::critical("message",["two time log"]);

        //         return redirect('dashboard');
        //     }else{
        //         Log::critical("inside",[$reqName]);
        //         Log::critical("inside",[$reqPassword]);
        //         Log::critical("inside verify 2",[$value->verify]);
        //         Log::critical("inside verify 2",[$value->name]);
        //         Log::critical("inside verify 2",[$value->password]);
        //         Log::critical("name",[$name]);
        //         Log::critical("name",[$value]);
        //         Log::critical("message",["three time log"]);
        //         return View('login.login');
        //     }
        // }
        // Log::critical("name",[$reqName]);
        // Log::critical("pw",[$reqPassword]);
        // // $validate = $request->validated();
        // foreach($name as $value){
        //         if($reqName == $value->name && $reqPassword == $value->password ){
        //             session()->put('user',$value->name);
        //             return redirect('dashboard');
        //         }else{
        //             return View('login.login');
        //         }
        // }

        
     
      return View("login.login",['error'=> 0]);
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
         
  

    function logout(){
        if(session()->has('user')){
            session()->pull('user');
        }
        if(session()->has('token')){
            session()->pull('token');
        }
        return redirect('login');
    }
}
