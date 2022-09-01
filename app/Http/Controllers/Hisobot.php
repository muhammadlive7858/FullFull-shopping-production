<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asosiy_sotuvlar;
use Symfony\Component\VarDumper\Cloner\Data;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Chiqim;

class Hisobot extends Controller
{
    public function index(){
        $oy = 13;
        $savdo = [];
        $date = date('Y-m-d');
        $ex = explode( '-' , $date);

        $jamiSavdo = 0;
        $jamiFoyda = 0;
        $jamiQaytim = 0;

        for($i = 1; $i<$oy ;$i++){
            if($oy<10){
                $i = "0"+$i;
                // dd($i);
                $sotuv[$i] = Asosiy_sotuvlar::all()->where('month',$i)->where('year' ,$ex[0]);
            }else{
                $sotuv[$i] = Asosiy_sotuvlar::all()->where('month',$i)->where('year' , $ex[0]);
            }
        
        }
       
        $i = 1;
        /*MONTH*/ 
        foreach($sotuv as $savdo){
            $res[$i]['savdo'] = 0;
            $res[$i]['foyda'] = 0;
            $res[$i]['qaytim'] = 0;
            foreach($savdo as $sav){
                $res[$i]['savdo'] = $res[$i]['savdo'] + $sav->savdo;
                $res[$i]['foyda'] = $res[$i]['foyda'] + $sav->foyda;
                $res[$i]['qaytim'] = $res[$i]['qaytim'] + $sav->skidka;
            }
            $i++;
        }
        /*rosxot*/
        for($i = 1; $i<$oy ;$i++){
            if($oy<10){
                $i = "0"+$i;
                // dd($i);
                $chiqim[$i] = Chiqim::all()->where('month',$i)->where('year' ,$ex[0]);
            }else{
                $chiqim[$i] = Chiqim::all()->where('month',$i)->where('year' , $ex[0]);
            }
        }
        $i = 1;
        foreach($chiqim as $element){
            $rasxot[$i]['chiqim'] = 0;
            foreach($element as $e){
                $rasxot[$i]['chiqim'] = $rasxot[$i]['chiqim'] + $e->summa;
            }
            $i++;
        }
        $yearchiqim = 0;
        $i = 1;
        foreach($rasxot as $r){
            $yearchiqim = $yearchiqim + $r['chiqim'];
            $i++;
        }
        
        // dd($yearchiqim);
        
        
        /*year*/
        foreach($sotuv as $sotuv){
            foreach($sotuv as $sotish){
                $jamiSavdo = $jamiSavdo + $sotish->savdo;
                $jamiFoyda = $jamiFoyda + $sotish->foyda;
                $jamiQaytim = $jamiQaytim + $sotish->skidka;
            }
        }
        $vaqt = date("Y-m-d");
        $vaqt = explode('-',$vaqt);
        $date = $vaqt[0];
        // dd($jamiSavdo);
        return view('hisob.index' , compact('res','jamiSavdo','jamiFoyda','jamiQaytim','date','rasxot','yearchiqim'));
    }
    public function prosearch(Request $request){
    
$product = Product::where('name' , 'LIKE' , '%'. $request->prosearch . '%' )->get();
        $prod_price = 0;
        $prod_shopprice = 0;
        $prod_turi = 0;
        $prod_soni = 0;
        // $foyda = 0;

        // $product = Product::all();
        foreach($product as $prod){
            $prod_price = $prod_price + $prod->price;
            $prod_shopprice = $prod_shopprice + $prod->shop_price;
            $prod_turi = $prod_turi + 1;
            $prod_soni = $prod_soni + $prod->count;
            // $foyda = $foyda + ($product->shop_price - $product->price);
        }
        return view('product.index' ,compact('product','prod_price','prod_shopprice','prod_turi','prod_soni'));
      //return view('product.index' , compact('product'));
    }
    public function yillik(){
      $data = date('Y-m-d');
        // dd($date);
        $res = explode('-' , $data);
        $res_two = $res[0];
        $sotu = Asosiy_sotuvlar::where('year' , $res_two)->get();
        $sotuv  = [];
        $foyda = [];
        $skidka = [];
        foreach($sotu as $sot){
             array_push($sotuv , $sot->savdo);
             array_push($foyda , $sot->foyda);
             array_push($skidka , $sot->skidka);
        // dd($sotuv);
        }
        $result = [];
        $result['sotuv'] = array_sum($sotuv);
        $result['foyda'] = array_sum($foyda);
        $result['skidka'] = array_sum($skidka);
        $result['yil'] = $res_two;
        // dd($result);
        $pdf  = Pdf::loadView('yillik',['res'=>$result] , ['sotu' => $sotu] );
        return $pdf->download('invoic.yillik.pdf');
    }
}
