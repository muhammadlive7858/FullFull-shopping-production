<?php

namespace App\Http\Controllers;

use App\Models\taminotchi;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\shaxsiyQarzTaminot;
use App\Models\taminotProduct;

class TaminotchiCantroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $toms = taminotchi::paginate();
        return view('taminotchi.index', compact('toms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taminotchi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //   $request->validate([
        //       'name'=>'required',
        //       'firma'=>'required',
        //   ]);
        $ts = taminotchi::create($request->input());

        if ($ts) {
            return redirect()->route('taminot.index');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

        $prod = Product::all()->where('taminotchi', $id);
        $jamiSummaDollor = 0;
        $jamiSummaSom = 0;

        $qoldiqSummaDollor = 0;
        $qoldiqSummaSom = 0;
        // dd($prod);
        foreach($prod as $product){
            if($product->dollor === 1){
                $jamiSummaDollor = $jamiSummaDollor + (floatval($product->dollors) * floatval($product->taminotcount));
            }else{
                $jamiSummaSom = $jamiSummaSom + (floatval($product->price) * floatval($product->taminotcount));
            }
        }
        $tolavSummaDollor = 0;
        $tolavSummaSom = 0;
        $history = shaxsiyQarzTaminot::all()->where('taminotchi_id',$id);
        foreach($history as $history){
            $tolavSummaDollor = $tolavSummaDollor + $history->dollor;
            $tolavSummaSom = $tolavSummaSom + $history->som;
        }
        $qoldiqSummaDollor = $jamiSummaDollor - $tolavSummaDollor;
        $qoldiqSummaSom = $jamiSummaSom - $tolavSummaSom;
        $id = $id;
        return view('taminotchi.show', compact('prod','jamiSummaDollor','qoldiqSummaDollor','jamiSummaSom','qoldiqSummaSom','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taminot = taminotchi::find($id);
        return view('taminotchi.edit', compact('taminot'));
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
        $taminot = taminotchi::find($id);
        $update = $taminot->update($request->input());
        if ($update) {
            return redirect()->route('taminot.index');
        }
        else {
            return redirect()->back();
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

        //dd($id);
        $delete = taminotchi::find($id);
        $del = $delete->delete($id);
        return redirect()->back();
    }
}
