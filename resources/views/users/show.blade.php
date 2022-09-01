@extends('admin.index')

@section('content')
    <h1>Foydalanuvchining ma'lumotlari</h1>
    <hr>
        <h3 scope="row" class="d-flex justify-content-between align-center"><b>Foydalanuvchi ID raqami:</b> {{ $user->id }}</h3>
        <h4 class="d-flex justify-content-between align-center"><b>Foydalanuvchi  ism:</b>{{ $user->name }}</h4>
        <h4 class="d-flex justify-content-between align-center"><b>Foydalanuvchi  email:</b>{{ $user->email }}</h4>
        <h5 class="d-flex justify-content-between align-center"><b>Foydalanuvchi  parol:</b>{{ $user->password }}</h5>
        <h4 class="d-flex justify-content-between align-center"><b>Foydalanuvchi  role:</b>{{ $user->role }}</h4>
@endsection