<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Message;
use App\Models\Drug;
use App\Models\Account;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function roomTable(){


        if(session()->has('user')){
    
         $room = new Room();
       $result = $room->showRoomTable();

       $message = new Message();
       $result2 = $message->showMessageTable();
        
       $drugs = new Drug();
       $result3 = $drugs->showDrugTable();

       $appointments = new Appointment();
       $result4 = $appointments->showAppointmentTable();
       

     
      //  if(session()->has('language')){
      //   $lang = session()->get('language');
      //   if (!in_array($lang, ['en', 'jp'])) {
      //     abort(400);
      //     }
      //     App::setLocale($lang);
      //  }
      
          
  

       return View("home.dashboard",['result' => $result,'result2'=>$result2,'result3'=>$result3,'result4'=>$result4,'active' => 1]);
      }
      return redirect('login');

       
    }


    public function home(Request $request){
        $username = $request->input('name');
      $request->session()->put('user',$username);
      // return view('dashboard');
      return redirect('dashboard');
  }

    public function tableOne(){

      if(session()->has('user')){
       $room = new Room();
       $result = $room->showRoomTable();
        
       return View('home.roomtable',['rooms' => $result,'active' =>1]);
      }
    }

}
