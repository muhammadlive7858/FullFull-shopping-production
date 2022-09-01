<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChiqimController;
use App\Http\Controllers\Dashbord;
// use App\Http\Controllers\EmailController;
use App\Http\Controllers\HodimlarController;
use App\Http\Controllers\OmborxonaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SotuvOfisi;
use App\Http\Controllers\sklad;
use App\Http\Controllers\Sotuvlar;
use App\Models\Sotuv_Royxati;
use App\Http\Controllers\QarzController;
use App\Http\Controllers\ShaxsiyQarzController;
use App\Http\Controllers\TaminotchiCantroller;
use App\Models\ShaxsiyQarz;
use App\Http\Controllers\Hodims;
use App\Http\Controllers\HodimlarCantroller;
use App\Http\Controllers\ClientController;
// use App\Models\Product;
// use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProNullCantroller;
use App\Http\Controllers\ClientCantroller;
use App\Http\Controllers\hodimshop;
use App\Http\Controllers\hodimSotuvlar;
use App\Http\Controllers\SotuvOfisi2Controller;
use App\Http\Controllers\SotuvOfisi3Controller;
use App\Http\Controllers\Hisobot;
use App\Http\Controllers\ShaxsiyQarzTaminotController;
use App\Models\shaxsiyQarzTaminot;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('index',function(){
    return view('admin.index');
})->name('admin.index');
// dashbord
Route::get('dashbord',[Dashbord::class,"index"])->name('dashbord');
// Kategoriya route
Route::resource('category',CategoryController::class)->names('category');
Route::resource('product',ProductController::class)->names('product');
Route::get('/plus', [ProNullCantroller::class , 'plus'])->name('product.createplus');
Route::post('/editplus/{id}',[ProNullCantroller::class,'editplus'])->name('editplus');
Route::post('/searchs',[ProNullCantroller::class,'searchs'])->name('searchs');



Route::post('/kurs',[ProNullCantroller::class,'dollorproduct'])->name('dollorkurs');
// Sotuv
Route::get('shopping',[SotuvOfisi::class,'index'])->name('shop-index');
Route::post('productsearch',[SotuvOfisi::class,'productsearch'])->name('productsearch');
Route::post('create_db',[SotuvOfisi::class,'create_vaqtincha'])->name('create_vaqtincha');
Route::get('hisoblash',[SotuvOfisi::class,'hisoblash'])->name('hisoblash');
Route::post('fullhisob',[SotuvOfisi::class,'fullHisob'])->name('fullhisob');
Route::post('edit/{id}',[SotuvOfisi::class,'edit'])->name('edit');
// avvalgi
Route::get('product-id',[SotuvOfisi::class,'productid'])->name('product-id');

Route::post('/deleteOne',[SotuvOfisi::class,'deleteOne'])->name('deleteOne');

Route::get('tozalash',[Sotuvofisi::class,'tozalash'])->name('tozalash');

// hodimshop

Route::get('hodimshopping',[hodimshop::class,'index'])->name('hodimshop-index')->middleware('role');
Route::post('hodimproductsearch',[hodimshop::class,'productsearch'])->name('hodimproductsearch')->middleware('role');
Route::post('hodimcreate_db',[hodimshop::class,'create_vaqtincha'])->name('hodimcreate_vaqtincha')->middleware('role');
Route::get('hodimhisoblash',[hodimshop::class,'hisoblash'])->name('hodimhisoblash')->middleware('role');
Route::post('hodimfullhisob',[hodimshop::class,'fullHisob'])->name('hodimfullhisob')->middleware('role');
Route::post('hodimedit/{id}',[hodimshop::class,'edit'])->name('hodimedit')->middleware('role');


// avvalgi
Route::get('hodimproduct-id',[hodimshop::class,'productid'])->name('hodimproduct-id')->middleware('role');
Route::get('hodimshow-cate',[hodimshop::class,'showcate'])->name('shop-show-cate')->middleware('role');
Route::post('hodimsotish',[hodimshop::class,'sotish'])->name('sotish')->middleware('role');
Route::get('hodimtozalash',[Sotuvofisi::class,'tozalash'])->name('hodimtozalash')->middleware('role');

