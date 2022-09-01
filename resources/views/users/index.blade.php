@extends('admin.index')

@section('content')
    <h1>Foydalanuvchilar ro'yxati sahifasi</h1>
    <table class="table table-bordered w-100">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nomi</th>
                    <th>Email</th>
                    <th scope="col">Password</th>
                    <th>Role</th>
                    <th scope="col" style="width:10% !important">Amallar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $user)
                <tr>
                    <td scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->role }}</td>
                    <td  class="d-flex align-center justify-content-around">
                        <a href="{{ route('users.edit',$user->id) }}" class="mt-2"><i class="bi bi-pencil btn-success w-100 p-2" style='border-radius:5px'></i></a>
                        <form action="{{ route('users.destroy',$user->id) }}" method="post" class="d-flex align-center ">
                            @csrf
                            @method('delete')
                        <button onclick="delet()" class="btn-danger w-100 p-1 "style='border-radius:5px' ><i class="bi bi-trash-fill " ></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            function delet(){
                confirm("Haqiqatdan ham o'chirmoqchimiz?")
            }
        </script>
@endsection