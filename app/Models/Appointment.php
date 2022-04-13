<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Appointment extends Model
{
    use HasFactory;

    function showAppointmentTable(){
  
        $appointments = DB::table('appointments')
              ->limit(3)
              ->get();
  
         return $appointments;
         
     }

     function allData(){

        $appointments = DB::table('appointments')
           ->get();
    
           return $appointments;
       }

    public function checkDoctorTime($doctorName){

        // $doctorName = session('doctorname');
        $data = DB::select("SELECT  avaliable_date,TIME_FORMAT(starts,'%r') AS start_time,TIME_FORMAT(ends,'%r') AS end_time FROM doctors WHERE name = :name ", ['name' => $doctorName]);
        
        return $data;
    }

    public function checkAppointment($doctorName,$time){

        $data = DB::select('SELECT time FROM appointments
          WHERE name = :name AND :time1 BETWEEN DATE_SUB(time,INTERVAL 1 HOUR) AND DATE_ADD(time,INTERVAL 1 HOUR)', ['name' => $doctorName,'time1'=> $time]);

        Log::critical("time",$data);
        return $data;

    }

    public function checkTime($time){
         
        $data = DB::select('SELECT * FROM doctors
        WHERE :time BETWEEN starts AND ends', ['time'=>$time]);

        // session()->forget('doctorname');
        return $data;

    }
}