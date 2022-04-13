<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages  = DB::table('messages')
        ->get();
        
       return View('home.messagelist',['messages' => $messages,'active' => 4]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('home.messagecreate',['active' => 1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $now = now();
        DB::table('messages')
        ->insert([
            'message' => $request->input('message'),
            'vip' => $request->input('vip'),
            'time' => $request->$now
        ]);   

       return  redirect("message");
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
        $messages = DB::table('messages')
        ->where('id',$id)
        ->first();
        
        return View('home.messageedit',['messages' => $messages,'active' => 1]);
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
        $now = now();
        $messages = DB::table('messages')
        ->where('id',$id)
        ->update(
            [
                'message' => $request->input('message'),
                'vip' => $request->input('vip'),
                'time' => $request->$now
             ] );
        
    return redirect('message');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $messages = DB::table('message')
                ->where('id',$id)
                ->delete();
            
                return redirect('message');
    }
}
