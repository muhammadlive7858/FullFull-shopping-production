<?php

namespace App\Http\Controllers;

use App\Models\Qarz;
use App\Models\qarzhistory;
use Illuminate\Http\Request;

class QarzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qarz = Qarz::all();
        return view('qarz.index',compact('qarz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('qarz.create');
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
            'name'=>'required',
            'qarzi'=>'required',
            'desc'=>'nullable',
            'phone'=>'nullable',
            'vaqt'=>'nullable'
        ]);
        $create = Qarz::create([
            'name'=>$request->name,
            'tolav_summa'=>$request->qarzi,
            'qarzi'=>$request->qarzi,
            'desc'=>$request->desc,
            'phone'=>$request->phone,
            'vaqt'=>$request->vaqt
        ]);
        if($create){
            return redirect()->route('qarz.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Qarz  $qarz
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $qarz = qarzhistory::all()->where('qarz_id',$id);
        return view('qarz.show',compact('qarz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Qarz  $qarz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $qarz = Qarz::find($id);
        return view('qarz.edit',compact('qarz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Qarz  $qarz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $validate = $request->validate([
            'qarzi'=>'numeric',
        ]);
        $qarz = Qarz::find($id);
        $qar = $qarz->qarzi - $request->qarzi;
        $tolav = $qarz->update([
            'qarzi'=>$qar
        ]);
        qarzhistory::create([
            'qarz_id'=>$id,
            'tolav'=>$request->qarzi
        ]);
        if($tolav){
            return redirect()->route('qarz.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Qarz  $qarz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qarz = Qarz::find($id);
        $qarz->delete();
        return redirect()->back();
    }
}
