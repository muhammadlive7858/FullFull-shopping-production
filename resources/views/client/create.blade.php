@extends('admin.index')

@section('content')

    <h1>Mijoz Yaratish</h1>
    <form action="{{ route('client.store') }}" method="post" class="form-control d-flex flex-column " enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" class="input-control m-2 p-2" placeholder="Mijoz nomini kiriting:" required>
        <input type="number" name="phone" class="input-control m-2 p-2" placeholder="Mijoz telefonini kiriting:" required>
        <button class="btn btn-primary m-2">Yaratish</button>
    </form>
@endsection