// hodimshopend
// hodim savdo royxati
Route::resource('hodimSavdo',hodimSotuvlar::class)->names('hodimSotuvlar')->middleware('role');
// hodim savdo royxati




//kam prod
Route::get('/coinday',[App\Http\Controllers\ProNullCantroller::class , 'coinday'])->name('coinday')->middleware('role');
Route::get('/product/count/null' , [ App\Http\Controllers\ProNullCantroller::class , 'index'] )->name('procount');
Route::get('/coin',[App\Http\Controllers\ProNullCantroller::class , 'coin'])->name('coin');
// sklad
Route::get('omborxona',[sklad::class,'index'])->name('ombor')   ;
Route::post('search',[sklad::class,'show'])->name('search');
Route::post('search' , [OmborxonaController::class , 'index'])->name('searchombor');
// users
Route::resource('users',HodimlarCantroller::class)->names('users')->middleware('role');
// sotuv royxati
Route::get('sotuv-royxat',[Sotuvlar::class,'index'])->name('sotuvlar');
Route::get('sotuv-edit/{id}',[Sotuvlar::class,'edit'])->name('sotuvedit');
Route::post('update/{id}',[Sotuvlar::class,'update'])->name('sotuvupdate');
Route::delete('delete/{id}',[Sotuvlar::class,'destroy'])->name('sotuvdestroy');

//qarz sotuvlar
Route::get('debtshop/{id}',[Sotuvlar::class,'debt_shop'])->name('debt-shop');

// email
Route::resource('qarz',QarzController::class)->names('qarz');
// 
Route::resource('taminot',TaminotchiCantroller::class)->names('taminot');
// shaxsiy qarz
Route::resource('shaxsiyqarz',ShaxsiyQarzController::class)->names('shaxsiyqarz')->middleware('role');
// history
Route::get('/shqarz/{id}',[ShaxsiyQarzTaminotController::class,'create'])->name('shqarz-create');
Route::get('/shqarzSom/{id}',[ShaxsiyQarzTaminotController::class,'createSom'])->name('shqarz-createSom');

Route::post('/shqarz/{id}',[ShaxsiyQarzTaminotController::class,'store'])->name('shqarz-store');

Route::get('/histories/{id}',[ShaxsiyQarzTaminotController::class,'show'])->name('shqarz-show');
Route::get('/history/{id}',[ShaxsiyQarzTaminotController::class,'showSom'])->name('shqarz-showSom');

Route::get('/shqarz/delete/{id}',[ShaxsiyQarzTaminotController::class,'destroy'])->name('shqarz-delete');
Route::get('/productedit/{id}',[ShaxsiyQarzTaminotController::class,'productedit'])->name('productplus');
Route::patch('/productupdate/{id}',[ShaxsiyQarzTaminotController::class,'productupdate'])->name('productupdate');

// hodimlar
Route::get('hodim',[Hodims::class,'index'])->name('hodim.index')->middleware('role');
Route::get('hodimcreate',[Hodims::class,'create'])->name('hodim.create')->middleware('role');
Route::post('hodimstore',[Hodims::class,'store'])->name('hodim.store')->middleware('role');
Route::get('hodimedit/{id}',[Hodims::class,'edit'])->name('hodim.edit')->middleware('role');
Route::delete('hodimdelete/{id}',[Hodims::class,'destroy'])->name('hodim.destroy')->middleware('role');
Route::get('hodimshow',[Hodims::class,'show'])->name('hodim.show')->middleware('role');
Route::post('hodimsavdo',[Hodims::class,'savdo'])->name('hodim.savdo')->middleware('role');
Route::post('savdoDelete',[Hodims::class,'savdoDelete'])->name('hodimsavdo.delte')->middleware('role');

