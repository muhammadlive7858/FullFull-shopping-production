@extends('admin.index')

@section('content')
<div class="row d-flex align-center justify-content-between">
            <form class="col-6 form-control" action="{{ route('hodim.savdo') }}" method="POST">
                @csrf
                <h4>Savdo yaratish</h4>
                <select name="hodim_id" id="" class="form-control" required>
                    @forelse($hodim as $hodim)
                    <option value="">Hodim tanlash</option>
                        <option value="{{ $hodim->id }}">{{ $hodim->name }}</option>
                        @empty
                    @endforelse
                    </select>
                    <textarea  required name="desc" id="" cols="30" rows="10" class="form-control my-2" placeholder="Eslatmalar kiriting:"></textarea>
                    <button class="btn btn-primary">Saqlash</button>
                        <a href="{{ route('show.savdo',0) }}" class="btn btn-primary">Savdolar ro'yxati</a>
            </form>
    </div>
    <hr>

@endsection