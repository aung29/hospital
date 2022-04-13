<?php

namespace App\Http\Controllers;


// use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms  = DB::table('rooms')
         ->get();

        return View('home.roomview',['rooms' => $rooms,'active' => 3]);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('home.roomcreate',['active' => 1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return 'hello';
        DB::table('rooms')
        ->insert([
            'room' => $request->input('roomno'),
            'status' => $request->input('status'),
            'person' => $request->input('roomp' ) ?? 0,
            'price' => $request->input('roomprice')
        ]);   

       return  redirect("room");
     }

    /**
     * Display the specified resource.
     *
     * @param  int,  $id
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
         $rooms = DB::table('rooms')
            ->where('id',$id)
            ->first();
            
            return View('home.roomedit',['rooms' => $rooms,'active' => 1]);
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
        $rooms = DB::table('rooms')
            ->where('id',$id)
            ->update(
                [
                    'room' => $request->input('roomno'),
                    'status' => $request->input('status'),
                    'person' => $request->input('roomp' ) ?? 0,
                    'price' => $request->input('roomprice')
                 ] );
            
        return redirect('room');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rooms = DB::table('rooms')
            ->where('id',$id)
            ->delete();
        
            return redirect('room');
    }
}
