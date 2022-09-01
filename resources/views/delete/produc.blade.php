@extends('admin.index')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nomi</th>
      <th scope="col">baxosi</th>
      <th scope="col">Kelish baxosi</th>
      <th>Amalllar</th>
    </tr>
  </thead>
  <tbody>
    @forelse($pro as $pro)
    <tr>

      <td>{{$pro->id}}</td>
      <td>{{$pro->name}}</td>
      <td>{{$pro->shop_price}}</td>
      <td>{{$pro->price}}</td>
      <td class="d-flex form-control">
        <a href="{{route('restore', $pro->id)}}" class="btn btn-primary mx-1 w-50"><i class="bi bi-arrow-clockwise"></i></a>
        <!-- <form action="{{ route('del',$pro->id )}}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
        </form> -->
      </td>

    </tr>
    @empty
    <tr>
      <td>O'chirilganlar yoq</td>
    </tr>
    @endforelse
  </tbody>
</table>

@endsection