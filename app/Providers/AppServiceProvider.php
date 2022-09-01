<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use App\Models\Qarz;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $proCount = Product::where('count' , '<' , 10)->count();
        $vaqt = date('Y-m-d');
        // dd($vaqt);
         $qarz = Qarz::where('vaqt',$vaqt)->count();
        // $qarz = "";
      $dollar = file_get_contents('https://cbu.uz/oz/arkhiv-kursov-valyut/json/');
      $json = json_decode($dollar, true);
      $rate = $json[0]['Rate'];


        View::share('proCount' , $proCount );
        View::share('QarzProvider' , $qarz );
         View::share('rate' , $rate );
    }
    
}
