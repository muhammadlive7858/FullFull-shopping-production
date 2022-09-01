

@extends('admin.index')

@section('content')
    <div class="d-flex justify-content-between my-2">
        <h2>Chiqim bo'limi</h2>
        <a href="{{ route('chiqim.create') }}" class="btn btn-outline-primary">Yaratish</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Malumoti</th>
                <th>Summa</th>
                <th>Vaqti</th>
                <th>Amallar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($chiqim as $hodim)
                <tr>
                    <td>{{ $hodim->id }}</td>
                    <td>{{ $hodim->desc }}</td>
                    <td>{{ $hodim->summa }}</td>
                    <td>{{ $hodim->created_at }}</td>
                    <td class="d-flex align-center justify-content-around">
                        <form action="{{ route('hodim.destroy',$hodim->id) }}" method="post" class="form-control">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
@endsection

