<?php

namespace App\Http\Controllers;

use App\Models\Chiqim;
use Illuminate\Http\Request;

class ChiqimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chiqim = Chiqim::all();
        return view('chiqim.index',compact('chiqim'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chiqim.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vaqt = date("Y-m-d");
        $vaqt = explode('-',$vaqt);
        // dd($vaqt[1]);
        $store = Chiqim::create([
            'desc'=>$request->desc,
            'summa'=>$request->summa,
            'month'=>$vaqt[1],
            'year'=>$vaqt[0]
        ]);
        if($store){
            return redirect()->route('chiqim.index');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chiqim  $chiqim
     * @return \Illuminate\Http\Response
     */
    public function show(Chiqim $chiqim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chiqim  $chiqim
     * @return \Illuminate\Http\Response
     */
    public function edit(Chiqim $chiqim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chiqim  $chiqim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chiqim $chiqim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chiqim  $chiqim
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $delete = Chiqim::find($id)->delete();
        if($delete){
            return redirect()->route('chiqim.index');
        }
        return redirect()->back();
    }
}
