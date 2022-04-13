<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Message extends Model
{
    use HasFactory;

    function showMessageTable(){
  
        $messages = DB::table('messages')
              ->limit(3)
              ->get();
  
         return $messages;
         
     }

     function allData(){

        $messages = DB::table('messages')
           ->get();
    
           return $messages;
       }
}
