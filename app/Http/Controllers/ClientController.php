<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\prodaja;
use DB;
use Illuminate\Http\Request;
use App\Models\Asosiy_sotuvlar;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = client::all();
        return view('client.index',compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = client::create($request->input());
        if($store){
            return redirect()->route('client.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $clent = Asosiy_sotuvlar::where('client_id' ,$id)->get();
        return view('client.show' , compact('clent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = client::all()->where('id',$id);
        return view('client.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $client = client::all()->where('id',$id)->update($request->input());
        // $update = $client->update($request->input());
        if($client){
            return redirect()->route('client.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = client::all()->where('id',$id)->delete();
        // $client->delete();
        return redirect()->back();
        
    }
}
