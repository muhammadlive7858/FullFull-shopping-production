@extends('admin.index')

@section('content')


<div class="db" style="width: 20%">
<a href="{{route('prodelete')}}" class="div"  >
  <div class="card ">
  <i class="bi bi-folder fs-1 text-center"></i>
  <span class="text-center">Product Delete</span>
  </div>

</a>
</div>
<div class="db" style="width: 20%">
<a href="{{route('catedelete')}}" class="div"  >
  <div class="card ">
  <i class="bi bi-folder fs-1 text-center"></i>
  <span class="text-center">Category Delete</span>
  </div>

</a>
</div>

@endsection