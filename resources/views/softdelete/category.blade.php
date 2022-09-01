@extends('admin.index')

@section('content')
<div class="card-header">
        @if(Session::has('tiklash'))
        <div class="alert alert-success">
            {{Session::get('tiklash')}}
        </div>

        @endif
    </div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Category Nomi</th>
      <th scope="col">Malumoti</th>
      <th scope="col">Tiklash</th>
    </tr>
  </thead>
  <tbody>
      @forelse($category as $cats)
    <tr>
      <th scope="row">{{$cats->id}}</th>
      <td>{{$cats->name}}</td>
      <td>{{$cats->desc}}</td>
      <td><a href="{{route('restore',$cats->id)}}" class="btn btn-success">Tiklash</a></td>
    </tr>
    @empty
    <tr>
        <th class="text-center">O'chirilgan Categorylar yoq</th>
    </tr>
    @endforelse

  </tbody>
</table>


@endsection