@extends('admin.index')

@section('content')
    <h1>Sotuvlarni tahrirlash sahifasi</h1>
    @foreach($sotuv as $sotuv)
    <form action="{{ route('sotuvupdate',$sotuv->id) }}" method="post" class="form-control d-flex align-center">
        @csrf
        @method('post')
        <div class="h1lar w-50 ">
            <h4 class="m-2 p-2">Tavar nomi</h4>
            <h4 class="m-2 p-2">Savdo Summa</h4>
            <h4 class="m-2 p-2">Foyda</h4>
            <h4 class="m-2 p-2">Naxt</h4>
            <h4 class="m-2 p-2">Plastik</h4>
            <h4 class="m-2 p-2">Qaytimi</h4>
        </div>
        <div class="inputlar w-50 d-flex flex-column">
        <input value="{{ $sotuv->fullname }}" type="text" name="fullname" class="input-control m-2 p-2" placeholder="Tavar nomini kiriting:">
        <input value="{{ $sotuv->savdo }}" type="text" name="savdo" class="input-control m-2 p-2" placeholder="Soni kiriting:">
        <input value="{{ $sotuv->foyda }}" type="text" name="foyda" class="input-control m-2 p-2" placeholder="Foydani kiriting:">
        <input value="{{ $sotuv->naxt }}" type="text" name="naxt" class="input-control m-2 p-2" placeholder="Foydani kiriting:">
        <input value="{{ $sotuv->plastik }}" type="text" name="plastik" class="input-control m-2 p-2" placeholder="Foydani kiriting:">
        
        <input value="{{ $sotuv->skidka }}" type="text" name="skidka" class="input-control m-2 p-2" placeholder="Qaytim pulini kiriting:">
        </div>

        <button class="btn btn-primary m-2">Yaratish</button>
    </form>
    @endforeach
@endsection