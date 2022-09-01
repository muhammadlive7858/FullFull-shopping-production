@extends('admin.index')

@section('content')

        <h1>Kategoriyani tahrirlash sahifasi</h1>
        <form action="{{ route('category.update',$cate->id) }}" method="POST" class="form-control d-flex flex-column ">
            @csrf
            @method('PATCH')
            <input type="text" name="name" class="input-control m-2 p-2" placeholder="Kategoriya nomini kiriting:" value="{{ $cate->name }}">
            <textarea name="desc" id="" cols="30" rows="10" class="imput-control m-2 p-2">{{ $cate->desc }}</textarea>
            <button class="btn btn-primary m-2">Yaratish</button>
        </form>
@endsection
