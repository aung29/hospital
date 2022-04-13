<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Doctor extends Model
{
    use HasFactory;


    public function doctorLists(){

        $doctors = DB::table('doctors')
        ->get();

        return $doctors;

    }
}
