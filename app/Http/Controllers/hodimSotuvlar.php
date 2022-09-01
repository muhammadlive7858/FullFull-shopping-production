<?php

namespace App\Http\Controllers;

use App\Models\Asosiy_sotuvlar;
use App\Models\Hodimlar;
use App\Models\HodimShop;
use App\Models\Sotuv_Royxati;
use Illuminate\Http\Request;

class hodimSotuvlar extends Controller
{
    public function index(){
        $sotuv = HodimShop::all();

        $jamiSumma = 0;
        $jamiNaxt = 0;
        $jamiPlastik = 0;
        $jamiFoyda = 0;
        $jamiQaytim = 0;
        foreach($sotuv as $sotish){
            $jamiSumma = $jamiSumma + $sotish->savdo;
            $jamiNaxt = $jamiNaxt + $sotish->naxt;
            $jamiPlastik = $jamiPlastik + $sotish->plastik;
            $jamiFoyda = $jamiFoyda + $sotish->foyda;
            $jamiQaytim = $jamiQaytim + $sotish->skidka;
        }

        return view('hodim.sotuvlar.index',compact('sotuv','jamiSumma','jamiNaxt','jamiPlastik','jamiFoyda','jamiQaytim'));
    }
    public function edit($id){
        $hodim = Hodimlar::all();
        $sotuv = HodimShop::all()->where('id',$id);
        return view('hodim.sotuvlar.edit',compact('sotuv','hodim'));
    }
    public function update($id,Request $request){
        $edit = Asosiy_sotuvlar::find($id);
        $update = $edit->update($request->input());
        if($update){
            return redirect()->route('hodimsotuvlar');
        }else{
            return redirect()->back();
        }
    }
    public function destroy($id){
        $delete = HodimShop::find($id);
        // dd($delete);
        $delete = $delete->delete();
        return redirect()->back();
    }
}


