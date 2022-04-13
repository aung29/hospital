<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Drug extends Model
{
    use HasFactory;

    function showDrugTable(){
  
        $drugs = DB::table('drugs')
              ->limit(3)
              ->get();
  
         return $drugs;
         
     }

     function allData(){

        $drugs = DB::table('drugs')
           ->get();
    
           return $drugs;
       }
}
