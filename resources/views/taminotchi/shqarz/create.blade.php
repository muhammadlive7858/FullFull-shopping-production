@extends('admin.index')

@section('content')
    <h1>To'lav sahifasi</h1>
    <form action="{{ route('shqarz-store',$id) }}" method="post" class="d-flex justify-content-between form-control">
        @csrf
        <input type="text" class="form-control" name="dollor" placeholder="To'lav Summasi:">
        <input type="hidden" name="summa" value="dollor">
        <button class="btn btn-primary">To'lash</button>
    </form>

@endsection