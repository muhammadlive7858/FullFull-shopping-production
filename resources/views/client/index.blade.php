@extends('admin.index')

@section('content')

<h1 class="w-100 d-flex align-center justify-content-between">Hamma Mijozlar sahifasi <a href="{{ route('client.create') }}" class="btn btn-primary">Yaratish</a></h1>
    <table class="table table-bordered w-100 table-responsive">
            <thead>
                <tr class="">
                    <th  class="seconds" scope="col">#</th>
                    <th scope="col">Nomi</th>
                    <th scope="col">Telefon</th>

                    <th scope="col" style="width:20% !important">Amallar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($client as $client)
                <tr>
                    <td  class="seconds" scope="row">{{ $client->id }}</th>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->phone }}</td>

                    <td  class="d-flex align-center justify-content-around">
                        <a href="{{route('client.show' , $client->id)}}" class="btn btn-primary"><i class="bi bi-bag-fill"></i></a>
                        <a href="{{ route('client.edit',$client->id) }}" class="mt-2 p-0"><i class="bi bi-pencil btn-success w-100 p-2" style='border-radius:5px'></i></a>
                        <form action="{{ route('client.destroy',$client->id) }}" method="post" class="d-flex align-center ">
                            @csrf
                            @method('delete')
                        <button class="btn-danger w-100 p-1 "style='border-radius:5px' onclick="delet()"><i class="bi bi-trash-fill " ></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <h3>Client mavjud emas!</h3>
                @endforelse
            </tbody>
        </table>
        <script>
            function delet(){
                confirm('Haqiqatdan ham ochirmoqchimisiz?')
            }
        </script>

@endsection