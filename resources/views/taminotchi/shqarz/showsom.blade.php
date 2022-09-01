@extends('admin.index')

@section('content')
<div class="d-flex justify-content-between align-center my-2">
    <h1 class="w-100">Shaxsiy qarz tarixi sahifasi</h1>
</div>
<table class="table table-bordered w-100">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th>To'lav</th>
                <th>Vaqti</th>
                <th>Amallar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
            ?>
                @forelse($show as $qarz)
                <tr>
                    <td scope="row">{{$i}}</th>
                    <td class="bg-primary text-white">{{ $qarz->som }}</td>
                    <td>{{ $qarz->created_at }}</td>
                    <td>
                        <a href="{{ route('shqarz-delete',$qarz->id) }}" class="btn btn-primary">O'chirish</a>
                    </td>
                </tr>
                <?php
                $i = $i + 1;
                ?>
                @empty
                    <div class="d-flex justify-content-between align-center">
                        <h1>Hozircha qarzlar mavjud emas!</h1>
                    </div>
                @endforelse
            </tbody>
        </table>
@endsection