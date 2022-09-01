@extends('admin.index')

@section('content')
<h1>Qarz yaratish sahifasi</h1>
<hr>
    <form method="post" action="{{ route('qarz.store') }}" class="d-flex justify-content-between align-center">
        @csrf
        <div class="d-flex flex-column">
            <h3>Qarzdorning nomi:</h3>
            <h3>Qarzi:</h3>
            <h3>Malumoti:</h3>
            <h3>Telefon:</h3>
            <h3>To'lash vaqt:</h3>
        </div>
        <div class="d-flex flex-column">
            <input name="name" type="text" class="form-control" placeholder="Nomi" class="my-2">
            <input name="qarzi" type="number" class="form-control" placeholder="Qarzini so'mda kiriting:" class="my-2" style="margin:5px 0">
            <textarea name="desc" id="" cols="30" rows="5" class=" form-control"></textarea>
            <input class="form-control my-1" type="number" name="phone" id="" placeholder="Telefon raqami:">
            <input class="form-control my-1" type="date" name="vaqt" id="">
            <button class="btn btn-success m-2">Saqlash</button>
        </div>
    </form>
    <hr>
@endsection