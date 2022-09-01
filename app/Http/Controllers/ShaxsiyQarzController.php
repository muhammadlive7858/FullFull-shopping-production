<?php

namespace App\Http\Controllers;

use App\Models\ShaxsiyQarz;
use App\Models\shaxsiyqarzhistory;
use App\Models\taminotchi;
use Illuminate\Http\Request;

class ShaxsiyQarzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $taminotchi = taminotchi::all();
        $qarz = ShaxsiyQarz::all();
        return view('shaxsiyqarz.index',compact('qarz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taminotchi = taminotchi::all();
        return view('shaxsiyqarz.create',compact('taminotchi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'taminotchi_id'=>'required',
            'desc'=>'nullable',
            'summa'=>'required'
        ]);
        $store = ShaxsiyQarz::create([
            'taminotchi_id'=>$request->taminotchi_id,
            'desc'=>$request->desc,
            'summa'=>$request->summa,
            'tolav'=>$request->summa
        ]);
        if($store){
            return redirect()->route('shaxsiyqarz.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShaxsiyQarz  $shaxsiyQarz
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $show = shaxsiyqarzhistory::all()->where('qarz_id',$id);

        return view('shaxsiyqarz.show',compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShaxsiyQarz  $shaxsiyQarz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $qarz = ShaxsiyQarz::find($id);
        return view('shaxsiyqarz.edit',compact('qarz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShaxsiyQarz  $shaxsiyQarz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $qarz = ShaxsiyQarz::find($id);
        $tolav = $qarz->summa - $request->tolav;
        $update = $qarz->update([
            'summa'=>$tolav
        ]);
        shaxsiyqarzhistory::create([
            'qarz_id'=>$id,
            'tolav'=>$request->tolav
        ]);
        if($update){
            return redirect()->route('shaxsiyqarz.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShaxsiyQarz  $shaxsiyQarz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qarz = ShaxsiyQarz::find($id);
        $delete = $qarz->delete();
        if($delete){
            return redirect()->back();
        }
    }
}
