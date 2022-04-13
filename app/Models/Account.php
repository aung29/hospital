<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;


class Account extends Model
{
    use HasFactory;


    public function insert($name,$password,$cfmpassword,$email,$token,$verify){
        
        DB::table('accounts')
        ->insert([
            'name' => $name,
            'password' => $password,
            'cfmpassword' => $cfmpassword,
            'email' => $email,
            'verify' => $verify,
            'token' =>$token
        ]);   
    }

    public function accountName(){
       $name =  DB::table('accounts')
            ->get();
        // return json_decode($name);
        return $name;
    //  echo $name;
    }

    public function  verifyEdit($token){

        DB::table('accounts')
        ->where('token',$token)
        ->update([
            'verify' =>  true
        ]);
    }

    public function findUserName($user){

       $userName = DB::table('accounts')
            ->where('name',$user)
            ->first();
        
            return $userName;
    }

    public function findEmail($email){


        $email = DB::table('accounts')
            ->where('email',$email)
            ->first();

            return $email;
    }
}
