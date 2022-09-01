@extends('admin.index')

@section('content')

    <h1>Mijoz tahrirlash</h1>
    @forelse($client as $client)
    <form action="{{ route('client.update',$client->id) }}" method="post" class="form-control d-flex flex-column " enctype="multipart/form-data">
        @csrf
        @method('patch')
        <input value="{{ $client->name }}" type="text" name="name" class="input-control m-2 p-2" placeholder="Mijoz nomini kiriting:" required>
        <input value="{{ $client->phone }}" type="number" name="phone" class="input-control m-2 p-2" placeholder="Mijoz telefonini kiriting:" required>
        <button class="btn btn-primary m-2">Yaratish</button>
    </form>
    @empty
        <h1>Mijoz mavjud emas!</h1>
    @endforelse
    @endsection
