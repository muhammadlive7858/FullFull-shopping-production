<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Omborxona;
use App\Models\Product;
use Illuminate\Http\Request;

class OmborxonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s = $request->category_id;
        $product = Product::where('category_id', $s)->get();
        $shop_price = [];
        $price = [];
        $count = [];
        foreach($product as $pro){
            array_push($shop_price , $pro->shop_price);
            array_push($price      , $pro->price);
            array_push($count      , $pro->count);
            
        }
        
        $kelish = array_sum($price);
        $soni =    array_sum($count);
        $cate = Category::all();
         $sotish =   array_sum($shop_price);
         $res = $sotish - $kelish;
         

        return view('ombor.search', compact('product' , 'cate', 'sotish'    , 'kelish' , 'soni' , 'res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Omborxona  $omborxona
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Omborxona  $omborxona
     * @return \Illuminate\Http\Response
     */
    public function edit(Omborxona $omborxona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Omborxona  $omborxona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Omborxona $omborxona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Omborxona  $omborxona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Omborxona $omborxona)
    {
        //
    }
}
