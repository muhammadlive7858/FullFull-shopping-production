@extends('admin.index')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">nomi</th>
            <th scope="col">Baxosi</th>
            <th scope="col">Sotilish Baxosi</th>
            <th scope="col">Mavjud</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pro as $proo)
        <tr>
            
            <td>{{$proo->id}}</td>
            <td>{{$proo->name}}</td>
            <td>{{$proo->price}}</td>
            <td>{{$proo->shop_price}}</td>
            <td>{{$proo->count}}</td>


        </tr>
        @empty
        <tr>
            <th class="bg-danger text-white">Bu Categoryada tavarlar mavjud emas Tavar qoshish bolimiga o'ting va tavar qo'shing</th>
        </tr>
        @endforelse
    </tbody>
</table>
<style>
    table,thead,tbody,tr,th,td{
        border-collapse: collapse;
        border: 1px solid #aaa;
    }
    tr:hover{
        background-color: #111;
        color: #fff;
    }
</style>
@endsection
<!-- 1648534549 -->