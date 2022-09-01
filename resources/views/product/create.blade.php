@extends('admin.index')

@section('content')
<h1>$ Dollor hisoblash</h1>
<hr>
<div class="d-flex">
    <form action="{{ route('dollorkurs') }}" method="post" class="w-50 d-flex ">
        @csrf
        <input type="text" name="dollor"  class="form-control m-2" placeholder="Tavarning $ dollor qiymati:">
        <button class="btn-primary m-2">
            Ko'rish
        </button>
    </form>
    
    <div class="d-flex justify-content-between align-center w-50 pt-3">
        <h4>Tavarning sum qiymati:</h4>
        <h4>
            <?php
                    if(isset($som)){
                        echo $som;
                    }
                    ?>
                </h4>
            </div>
        </div>
    <hr>
    <h1>Tavarni Yaratish</h1>
    <form action="{{ route('product.store') }}" method="post" class="form-control d-flex flex-column " enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" class="input-control m-2 p-2" placeholder="Tavar nomini kiriting:" required>
        <select name="category_id" id="" class="form-select m-2" style="width:99%" required>
            <option value="">Kategoriyani tanlang</option>
            @foreach($cate as $cate)
                <option value="{{$cate->id}}">{{ $cate->name }}</option>
            @endforeach
        </select>
        <select name="taminotchi" id="" class="form-select m-2" style="width:99%" required>
            <option >Taminotchini tanlang</option>
            @foreach($taminot as $taminot)
            <option value="{{$taminot->id}}">{{ $taminot->name }}</option>
            @endforeach
        </select>
        <input type="number" name="price" class="input-control m-2 p-2" placeholder="Tavar narxini kiriting:" required>
        <input type="number" name="shop_price" class="input-control m-2 p-2" placeholder="Tavarning sotilish narxini kiriting:" required>
            <label for="" class="d-flex justify-content-between m-2">
            
                <h4>Shaxsiy Qarz $ dollor orqali hisoblansinmi?</h4>
                <input type="checkbox" name="dollorHisob" id="" class="checkbox input-control mx-auto my-2 p-2">
                <h6 id="res" class="h6 d-flex">
                <div id="diger">
                <span id="sp" style="--d: 0s"   >$</span>
                <span id="sp" style="--d: 4s" ><i class="bi bi-check2-all"></i></span>
                <span id="sp" style="--d: 8s" ><i class="bi bi-check2-circle"></i></span>
                </div>
                </h6>
                
                <style>
                #res {
                    margin-right:50px;
                }
#diger {
    margin-right:50px;
}

#sp {
    color:#fff;
    position: absolute;
    padding:10px;
    background: red;
    padding-inline: 10px;
    opacity: 0;
    transform-origin: 10% 75%;
    animation: words 12s var(--d) linear infinite;


}
@keyframes words {
    5% {
        opacity: 1;
    }
    10% ,
    20% {
        opacity: 1;
        transform: rotate(3deg);
    }
    15% {
        transform: rotate(-1deg);

    }
    25% {
        opacity: 0;
        transform: rotate(90px) rotate(10deg);
    }
}
                </style>
                
                
                
                
                
                
                
                
                
                
            </label>
            <hr>
        <?php
        $time = time();
        echo '<input value="'.$time.'" type="hidden" name="producttime" class="input-control m-2 p-2" placeholder="Tavar uchun id raqam">' ;
        echo '<h4 class="m-2">Tavar ID raqami '.$time.'</h4>';
        ?>
        <input type="number" name="count" id="" class="input-control m-2 p-2" placeholder="Tavar miqdori:" required>
        <button class="btn btn-primary m-2">Yaratish</button>
    </form>
@endsection