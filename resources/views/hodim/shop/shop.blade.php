@extends('admin.index')

@section('content')


<!-- End Search Bar -->

<h2>Hodimlar Sotuv Ofisi</h2>
<hr>

<style>
   
</style>

<div class="row g-3 d-flex justify-content-between align-center form-control m-1 wrap " >
    @csrf
    <!-- Nom qidiruv -->
    <div class="col-md-5 d-flex aling-center justify-content-between row">
    <form action="{{ route('hodimproductsearch') }}" method="post"     class="w-100 d-flex align-center justify-content-between  ">
     @csrf
        <div class="col-auto" style="width:80%">
            <label for="inputPassword21" class="visually-hidden">Tavar</label>
            <input type="text" value="" name="productsearch"  class="form-control" id="inputPassword21" placeholder="Tavar nomini kiriting:">
        </div>
        <div class="col-auto">
            <button id="submit" class="btn btn-primary mb-2"><i class="bi bi-search"></i></button>
        </div>
    </form>
    <form action="" method="" class="d-flex justify-content-between w-100 col-6">
        <select name="productid" id="" class="w-100 form-select" style="width:80%;margin-right:5px">
            <option selected  disabled>Tavar tanlang</option>
                @if(isset($productname))
                        @forelse($productname as $product_id)
                        <option value="{{ $product_id->producttime }}">{{ $product_id->name }}</option>
                        @empty
                        <option value="">Tavar mavjud emas</option>
                        @endforelse
                @endif
        </select>
        <button class="btn btn-outline-primary" ><i class="bi bi-plus-circle"></i></button>
    </form>
    </div>
    <!-- ID qidiruv -->
    <form action="{{ route('hodimproduct-id') }}" class=" div col-md-5 d-flex aling-center justify-content-between">
    <div class="col-auto" style="width:80%">
        <label for="inputPassword2" class="visually-hidden">Tavar</label>
        <input type="text" name="productid"  class="form-control" id="inputPassword2" placeholder="ID kiriting:">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-2"><i class="bi bi-search"></i></button>
    </div>
    </form>
   
</div>

<hr>




 
@endsection