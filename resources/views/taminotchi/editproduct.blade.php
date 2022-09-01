@extends('admin.index')

@section('content')

    <h1>Tavarga kirim qilish</h1>
    <form action="{{ route('productupdate',$prod->id) }}" method="post" class="form-control d-flex flex-column " enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <h4 class="text-primary">- Iltimos bu joyga tavarga yangidan qancha kiritilayotganini yozing!</h4>
        <input  type="number" name="count" id="" class="input-control m-2 p-2" placeholder="Yangi Tavar miqdori:" required>
        <button class="btn btn-primary m-2">Yaratish</button>
    </form>

@endsection