<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drugs  = DB::table('drugs')
        ->get();

       return View('home.druglist',['drugs' => $drugs,'active' => 5]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('home.drugcreate',['active' => 1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('drugs')
        ->insert([
            'name' => $request->input('pname'),
            'type' => $request->input('ptype'),
            'stock' => $request->input('pstock'),
            'price' => $request->input('pprice')
        ]);   

       return  redirect("drug");
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
        $drugs = DB::table('drugs')
        ->where('id',$id)
        ->first();
        
        return View('home.drugedit',['drugs' => $drugs,'active' => 1]);
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
        $drugs = DB::table('drugs')
        ->where('id',$id)
        ->update(
            [
                'name' => $request->input('pname'),
                'type' => $request->input('ptype'),
                'stock' => $request->input('pstock' ),
                'price' => $request->input('pprice')
             ] );
        
    return redirect('drug');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drugs = DB::table('drugs')
        ->where('id',$id)
        ->delete();
    
        return redirect('drug');
    }
}
