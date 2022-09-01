@extends('admin.index')

@section('content')
        <form action="{{ route('hodim.store') }}" class="row form-control d-flex" method="POST">
            @csrf
            @method('POST')
            <div class="col-6">
                <h2>Nomi</h2>
                <h2>Tel raqami</h2>
                <h2>Oylik</h2>
                <h2>Malumoti</h2>
            </div>
            <div class="col-6">
                <input value="{{ $hodim->name }}"  required name="name"  placeholder="Nomi" type="text" class="form-control my-2">
                <input value="{{ $hodim->phone }}"  required name="phone"  placeholder="Telefon" type="text" class="form-control my-2">
                <input value="{{ $hodim->summa }}"  required name="summa"  placeholder="Oylik summasi" type="text" class="form-control my-2">
                <input value="{{ $hodim->desc }}"  type="text" name="desc" class="form-control my-2" placeholder="Malumoti">
                <button type="submit" class="btn btn-primary w-100" >Saqlash</button>
            </div>

        </form>
@endsection