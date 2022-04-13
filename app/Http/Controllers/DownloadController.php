<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Message;
use App\Models\Drug;
use App\Models\Appointment;
class DownloadController extends Controller
{
    function roomStatusDownload(){
        $myFile = fopen("roomfile.txt","w");
            

        $rooms = new Room();
        $result =  $rooms->allData();

            // $txt = "Hay,This is my first writing";
 
        fwrite($myFile,$result);
        fclose($myFile);

        return response()->download(public_path('roomfile.txt'), 'All Rooms.txt');
        // return View("home.dashboard",['active' => 1]);
    }

    function messageDownload(){
        $myFile = fopen("messagefile.txt","w");
            

        $messages = new Message();
        $result =  $messages->allData();

            // $txt = "Hay,This is my first writing";
 
        fwrite($myFile,$result);
        fclose($myFile);
        return response()->download(public_path('messagefile.txt'), 'All Messages.txt');
        // return View("home.dashboard",['active' => 1]);
    }

    function drugDownload(){
        $myFile = fopen("drugfile.txt","w");
            

        $drugs = new Drug();
        $result =  $drugs->allData();

            // $txt = "Hay,This is my first writing";
        // return $result;
        fwrite($myFile,$result);
        fclose($myFile);

        return response()->download(public_path('drugfile.txt'), 'All Drugs.txt');
    }

    function appointmentDownload(){
        $myFile = fopen("appointmentfile.txt","w");
            

        $appointments = new Appointment();
        $result =  $appointments->allData();

            // $txt = "Hay,This is my first writing";
 
        fwrite($myFile,$result);
        fclose($myFile);

        return response()->download(public_path('appointmentfile.txt'), 'All Appointments.txt');
    }
}
