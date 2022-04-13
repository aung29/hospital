<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Models\Doctor;
use App\Rules\AppointmentTimeValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments  = DB::table('appointments')
        ->get();
        
       return View('home.appointmentlist',['appointments' => $appointments,'active' => 6]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $doctors = new Doctor();
      
        $result = $doctors->doctorLists();
        return View('home.appointmentcreate',['active' => 1,'doctors' => $result]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        $validate = $request->validated();
        $name = $validate['name'];
        $room = $validate['room'];
        $date = $validate['date'];
        $time = $validate['time'];
        DB::table('appointments')
        ->insert([
            'name' => $name,
            'room' => $room,
            'date' => $date,
            'time' => $time

        ]);   

       return  redirect("appointment");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointments = DB::table('appointments')
        ->where('id',$id)
        ->first();
        
        return View('home.appointmentedit',['appointments' => $appointments,'active' => 1]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $appointments = DB::table('appointments')
        ->where('id',$id)
        ->update(
            [
                'name' => $request->input('name'),
                'room' => $request->input('room'),
             'date' => $request->input('date'),
             'time' => $request->input('time')
             ] );
        
    return redirect('appointment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointments = DB::table('appointments')
        ->where('id',$id)
        ->delete();
    
        return redirect('appointment');
    }
}
