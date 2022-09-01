@extends('admin.index')

@section('content')
    <h5 class="h5 mt-4">Taminotchi tahrirlash</h5>
    <form action="{{route('taminot.update', $taminot->id)}}" method="post" class="form-control mt-5">
        @csrf
        @method('patch')  
        <span>Ismi</span>
    <input type="text" value="{{$taminot->name}}" name="name" class="form-control">
    <span>Firma</span>
    <input type="text" value="{{$taminot->firma}}" name="firma" class="form-control">

    <button class="btn btn-info mt-2">Qo'shish</button>
    </form>
@endsection