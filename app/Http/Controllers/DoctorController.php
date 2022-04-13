<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = DB::table('doctors')
            ->get();


        return View('home.doctorlist',['doctors' => $doctors, 'active' =>7]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('home.doctorcreate',['active'=> 1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        if($request->hasFile('profile')){
         $file = $request->file('profile');
         $name = $request->input('name');
         $fileUpload= $file->storeAs('doctorProfile',$name.".".$file->getClientOriginalExtension());
         DB::table('doctors')
         ->insert([
             'name' => $request->input('name'),
             'profile' => $fileUpload,
             'specialist' => $request->input('specialist'),
             'avaliable_date' => $request->input('stdate'),
             'starts'=>$request->input('sttime'),
             'ends' => $request->input('endtime')
             
         ]);   
 
        return  redirect("doctor");
            
        }
       
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
        $doctors = DB::table('doctors')
        ->where('id',$id)
        ->first();
        
        return View('home.doctoredit',['doctors' => $doctors,'active' => 1]);
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
        if($request->hasFile('profile')){
            $file = $request->file('profile');
            $name = $request->input('name');
            $file->storeAs('doctorProfile',$name.".".$file->getClientOriginalExtension());

         DB::table('doctors')
        ->where('id',$id)
        ->update(
            [
            'name' => $request->input('name'),
             'profile' => $file,
             'specialist' => $request->input('specialist'),
             'avaliable_date' => $request->input('stdate'),
             'starts'=>$request->input('sttime'),
             'ends' => $request->input('endtime')
             
             ] );
        
    return redirect('doctor');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::table('doctors')
        ->where('id',$id)
        ->delete();
    
        return redirect('doctor');
    }
}
