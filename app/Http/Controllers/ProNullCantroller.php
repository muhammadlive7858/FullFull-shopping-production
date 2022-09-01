<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Qarz;
use App\Models\Asosiy_sotuvlar;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\client;
use App\Models\Category;
use App\Models\taminotchi;
use App\Models\vaqtinchaDollor;
use Auth;

class ProNullCantroller extends Controller
{
    public function index()
    {
        $productNullCount = Product::where('count', '<', 10)->get();

        return view('product.nullproduct', compact('productNullCount'));
    }

    public function dollorproduct(Request $request){
        $kurs = file_get_contents("https://cbu.uz/oz/arkhiv-kursov-valyut/json/");
        $kurs = json_decode($kurs,true);
        $dollor = floatval($kurs[0]["Rate"]);
        // $reqDollor = floatval($request->dollor);
        $som = floatval($request->dollor) * $dollor;
        if($som !== 0){
            vaqtinchaDollor::create([
                "dollor"=>floatval($request->dollor),
                "som"=>$som
            ]);
        }
        // dd($som);
        $taminot = taminotchi::all();
        $cate = Category::all();
        return view('product.create',compact('som','cate','taminot'));
    }

    public function coin()
    {
        $vaqt = date('Y-m-d');
        // dd($vaqt);
        $qarz = Qarz::all()->where('vaqt', $vaqt);
        return view('qarz.qarzday', compact('qarz'));
    }
    public function coinday()
    {
        $date = date('Y-m-d');
        // dd($vaqt);   
        // $savdo = Asosiy_sotuvlar::all()->where('created_at','like','%'.$vaqt.'%');
        $sotuv = DB::table('asosiy_sotuvlars')->select()
            ->where('created_at', 'like', '%' . $date . '%')->get();
        // dd($savdo);
    
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
    
    
            return view('sotuvlar.savdoday',compact('res','sotuv','jamiSumma','jamiNaxt','jamiPlastik','jamiFoyda','jamiQaytim'));
        
    }
    public function pdf(Request $request)
    {
        //    $req =  $request->price;
        $s = Asosiy_sotuvlar::orderBy('id', 'desc')->first();
        if($s->clint_id){

            $client = client::where('id', $s->client_id)->first();
            $client = $client['name'];
        }
        $req = $s->savdo;
        $date = date('Y-m-d');
            $names = json_decode($s->fullname);
            $i = 0;
            $res = [];
            foreach($names as $names){
                    
                foreach($names as$key => $value){
                    if($key === "name"){
                        $res[$i]['name'] = $value;
                    }
                    if($key === 'count'){
                        $res[$i]['count'] = $value;
                    }
                    if($key === 'price'){
                        $res[$i]['price'] = $value;
                    }
                }

                    $i++;
            }
            // dd($res); 
        $hodim = Auth::user()->name;
        $s->hodim = $hodim;

        // dd($s->hodim);
        $vaqt = date("Y-m-d");

        $pdf = Pdf::loadView('pdf',['name'=>$res] , ['s' => $s]);
        return $pdf->download('invoice-'.$vaqt.'.pdf');
    }

    public function tavarpdf($id)
    {
        $s = Asosiy_sotuvlar::where('id', $id)->first();
        $req = $s->savdo;
        $date = date('Y-m-d');
        $client = client::where('id', $s->client_id)->first();
        // $client = $client['name'];
        $names = json_decode($s->fullname);
            $i = 0;
            $res = [];
            foreach($names as $names){
                    
                foreach($names as$key => $value){
                    if($key === "name"){
                        $res[$i]['name'] = $value;
                    }
                    if($key === 'count'){
                        $res[$i]['count'] = $value;
                    }
                    if($key === 'price'){
                        $res[$i]['price'] = $value;
                    }
                }

                    $i++;
            }
            // dd($res); 
        $hodim = Auth::user()->name;
        $s->hodim = $hodim;

        $vaqt = date("Y-m-d");
        // dd($vaqt);
        $pdf = Pdf::loadView('pdf', ['s' => $s], ['name' => $res]);
        return $pdf->download('invoice-'.$vaqt.'.pdf');
    }
    public function dollor()
    {
   
    }
    public function qarzsearch(Request $request){
//dd($request->input());
        if(isset($request->search)){
        
            $qarz = Qarz::where('phone', 'LIKE', '%' . $request->search . '%')->get();
         //   dd($qarz);
            return view('qarz.index', compact('qarz'));
        }else{
             $request->search = "";
            $qarz = Qarz::where('phone', 'like', '%' . $request->search . '%')->get();
          //  dd($qarz);
            return view('qarz.index', compact('qarz'));
        }
    }
    public function plus(){
        return view('product.plus');
    }
    // public function searchs(Request $Request){
    //     $product = Product
    // }
    public function searchs(Request $request){
        $product = Product::where('name',"like",'%' . $request->prosearch . '%')->get();
        return view('product.plusedit', compact('product'));
    }
    public function editplus(Request $request,$id){
        $product = Product::find($id);
        $count =  $product->count;
        if($product){
            $store = $product->update([
                "count"=>$count + $request->count
                ]);
                if($store){
                    return redirect()->route('product.index');
                }else{
                    return  abort(200,"forbidden");
                }
        }
    }
}





















