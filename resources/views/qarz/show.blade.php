@extends('admin.index')

@section('content')
<div class="d-flex justify-content-between align-center my-2">
    <h1 class="w-100">Qarz tarixi sahifasi</h1>
</div>
<table class="table table-bordered w-100">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th>To'lav</th>
                <th>Vaqti</th>
            </tr>
        </thead>
        <tbody>
@forelse($qarz as $qarz)
                <tr>
                    <td scope="row">{{ $qarz->qarz_id }}</th>
                    <td>{{ $qarz->tolav }}</td>
                    <td>{{ $qarz->created_at }}</td>
                </tr>
                @empty
                    <div class="d-flex justify-content-between align-center">
                        <h1>Hozircha qarzlar mavjud emas!</h1>
                    </div>
                @endforelse
            </tbody>
        </table>
@endsection