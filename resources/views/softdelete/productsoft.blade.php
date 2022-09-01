@extends('admin.index')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Nomi</th>
            <th scope="col">C Nomi</th>
            <th scope="col">Malumoti</th>
            <th scope="col">Image</th>
            <th scope="col">Taminotchi</th>
            <th scope="col">Baxosi</th>
            <th scope="col">Sotish..baxosi</th>
            <th scope="col">Id raqami</th>
            <th scope="col">Mavjud </th>
            <th scope="col">Tiklash</th>
        </tr>
    </thead>
    <tbody>
        @forelse($produc as $cats)
        <tr>
            <th scope="row">{{$cats->id}}</th>
            <td>{{$cats->name}}</td>
            <td>{{$cats->category_id}}</td>
            <td>{{$cats->desc}}</td>
            <td><img src="{{$cats->image}}" style="width: 10%;" alt=""></td>
            <td>{{$cats->taminotchi}}</td>
            <td>{{$cats->price}}</td>
            <td>{{$cats->shop_price}}</td>
            <td>{{$cats->producttime}}</td>
            <td>{{$cats->count}}</td>      
            <td><a href="{{route('prorestor' , $cats->id)}}" class="btn btn-success">Tiklash</a>
            </td>
        </tr>
        @empty
        <tr>
            <th class="text-center">O'chirilgan Categorylar yoq</th>
        </tr>
        @endforelse

    </tbody>
</table>
<style>
                table {
                    border-collapse: collapse;
                }

                td {
                    font-weight: 600;
                    border: 1px solid black;
                }
            </style>
@endsection
