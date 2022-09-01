<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Models\Asosiy_sotuvlar;
use App\Models\Category;
use App\Models\Search;
use App\Models\HodimShop as HShop;
use App\Models\Sotuv_Royxati;
use App\Models\hodimvaqtincha;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\client;
use App\Models\Hodimlar;
use Barryvdh\DomPDF\Facade\Pdf;

class hodimshop extends Controller
{
    // public array = [];
    public function index(){
        $cate = Category::all();
        $product = Product::all();
        return view('hodim.shop.shop',compact('cate','product'));
    }

    public function productsearch(Request $request){

      //  dd($request->productsearch);
        $name = $request->productsearch;
        if (trim($name)) {
            $productname = DB::table('products')->where('name', 'like', '%' . $name . '%')->where('count', '>', 0)->get();

            $prod_vaqt = hodimvaqtincha::all();
            $client = [];
            return view('hodim.shop.create', compact('productname', 'prod_vaqt', 'client'));
        } 
        else {
            return redirect()->back();
        }
    }

    public function create_vaqtincha(Request $request){
        $prod = intval($request->productid);
        if($prod !== 0){
        $prod = Product::all()->where('id',$prod)->first();
        $store = hodimvaqtincha::create([
            'product_id'=>$prod->id,
            'product_name'=>$prod->name,
            'product_count'=>$prod->count,
            'price'=>$prod->shop_price,
            'inputVal'=>0
        ]);
    }else{
        return redirect()->back();
    }
        if($store){
            $prod_vaqt = hodimvaqtincha::all();
            $client = [];
            return view('hodim.shop.create', compact('prod_vaqt', 'client'));
            // return view('shop.create',compact('prod_vaqt','client'));
        }else{
            return redirect()->back();
        }
    }
    public function productid(Request $request){
        $validate = $request->validate([
            'producttime'=>'numeric',
        ]);
        $cate = Category::all();
        $product = Product::all()->where('producttime',$request->input('productid'));
        
        

        // dd($product);
        // return view('shop.create',compact('product','cate'));
        foreach($product as $product){
            $vaqt = hodimvaqtincha::create([
                    'product_id'=>$product['id'],
                    'product_name'=>$product['name'],
                    'product_count'=>$product['count'],
                    'price'=>$product['shop_price'],
            ]);
        }
        $prod_vaqt = hodimvaqtincha::all();
        // dd($product);
        return view('hodim.shop.create',compact('cate','prod_vaqt'));

    }

    public function edit(Request $request,$id){
        // dd($id);
        $prod = hodimvaqtincha::find($id);
        $store = $prod->update([
            'inputVal'=>$request->inputVal
        ]);
        if($store){
            $prod_vaqt = hodimvaqtincha::all();
          
            return view('hodim.shop.create',compact('prod_vaqt' ));
        }
        return redirect()->back();
    }




    public function hisoblash(){
        $savdo = 0;
        $price = [];
        $i = 0;
        $prod = hodimvaqtincha::all();
        foreach($prod as $product){
            // dd($prod);
            $savdo = $savdo + ($product['price'] * $product['inputVal']);
            $price[$i] = $product['price'];
            
            $product_mossiv[$i] = $product->product_id;
            $sotish_soni_mossiv[$i] = $product->inputVal;
            $i++;
        }
        $prod_vaqt = hodimvaqtincha::all();
        $client = Hodimlar::all();
        // dd($savdo);
        return view('hodim.shop.create',compact('prod_vaqt','client','product_mossiv','sotish_soni_mossiv','savdo'));
    }

