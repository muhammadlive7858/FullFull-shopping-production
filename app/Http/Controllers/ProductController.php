<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
// use App\Models\ShaxsiyQarz;
// use App\Models\shaxsiyqarzhistory;
use Illuminate\Http\Request;
use App\Models\taminotchi;
// use App\Models\taminotProduct;
use App\Models\vaqtinchaDollor;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::user();
        if($user->role === 'admin'){    
        return abort('403','Bu sahifa director uchun  himoyalangan !');
        }
        $prod_price = 0;
        $prod_shopprice = 0;
        $prod_turi = 0;
        $prod_soni = 0;
        // $foyda = 0;
        $pro = Product::where('count' , '<=' , 0)->get();
        foreach($pro as $pr){
            $pr->delete();
        }

        $product = Product::all();
        foreach($product as $prod){
            $prod_price = $prod_price + $prod->price;
            $prod_shopprice = $prod_shopprice + $prod->shop_price;
            $prod_turi = $prod_turi + 1;
            $prod_soni = $prod_soni + $prod->count;
            
            // $foyda = $foyda + ($product->shop_price - $product->price);
        }
        
        return view('product.index' ,compact('product','prod_price','prod_shopprice','prod_turi','prod_soni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $taminot = taminotchi::all();
        $cate = Category::all();
        return view('product.create',compact('cate','taminot'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validate = $request->validate([
                'name'=>'string|min:3|max:255',
                'price'=>'numeric',
                'shop_price'=>'numeric',
                'count'=>'numeric',
                'desc'=>'nullable|max:200',
        ]);
        $request->taminotchi = intval($request->taminotchi);
            $summa = $request->price * $request->count;
            if($request->dollorHisob === "on"){
                $dollorVaqtincha = vaqtinchaDollor::orderBy('id','desc')->first();
                
                
                $tam = taminotchi::find($request->taminotchi);
                // dd($tam->name);
                $store = Product::create([
                    'name'=>$request->name,
                    'category_id'=>$request->category_id,
                    // 'desc'=>$request->desc,
                    'producttime'=>$request->producttime,
                    'taminotchi'=>$request->taminotchi,
                    'dollor'=>true,
                    'dollors'=>$dollorVaqtincha->dollor,
                    'som'=>$dollorVaqtincha->som,
                    'price'=>$request->price,
                    'shop_price'=>$request->shop_price,
                    'count'=>$request->count,
                    'taminotCount'=>$request->count
                ]);
                    if($store){
                        vaqtinchaDollor::orderBy('id','desc')->first()->delete();
                        return redirect()->route('product.index');
                    }else{
                        return redirect()->back();
                    }
                // }
            }else{
                $store = Product::create([
                    'name'=>$request->name,
                    'category_id'=>$request->category_id,
                    // 'desc'=>$request->desc,
                    'producttime'=>$request->producttime,
                    'taminotchi'=>$request->taminotchi,
                    'dollor'=>false,
                    'price'=>$request->price,
                    'shop_price'=>$request->shop_price,
                    'count'=>$request->count,
                    'taminotcount'=>$request->count

                ]);
                if($store){
                    return redirect()->route('product.index');
                }else{
                    return redirect()->back();
                }
            }
        }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $cate = Category::all();
        $taminot = taminotchi::all();
        $product = Product::find($id);
        return view('product.edit',compact('product','cate','taminot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $store = true;
            if($store){
                $prod = Product::find($id);
                // $count = $prod->count;
                // $taminotCount = $prod->taminotcount;
                $prod = Product::find($id);
                    $store = $prod->update([
                        'name'=>$request->name,
                        'category_id'=>$request->category_id,
                        // 'desc'=>$request->desc,
                        'producttime'=>$request->producttime,
                        'price'=>$request->price,
                        'shop_price'=>$request->shop_price,
                        'count'=>$request->count,
                        'taminotcount'=>$request->count
                    ]);
                    if($store){
                        return redirect()->route('product.index');
                    }else{
                        return redirect()->back();
                    }
            }
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $delete = Product::find($id)->delete();
        
        if($delete){
            // taminotProduct::find($id)->delete();
            return redirect()->back();
        }
        
    }
}