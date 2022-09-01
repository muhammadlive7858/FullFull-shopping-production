<?php

namespace App\Http\Controllers;
use App\Models\Sotuv_Royxati;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\client;

class Dashbord extends Controller
{   
    public function index(){
        $stack = Sotuv_Royxati::all();
        $count = count($stack);
        // $contents = file_get_contents('https://cbu.uz/uz/arkhiv-kursov-valyut/json/');
        // $array = json_decode($contents, true);

        // $ar = $array[0];
        // $diff = 'oshdi';
        // if ($ar['Diff'] < 0) {
        //     $diff = 'kamaydi';
        // }
        // $pre = '1 ' . $ar['CcyNm_UZ'] . ' ' . $ar['Rate'] . ' ga teng ' . $ar['Date'] . '  ' . 'kuni' . '  ' . $ar['Diff'] . '  ' . $diff;
        // $prod = Product::all()->count();
        
       $clint = client::all()->count();
        
        // dd($count);
        return view('admin.indexMain',compact('count'));
    }
}
