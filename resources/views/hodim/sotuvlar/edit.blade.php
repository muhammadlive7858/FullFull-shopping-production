@extends('admin.index')

@section('content')
    <h1>Sotuvlarni tahrirlash sahifasi</h1>
    @foreach($sotuv as $sotuv)
    <form action="{{ route('hodimSotuvlar.update',$sotuv->id) }}" method="post" class="form-control d-flex align-center">
        @csrf
        @method('post')
        <div class="h1lar w-50 ">
            <h4 class="m-2 p-2">Tavar nomi</h4>
            <h4 class="m-2 p-2">Savdo</h4>
            <h4 class="m-2 p-2">Foyda</h4>
            <h4 class="m-2 p-2">Qaytimi</h4>
            <h4 class="m-2 p-2">Hodim</h4>
        </div>
        <div class="inputlar w-50 d-flex flex-column">
        <input value="{{ $sotuv->fullname }}" type="text" name="product_name" class="input-control m-2 p-2" placeholder="Tavar nomini kiriting:">
        <input type="text" value="{{ $sotuv->savdo }}" class="input-control m-2 p-2">
        <input value="{{ $sotuv->foyda }}" type="text" name="foyda" class="input-control m-2 p-2" placeholder="Foydani kiriting:">
        <input value="{{ $sotuv->skidka }}" type="text" name="skidka" class="input-control m-2 p-2" placeholder="Qaytim pulini kiriting:">
        <select name="hodim_id" id="" class="input-control m-2 p-2">
            @forelse($hodim as $hodim)
                <option value="{{ $hodim->id }}">{{ $hodim->name }}</option>
            @empty
                <option value="">Hodim mavjud emas!</option>
            @endforelse
        </select>    
    </div>

        <button class="btn btn-primary m-2">Yaratish</button>
    </form>
    @endforeach
@endsection