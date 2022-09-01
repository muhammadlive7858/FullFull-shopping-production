@extends('admin.index')

@section('content')
    
    <form action="{{ route('searchombor') }}" method="POST" class="form-control w-100" >
        @csrf
        @method('POST')
        <select name="category_id" id="" class="form-select m-2" style="width:99%">
            <option value="">Kategoriyani tanlang</option>
            @foreach($cate as $cate)
                <option value="{{$cate->id}}">{{ $cate->name }}</option>
            @endforeach
        </select>
        <button class="btn btn-success mx-2" >Tanlang</button>
    </form> 
    

@endsection




