@extends('admin.index')

@section('content')

<div class="mt-2">
<a href="{{route('catedelete')}}" class="border shadow p-2 mt-3 text-black fw-bold">Categoryalar Tiklash</a>
<a href="{{route('tavarsoft')}}" class="border shadow p-2 mt-3 text-black fw-bold">Tavarlarni tiklash</a>

</div>
@endsection