@extends('admin.index')

@section('content')

<h1 class="w-100 d-flex align-center justify-content-between">Xaridlar </h1>
<table class="table table-bordered w-100 table-responsive">
    <thead>
        <tr class="">
            <th class="seconds" scope="col">#</th>
            <th scope="col">Nomi</th>
            <th scope="col">Savdo</th>
            <th>Naxt</th>
            <th>Plastik</th>
            <th scope="col">Harid Vaqti</th>
        </tr>
    </thead>
    <tbody>
        @forelse($clent as $client)
        <tr>
            <td class="seconds" scope="row">{{ $client->id }}</th>
            <td>{{ $client->fullname }}</td>
            <td>{{ $client->savdo }} so'm</td>
            <td>{{ $client->naxt }}</td>
            <td>{{ $client->plastik }} so'm</td>
            <td> {{ $client->created_at }}</td>
        </tr>
        @empty
        <h3>Client mavjud emas!</h3>
        @endforelse
    </tbody>
</table>
<script>
    function delet() {
        confirm('Haqiqatdan ham ochirmoqchimisiz?')
    }
</script>

@endsection