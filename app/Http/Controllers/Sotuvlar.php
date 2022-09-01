<?php

namespace App\Http\Controllers;

use App\Models\Asosiy_sotuvlar;
use App\Models\Sotuv_Royxati;
use Illuminate\Http\Request;

class Sotuvlar extends Controller
{
    public function index(){
        $sotuv = Asosiy_sotuvlar::orderBy('id','desc')->get();

        $jamiSumma = 0;
        $jamiNaxt = 0;
        $jamiPlastik = 0;
        $jamiFoyda = 0;
        $jamiQaytim = 0;
        $res = [];
        $i = 0;
        $n = 0;
        //  dd($sotuv);
        foreach($sotuv as $sotish){
            foreach(json_decode($sotish->fullname) as $names){
                    // dd($names);
                foreach($names as $key => $name){
                    if($key === "name"){
                        $res[$n][$i]['name'] = $name;
                    }
                    if($key === 'count'){
                        $res[$n][$i]['count'] = $name;
                    }
                }

                    $i++;
            }
            // $sotuv->fullname[$n] = $res[$n]; 
            $n++;


            $jamiSumma   = $jamiSumma + $sotish->savdo;
            $jamiNaxt    = $jamiNaxt + $sotish->naxt;
            $jamiPlastik = $jamiPlastik + $sotish->plastik;
            $jamiFoyda   = $jamiFoyda + $sotish->foyda;
            $jamiQaytim  = $jamiQaytim + $sotish->skidka;
        }
        // dd($res[0][0]);


        return view('sotuvlar.index',compact('res','sotuv','jamiSumma','jamiNaxt','jamiPlastik','jamiFoyda','jamiQaytim'));
    }
    public function debt_shop($id){
        $sotuv = Asosiy_sotuvlar::orderBy('id','desc')->where('id',$id)->get();

        $jamiSumma = 0;
        $jamiNaxt = 0;
        $jamiPlastik = 0;
        $jamiFoyda = 0;
        $jamiQaytim = 0;
        $res = [];
        $i = 0;
        $n = 0;
        //  dd($sotuv);
        foreach($sotuv as $sotish){
            foreach(json_decode($sotish->fullname) as $names){
                    // dd($names);
                foreach($names as $key => $name){
                    if($key === "name"){
                        $res[$n][$i]['name'] = $name;
                    }
                    if($key === 'count'){
                        $res[$n][$i]['count'] = $name;
                    }
                }

                    $i++;
            }
            // $sotuv->fullname[$n] = $res[$n]; 
            $n++;


            $jamiSumma   = $jamiSumma + $sotish->savdo;
            $jamiNaxt    = $jamiNaxt + $sotish->naxt;
            $jamiPlastik = $jamiPlastik + $sotish->plastik;
            $jamiFoyda   = $jamiFoyda + $sotish->foyda;
            $jamiQaytim  = $jamiQaytim + $sotish->skidka;
        }
        // dd($res[0][0]);


        return view('sotuvlar.index',compact('res','sotuv','jamiSumma','jamiNaxt','jamiPlastik','jamiFoyda','jamiQaytim'));
    }
    public function edit($id){
        $sotuv = Asosiy_sotuvlar::all()->where('id',$id);
        return view('sotuvlar.edit',compact('sotuv'));
    }
    public function update($id,Request $request){
        $edit = Asosiy_sotuvlar::find($id);
        $update = $edit->update($request->input());
        if($update){
            return redirect()->route('sotuvlar');
        }else{
            return redirect()->back();
        }
    }
    public function destroy($id){
        $delete = Asosiy_sotuvlar::find($id);
        // dd($delete);
        $delete = $delete->delete();
        return redirect()->back();
    }
}
