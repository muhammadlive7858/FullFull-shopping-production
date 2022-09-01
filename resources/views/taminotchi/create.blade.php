@extends('admin.index')

@section('content')
<h5 class="h5 mt-4">Taminotchi Qo'shish</h5>
<form action="{{route('taminot.store')}}" method="post" class="form-control mt-5">
    @csrf
    @method('POST')  
      <span>Ismi</span>
<input type="text" name="name" class="form-control">
<span>Firma</span>
<input type="text" name="firma" class="form-control">

<button class="btn btn-info mt-2">Qo'shish</button>
</form>

@endsection