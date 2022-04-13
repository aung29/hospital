<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Room extends Model
{
    use HasFactory;


   function showRoomTable(){
  
      $rooms = DB::table('rooms')
            ->paginate(4);

       return $rooms;
       
   }

   function allData(){

    $rooms = DB::table('rooms')
       ->get();

       return $rooms;
   }
}

