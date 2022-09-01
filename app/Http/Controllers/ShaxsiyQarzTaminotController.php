<?php

namespace App\Http\Controllers;

use App\Models\shaxsiyQarzTaminot;
use Illuminate\Http\Request;
use App\Models\Product;

class ShaxsiyQarzTaminotController extends Controller
{   
    public function create($id){
        $id = $id;
        return view('taminotchi.shqarz.create',compact('id'));
    }
    public function createSom($id){
        $id = $id;
        return view('taminotchi.shqarz.som.create',compact('id'));
    }
    public function store(Request $request,$id){
        // dd($request);
        if($request->summa === 'dollor'){
            shaxsiyQarzTaminot::create([
                'taminotchi_id'=>$id,
                'dollor'=>$request->dollor
            ]);
            return redirect()->route('taminot.show',$id);
        }elseif($request->summa === 'som'){
            shaxsiyQarzTaminot::create([
                'taminotchi_id'=>$id,
                'som'=>$request->dollor
            ]);
            return redirect()->route('taminot.show',$id);
        }
    }
    public function show($id){
        // dd('mmm');
        $show = [];
        $shows = shaxsiyQarzTaminot::all()->where('taminotchi_id',$id);
        foreach($shows as $shows){
            if(isset($shows->dollor)){
                array_push($show,$shows);
            }
        }
        return view('taminotchi.shqarz.show',compact('show'));

    }
    public function showSom($id){
        // dd('mmm');
        $show = [];
        $shows = shaxsiyQarzTaminot::all()->where('taminotchi_id',$id);
        foreach($shows as $shows){
            if(isset($shows->som)){
                array_push($show,$shows);
            }
        }
        return view('taminotchi.shqarz.showsom',compact('show'));
    }
    public function destroy($id){
        $qarz = shaxsiyQarzTaminot::find($id);
        $delete = $qarz->delete();
        return redirect()->back(); 
    }
    public function productedit($id){
        $prod = Product::find($id);
        return view('taminotchi.editproduct',compact('prod'));
    }
    public function productupdate(Request $request,$id){
        // dd('mmm');
        $prod = Product::find($id);
        $product = Product::find($id);

        $prod = $prod->update([
            'count'=>$product->count + $request->count,
            'taminotcount'=>$product->taminotcount + $request->count
        ]);
        return redirect()->route('taminot.index');
    }
}
