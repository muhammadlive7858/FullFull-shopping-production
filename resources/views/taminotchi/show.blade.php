@extends('admin.index')

@section('content')

        <h4>Dollor $ hisobi qarzlar</h4>
        <table class="table table-bordered w-100 table-responsive">
            <thead>
                <tr class="">
                    <th  class="seconds" scope="col">#</th>
                    <th scope="col">Jami Summa</th>
                    <th  class="seconds" scope="col">Qoldiq Summa</th>
                    <th  class="seconds" scope="col">To'lash</th></th>
                    <th>To'lav tarixi</th>
                </tr>
            </thead> 
            <tbody>
                <?php
                    $i = 1;
                ?>
                <tr>
                    <td  class="seconds" scope="row">{{ $i }}</th>
                    <td>{{ $jamiSummaDollor }}$</td>
                    <td class="seconds">{{ $qoldiqSummaDollor }}$</td>
                    <td class="seconds">
                        <a href="{{ route('shqarz-create',$id) }}" class="btn btn-primary">To'lash</a>
                    </td>
                    <td class="bg-primary text-white">
                        <a href="{{ route('shqarz-show',$id) }}" class="btn btn-success w-100">To'lav tarixi</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        <h4>Som hisobi qarzlar</h4>
        <table class="table table-bordered w-100 table-responsive">
            <thead>
                <tr class="">
                    <th  class="seconds" scope="col">#</th>
                    <th scope="col">Jami Summa</th>
                    <th  class="seconds" scope="col">Qoldiq Summa</th>
                    <th  class="seconds" scope="col">To'lash</th></th>
                    <th>To'lav tarixi</th>
                </tr>
            </thead> 
            <tbody>
                <?php
                    $i = 1;
                ?>
                <tr>
                    <td  class="seconds" scope="row">{{ $i }}</th>
                    <td>{{ $jamiSummaSom }}</td>
                    <td class="seconds">{{ $qoldiqSummaSom }}</td>
                    <td class="seconds">
                        <a href="{{ route('shqarz-createSom',$id) }}" class="btn btn-primary">To'lash</a>
                    </td>
                    <td class="bg-primary text-white">
                        <a href="{{ route('shqarz-showSom',$id) }}" class="btn btn-success w-100">To'lav tarixi</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr><h1 class="w-100">Taminotchi tamonidan kiritilgan tavarlar:</h1>
    <table class="table table-bordered w-100 table-responsive">
            <thead>
                <tr class="">
                    <th  class="seconds" scope="col">#</th>
                    <th scope="col">Nomi</th>
                    <th  class="seconds" scope="col">Dollor baxosi</th>
                    <th  class="seconds" scope="col">So'm baxosi</th>
                    <th  class="seconds" scope="col">Kirim vaqti</th>
                    <th>Soni</th>
                    <th>Amallar</th>
                </tr>
            </thead> 
            <tbody>
                <?php
                    $i = 1;
                ?>
            @forelse($prod as $prod)
                <tr>
                    <td  class="seconds" scope="row">{{ $i }}</th>
                    <td>{{ $prod->name }}</td>
                    <td class="seconds">{{ $prod->dollors }}</td>
                    <td class="seconds">{{ $prod->price }}</td>

                    <td class="seconds">
                        {{ $prod->created_at }}
                    </td>
                    <td class="bg-primary text-white">{{ $prod->taminotcount }}</td>
                    <td class="d-flex">
                        <a href="{{ route('productplus',$prod->id) }}" class="btn btn-success w-100"><i class="bi bi-plus"></i></a>
                        <form action="{{ route('product.destroy',$prod->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="delet()">O'chirish</button>
                        </form>
                    </td>
                </tr>
                <?php
                    $i =$i + 1;
                ?>
                @empty
                <h4>Tavar mavjud emas</h4>
                @endforelse
            </tbody>
        </table>
        <hr>
        <script>
            <script>
            function delet(){
                confirm("Haqiqatdan ham o'chirmoqchimisiz?")
            }
        </script>
        </script>

@endsection