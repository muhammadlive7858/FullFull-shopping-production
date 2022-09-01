@extends('admin.index')

@section('content')
    <div class="d-flex justify-content-between my-2">
        <h2>Hodimlar bo'limi</h2>
        <a href="{{ route('hodim.create') }}" class="btn btn-outline-primary">Yaratish</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nomi</th>
                <th>Telefon raqami</th>
                <th>Oylik maoshi</th>
                <th>Qoldiq maoshi</th>
                <th>Malumoti</th>
                <th>Amallar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($hodim as $hodim)
                <tr>
                    <td>{{ $hodim->id }}</td>
                    <td>{{ $hodim->name }}</td>
                    <td>{{ $hodim->phone }}</td>
                    <td>{{ $hodim->summa }}</td>
                    <td>{{ $hodim->qoldiq }}</td>
                    <td>{{ $hodim->desc }}</td>
                    <td class="d-flex align-center justify-content-around">
                        <a href="{{ route('hodim.edit',$hodim->id) }}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('hodim.destroy',$hodim->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
@endsection