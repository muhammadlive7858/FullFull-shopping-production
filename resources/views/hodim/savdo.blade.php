@extends('admin.index')

@section('content')
    <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width:10%">#</th>
                    <th style="width:30%"">Hodim</th>
                    <th style="width:50%"">Malumot</th>
                    <th style="width:10%"">Amallar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($savdo as $savdo)
                    <tr>
                        <td>{{ $savdo->id }}</td>
                        <td>{{ App\Models\Hodimlar::find($savdo->hodim_id)->name }}</td>
                        <td>{{ $savdo->desc }}</td>
                        <td class="d-flex align-center justify-content-around">
                            <form action="{{ route('hodimsavdo.delte',$savdo->id) }}" method="POST">
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