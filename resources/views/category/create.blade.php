@extends('admin.index')

@section('content')

    <h1>Kategoriyalar yaratish sahifasi</h1>
    <form action="{{ route('category.store') }}" method="post" class="form-control d-flex flex-column ">
        @csrf
        <input type="text" name="name" class="input-control m-2 p-2" placeholder="Kategoriya nomini kiriting:">
        <textarea name="desc" id="" cols="30" rows="10" class="imput-control m-2 p-2">Kategoriya uchun ma'lumot</textarea>
        <button class="btn btn-primary m-2">Yaratish</button>
    </form>

@endsection