    public function fullHisob(Request $request){
        // dd($request->hodim_id);
        $request->validate([
            'count'=>'required',
            'hodim_id'=>'required',
            'skidka'=>'nullable'
        ]);
        // request = skidka , product[], count [],client,plastik,savdo
        $prod = hodimvaqtincha::all();
        $i = 0;
        $name = [];
        $foyda = [];
        $savdo = 0;
        $fullFoyda = 0;
        $product_mossiv = [];
        $original_count = [];
        foreach($request->product as $prod){
            $prod = intval($prod);
            $product = Product::all()->where('id',$prod)->first();
            // dd($product->count);
            $original_count[$i] = $product->count;
            $product_mossiv[$i] = $product;
            $name[$i] = $product->name;
            $foyda[$i] = $product->shop_price - $product->price;
            $i++;
        }
        $i = 0;
        // $count = client::all();
        $fullName = '';
        foreach($request->count as $count){
            // $count[$i] = $count;
            $count = floatval($count);
            // if($i === 1){
            //     dd($count);
            // }
            $fullFoyda = $fullFoyda + (floatval($count) * floatval($foyda[$i]));
            // dd($fullFoyda);
            $fullName =$fullName ." ,  ". $name[$i]."  -->  ".$count;
            $product_mossiv[$i]->update(['count'=>$original_count[$i] - $count]);
            $i++;
        }
        $fullName = json_encode($fullName);
        $store = Hshop::create([
            'fullname'=>$fullName,
            'savdo'=>$request->savdo,
            'foyda'=>$fullFoyda,
            'skidka'=>$request->skidka,
            'hodim_id'=>intval($request->hodim_id)
        ]);
        if($store){
            $store = Hodimlar::find($request->hodim_id);
            $store = $store->update(['qoldiq'=>$store->qoldiq - $request->savdo]);
        }
        if($store){
            $vaqt = hodimvaqtincha::get();
            foreach($vaqt as $vaqt){
                $delete = $vaqt->delete();
            }

            
            return Redirect()->route('hodimshop-index');
            
        }else{
            return redirect()->back();
        }

        

    }
    // public function pdf(){
    //     $s = Asosiy_sotuvlar::all()->orderBy('id','desc')->first();
    //     $req = $s->savdo;
    //     $date = date('Y-m-d h:m:s');
        
    //     $pdf = Pdf::loadView('pdf' , ['s'=> $s] , ['r' => $req] );
    //     return $pdf->download($date.'.pdf')->Redirect()->route('shop-index');
    // }




    // public function sotish(Request $request){
       
    //     $i = 0;
    //     foreach($request->prod_id as $prod_id){
    //         $s = intval($prod_id);
    //         // dd($s);
    //         // $pro = Product::where('id', $s )->get();
    //         $pro = Product::find($s);
    //         $update = $pro->update([
    //             'count' => $pro->count - intval($request->sotish_soni[$i])
    //         ]);

    //         $i++;

    //     }
    //     // dd($request->prod_id);
    //     $i = 0;
    //     foreach($request->prod_id as $prod){
    //         $product = Product::all()->where('id',intval($prod))->first();
    //         // dd($product);
    //         $name[$i] = $product->name;
    //         $f[$i] = intval($product->shop_price) - $product->price;
    //         $i++;
    //     }
    //     $i = 0;
    //     foreach($request->sotish_soni as $sotish){
    //         // $sotish = $request->sotish_soni;
    //         // dd($request->skidka);
    //         $count = $sotish;
    //         $foyda = $f[$i] * intval($sotish);
    //         $skidka = intval($request->skidka) / count($request->sotish_soni);
    //         $royxat = Sotuv_Royxati::create([
    //             'product_name' => $name[$i],
    //             'count'=>$count,
    //             'foyda'=>$foyda,
    //             'skidka'=>$skidka,
    //             'tolav_turi'=>$request->tolav_turi,
    //         ]);
    //         $i++;
    //     }
        

    //     if($update){
    //         $vaqt = vaqtincha::get();
    //         foreach($vaqt as $vaqt){
    //             $delete = $vaqt->delete();
    //         }
    //         if($delete){
    //             return redirect()->route('shop-index');
    //             $s = 10;
    //         }
    //         else{
    //             return redirect()->back();

    //         }
    //     }
    // }

    public function tozalash(){

        $vaqt = hodimvaqtincha::get();
        foreach($vaqt as $vaqt){
            $delete = $vaqt->delete();
        }
        if(true){
            return redirect()->route('hodimshop-index');
        }
        else{
            return redirect()->back();
        }
    }
}