// hodim savdo
// Route::POST('/savdodelete',[Hodims::class,'savdodelete'])->name('hodimsavdo.delete');
Route::get('showsavdo',[Hodims::class,'showsavdo'])->name('show.savdo');
Route::get('/pdf', [App\Http\Controllers\ProNullCantroller::class , 'pdf'])->name('pdf');
Route::get('/pdf_tavar/{id}', [App\Http\Controllers\ProNullCantroller::class , 'tavarpdf'])->name('tavar_pdf');
Route::get('/dollor', [App\Http\Controllers\ProNullCantroller::class , 'dollor'])->name('dollor');
Route::post('/qarzsearch', [App\Http\Controllers\ProNullCantroller::class , 'qarzsearch'])->name('qarzsearch');

Route::resource('client',ClientController::class)->names('client');



// soft del
Route::get('/delete' ,[App\Http\Controllers\SoftdelCantroller::class , 'index'])->name('delete');
Route::get('/prodelete' ,[App\Http\Controllers\SoftdelCantroller::class , 'hodimdel'])->name('hodimdel');
Route::get('/hodimdel' ,[App\Http\Controllers\SoftdelCantroller::class , 'produc'])->name('prodelete');

Route::get('/tam' ,[App\Http\Controllers\SoftdelCantroller::class , 'tam'])->name('tam');
Route::get('/tamrestore{id}' ,[App\Http\Controllers\SoftdelCantroller::class , 'tamrestore'])->name('tam.restore');


Route::get('/restore{id}' ,[App\Http\Controllers\SoftdelCantroller::class , 'restore'])->name('restore');
Route::get('/catedelete' ,[App\Http\Controllers\SoftdelCantroller::class , 'category'])->name('catedelete');
Route::get('/carsrestore/{id}' ,[App\Http\Controllers\SoftdelCantroller::class , 'catsrestore'])->name('catsrestore');
Route::delete('/del{id}' ,[App\Http\Controllers\SoftdelCantroller::class , 'deletepro'])->name('del');


Route::resource('chiqim',ChiqimController::class)->names('chiqim');


//sotuv 2 vaqtincha 
Route::get('shoppingtwo',[SotuvOfisi2Controller::class,'index'])->name('shop-indextu');
Route::post('productsearchtwo',[SotuvOfisi2Controller::class,'productsearch'])->name('productsearchtu');
Route::post('create_dbtwo',[SotuvOfisi2Controller::class,'create_vaqtincha'])->name('create_vaqtinchatu');
Route::get('hisoblashtwo',[SotuvOfisi2Controller::class,'hisoblash'])->name('hisoblashtu');
Route::post('fullhisobtwo',[SotuvOfisi2Controller::class,'fullHisob'])->name('fullhisobtu');
Route::post('edittwo/{id}',[SotuvOfisi2Controller::class,'edit'])->name('edittu');
Route::get('product-idtwo',[SotuvOfisi2Controller::class,'productid'])->name('product-idtu');
Route::get('tozalashtwo',[SotuvOfisi2Controller::class,'tozalash'])->name('tozalashtu');
// Sotuv ofisi 3  router

Route::get('shoppingthree',[SotuvOfisi3Controller::class,'index'])->name('shop-indexthree');
Route::post('productsearchthree',[SotuvOfisi3Controller::class,'productsearch'])->name('productsearchthree');
Route::post('create_dbthree',[SotuvOfisi3Controller::class,'create_vaqtincha'])->name('create_vaqtinchathree');
Route::get('hisoblashthree',[SotuvOfisi3Controller::class,'hisoblash'])->name('hisoblashthree');
Route::post('fullhisobthree',[SotuvOfisi3Controller::class,'fullHisob'])->name('fullhisobthree');
Route::post('editthree/{id}',[SotuvOfisi3Controller::class,'edit'])->name('editthree');
Route::get('product-idthree',[SotuvOfisi3Controller::class,'productid'])->name('product-idthree');
Route::get('tozalashthree',[SotuvOfisi3Controller::class,'tozalash'])->name('tozalashthree');

// hisob

Route::get('/hisob',[Hisobot::class,'index'])->name('hisob');

Route::get('/prosearch' , [Hisobot::class , 'prosearch'])->name('prosearch');
Route::get('/yillik' , [Hisobot::class , 'yillik'])->name('yillik');
    