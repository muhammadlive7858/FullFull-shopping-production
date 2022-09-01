@extends('admin.index')

@section('content')
<h1>Qarz yaratish sahifasi</h1>
<hr>
    <form method="post" action="{{ route('shaxsiyqarz.store') }}" class="d-flex justify-content-between align-center">
        @csrf
        <div class="d-flex flex-column">
            <h3>Taminotchi:</h3>
            <h3>Qarzi:</h3>
            <h3>Malumoti:</h3>
        </div>
        <div class="d-flex flex-column">
            <select name="taminotchi_id" id="" class="form-control">
                <option value="" class="form-control" >Taminotchini tanlash</option>
                @forelse($taminotchi as $taminot)
                    <option class="form-control"  value="{{ $taminot->id }}">{{ $taminot->name }}</option>
                @empty
                    <h5>Taminotchilar mavjud emas!</h5>
                @endforelse
            </select>
            <input name="summa" type="number" class="form-control" placeholder="Qarzini so'mda kiriting:" class="my-2" style="margin:5px 0">
            <textarea name="desc" id="" cols="30" rows="10" class="m-2"></textarea>
            <button class="btn btn-success m-2">Saqlash</button>
        </div>
    </form>
    <hr>
@endsection