<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class sklad extends Controller
{
    public function index(){
        $cate = Category::all();
        $product = Product::all();
        return view('ombor.index',compact('cate','product'));
    }
    public function show(Request $request){
        $product = Product::all()->where('category_id',$request->category_id);
        // dd($product);
        $cate = Category::all();
        return view('ombor.index',compact('product','cate'));
    }
}
