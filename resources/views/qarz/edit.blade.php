@extends('admin.index')

@section('content')
<h1>Qarz tahrirlash sahifasi</h1>
<hr>
    <div method="post" action="{{ route('qarz.update',$qarz->id) }}" class="d-flex justify-content-between align-center">
        @csrf
        <div class="d-flex flex-column">
            <h3>Qarzdorning nomi:</h3>
            <h3>Qarzi:</h3>
        </div>
        <div class="d-flex flex-column">
            <input readonly value="{{ $qarz->name }}" name="name" type="text" class="form-control" placeholder="Nomi" class="my-2">
            <input readonly value="{{ $qarz->qarzi }}" name="qarzi" type="number" class="form-control" placeholder="Qarzini so'mda kiriting:" class="my-2" style="margin:5px 0">
        </div>
    </div>
    <hr>
    <form action="{{ route('qarz.update',$qarz->id) }}" method="post" class="d-flex justify-content-between align-center">
        @csrf
        @method('Patch')
        <h3>To'lav:</h3>
        <label for=""class="d-flex justify-content-between align-center"><input name="qarzi" type="number" class="form-control"><b class="mt-2">so'm</b></label>
        <button class="btn btn-primary">To'lash</button>
    </form>
<hr>
@endsection