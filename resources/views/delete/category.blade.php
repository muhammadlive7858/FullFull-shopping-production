@extends('admin.index')


@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nomi</th>
            <th>Malumoti</th>
            <th>Amalllar</th>
        </tr>
    </thead>
    <tbody>
        @forelse($cats as $pro)
        <tr>

            <td>{{$pro->id}}</td>
            <td>{{$pro->name}}</td>
            <td>{{$pro->desc}}</td>
      <td>
          <a href="{{route('catsrestore', $pro->id)}}" class="btn btn-primary">Tiklash</a>
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