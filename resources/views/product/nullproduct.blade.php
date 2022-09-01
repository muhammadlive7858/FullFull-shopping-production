@extends('admin.index')

@section('content')
 @forelse($productNullCount as $pro)
    <div class="shadow p-3 mb-5 bg-light rounded d-flex flex-column px-5">
        <span class="text-danger">Bu Tavar juda kam qoldi:</span>
        <div   class="w-100 d-flex align-center justify-content-between">
            <h3 class="text-success fw-bold">Kam tavar nomi:</h5>       <h3  class="text-danger fw-bold">{{$pro->name}}</h2>
        </div>
        <div   class=" d-flex align-center justify-content-between">
            <h3 class="text-success fw-bold">Soni:</h3>      <h3 class="text-danger fw-bold">{{ $pro->count }}</h3>
        </div>
        <div   class=" d-flex align-center justify-content-between">
            <h3 class="text-success fw-bold">Baxosi:</h3>      <h3 class="text-danger fw-bold">{{ $pro->shop_price }}</h3>
        </div>
    </div>
@empty 
    <h1>
        Kam Tavarlar yoq
    </h1>
@endforelse
<style>
    
</style>
@endsection