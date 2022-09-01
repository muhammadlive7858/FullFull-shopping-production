@extends('admin.index')

@section('content')
<h1 class="w-100">Hamma Sotuvlar sahifasi</h1>
<hr>
    <h4><b>Tavarlar jami hisobi:</b></h4>
    <table class="table table-bordered w-100">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jami sotuv summasi</th>
                    <th>Jami foyda</th>
                    <th>Jami qaytim puli</th>
                    <th>Jami naxt savdo</th>
                    <th>Jami Plastik savdo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Jami</th>
                    <th>{{$jamiSumma}}</th>
                    <th>{{$jamiFoyda}}</th>
                    <th>{{$jamiQaytim}}</th>
                    <th>{{$jamiNaxt}}</th>
                    <th>{{$jamiPlastik}}</th>
                </tr>
            </tbody>
        </table>
<hr>
    <h4><b>Tavarlarning ro'yxati</b></h4>
    <table class="table table-bordered w-100">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tavar va soni </th>
                    <th>Savdo summasi</th>
                    <th>Foyda</th>
                    <th>Qaytim puli</th>
                    <th>Naxt</th>
                    <th>Plastik</th>
                    <th>Vaqti</th>
                    <th scope="col" style="width:15% !important">Amallar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sotuv as $prod)
                <tr>
                    <td scope="row">{{ $prod->id }}</td>
                    <td>{{$prod->fullname}}</td>
                    <td class="bg-danger text-white">{{ $prod->savdo }}</td>
                    <td class="bg-primary text-white">{{ $prod->foyda }}</td>
                    <td class="bg-success text-white">{{ $prod->skidka }}</td>
                    <td>{{ $prod->created_at }}</td>
                    <td  class="d-flex align-center justify-content-around">
                        <form action="{{route('tavar_pdf',$prod->id)}}" class="m-2">
                            <button href="" class="btn btn-primary"><i class="bi bi-file-pdf"></i></button>
                        </form>

                        <a href="{{ route('sotuvedit',$prod->id) }}" class="btn btn-success m-2"><i class="bi bi-pencil btn-success w-100 p-2" style='border-radius:5px'></i></a>
                        <form action="{{ route('sotuvdestroy',$prod->id) }}" method="post" class="m-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" ><i class="bi bi-trash-fill " ></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection