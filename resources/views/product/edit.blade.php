@extends('admin.index')

@section('content')

    <h1>Tavarni tahrirlash</h1>
    <form action="{{ route('product.update',$product->id) }}" method="post" class="form-control d-flex flex-column " enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <input value="{{ $product->name }}" type="text" name="name" class="input-control m-2 p-2" placeholder="Tavar nomini kiriting:" required>
        <select name="category_id" id="" class="form-select m-2" style="width:99%" required>
            <option value="">Kategoriyani tanlang</option>
            @foreach($cate as $cate)
                <option value="{{$cate->id}}">{{ $cate->name }}</option>
            @endforeach
        </select>
        <select name="taminotchi" id="" class="form-select m-2" style="width:99%" required>
            <option value="">Taminotchini tanlang</option>
            @foreach($taminot as $taminotchi)
                <option value="{{$taminotchi->id}}">{{ $taminotchi->name }}</option>
            @endforeach
        </select>
        <label class="d-flex justify-content-between m-2 p-2">
            <h4 class="w-50">Tavarning $ dollor narxi:</h4>
            <input value="{{ $product->dollor }}" type="number" dollor="price" class="input-control  w-50" placeholder="Tavar $ dollor narxini kiriting:" required>
        </label>
        <label class="d-flex justify-content-between m-2 p-2">
            <h4 class="w-50">Tavarning asl narxi:</h4>
            <input value="{{ $product->price }}" type="number" name="price" class="input-control  w-50" placeholder="Tavar narxini kiriting:" required>
        </label>
        <label class="d-flex justify-content-between m-2 p-2">
            <h4 class="w-50">Tavarning sotilish narxi:</h4>
            <input value="{{ $product->shop_price }}" type="number" name="shop_price" class="input-control  w-50" placeholder="Tavarning sotilish narxini kiriting:" required>
        </label>
        
        <?php
        $time = time();
        echo '<input  value='.$time.' type="hidden" name="producttime" class="input-control m-2 p-2" placeholder="Tavar uchun id raqam">' ;
        echo '<h4 class="m-2 p-2">Tavar ID raqami '.$time.'</h4>';
        ?>
        <label class="d-flex justify-content-between m-2 p-2">
            <h4 class="w-50">Tavarning soni:</h4>
            <input value="{{ $product->count }}" type="number" name="count" id="" class="input-control  w-50" placeholder="Tavar miqdori:" required>
        </label>
        <button class="btn btn-primary m-2">Yaratish</button>
    </form>
@endsection