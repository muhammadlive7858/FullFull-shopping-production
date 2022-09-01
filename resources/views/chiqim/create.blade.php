@extends('admin.index')

@section('content')
    <form action="{{ route('chiqim.store') }}" class="row form-control d-flex" method="POST">
        @csrf
        @method('POST')
        <div class="col-6">
            <h2>Malumoti</h2>
            <h2>Summa</h2>
        </div>
        <div class="col-6">
            <input  required name="desc"  placeholder="Malumoti" type="text" class="form-control my-2">
            <input  required name="summa"  placeholder="Summa" type="text" class="form-control my-2">
            <button type="submit" class="btn btn-primary w-100" >Saqlash</button>
        </div>

    </form>
@endsection