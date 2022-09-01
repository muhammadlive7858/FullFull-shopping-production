@extends('admin.index')

@section('content')
<div class="d-flex justify-content-between align-center my-2">
    <h1 class="w-100">Bugungi qarz to'lavlari</h1>
</div>
<table class="table table-bordered w-100">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th>Nomi</th>
                <th>Telefon</th>
                <th>Summa</th>
                <th>Vaqti</th>
            </tr>
        </thead>
        <tbody>
@forelse($qarz as $qarz)
                <tr>
                    <td scope="row">{{ $qarz->id }}</th>
                    <td>{{ $qarz->name }}</td>
                    <td>{{ $qarz->phone }} </td>
                    <td>{{ $qarz->qarzi }}</td>
                    <td>{{ $qarz->vaqt }}</td>
                </tr>
                @empty
                    <div class="d-flex justify-content-between align-center">
                        <h1>Bugungi qarzlar mavjud emas qarzlar!</h1>
                    </div>
                @endforelse
            </tbody>
        </table>
@endsection