@extends('admin.index')

@section('content')
<div class="d-flex justify-content-between align-center my-2">
    <h1 class="w-100">Qarz sahifasi</h1>
    <form action="{{ route('qarzsearch') }}" method="post" class="form-control d-flex justify-content-between">
        @csrf
        <input type="text" name="search" class=" form-control" placeholder="Qarz qidiruvi"/>
        <button class="btn btn-outline-primary">Qidirish</button>
    </form>
    <a href="{{ route('qarz.create') }}" class="btn btn-success">Yaratish</a>
</div>
<table class="table table-bordered w-100">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nomi</th>
                <th>Umumiy summa</th>
                <th>Qoldiq summa</th>
                <th>Malumoti</th>
                <th>Telefon</th>
                <th>Vaqt</th>
                <th scope="col" style="width:10% !important">Amallar</th>
            </tr>
        </thead>
        <tbody>
@forelse($qarz as $qarz)
                <tr>
                    <td scope="row">{{ $qarz->id }}</th>
                    <td>{{ $qarz->name }}</td>
                    <td class="bg-primary text-white">{{ $qarz->tolav_summa }}</td>
                    <td class="bg-success text-white">{{ $qarz->qarzi }}</td>
                    <td>
                        <?php
                            if(is_numeric($qarz->desc)){
                                echo "<a href={{ route('debt-shop',$qarz->desc) }}>Malumot uchun bosing</a>";
                            }else{
                                echo $qarz->desc;
                            }
                        ?>
                    </td>
                    <td class="bg-danger text-white">{{ $qarz->phone }}</td>
                    <td>{{ $qarz->vaqt }}</td>
                    <td  class="d-flex align-center justify-content-around align-center">
                        <a href="{{ route('qarz.edit',$qarz->id) }}" class="mt-2 btn btn-primary mx-1">To'lash</a>
                        <a href="{{ route('qarz.show',$qarz->id) }}" class="btn btn-success mt-2 mx-1"><i class="bi bi-bag-fill"></i></a>
                        <form action="{{ route('qarz.destroy',$qarz->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger mt-2 mx-1"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                    <div class="d-flex justify-content-between align-center">
                    <h1>Hozircha qarzlar mavjud emas!</h1>
                    </div>
                @endforelse
            </tbody>
        </table>
@endsection