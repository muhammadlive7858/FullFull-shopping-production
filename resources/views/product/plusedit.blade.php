@extends('admin.index')

@section('content')
    <style>
        @media(max-width:413){
    .container{
        width: 100% !important;
        margin: 10px 5px !important;
    }
    .content{
        margin:0 auto !important;
        padding: 0 !important;
    }
    .seconds{
        display:none ;
    }
}
    </style>
    <h1 class="w-100">Hamma Tavarlar sahifasi</h1>
      <form action="{{route('searchs')}}" class="form-control d-flex" method="post">
          @csrf
     <input type="text" name="prosearch" placeholder="Tavar nomi boyicha qidirish" class="form-control mx-1">
     <button class="btn btn-primary ml-1"><i class="bi bi-search"></i></button>
    </form>

    <hr>
    <h4><b>Tavarlar ro'yxati:</b></h4>
    <table class="table table-bordered w-100 table-responsive">
            <thead>
                <tr class="">
                    <th  class="seconds" scope="col">#</th>
                    <th scope="col">Nomi</th>
                    <th scope="col">Kategoriya</th>
                    <th>Mavjud</th>
                    <th scope="col" style="width:10% !important">Amallar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                ?>
                @if(!empty($product))
                    @forelse($product as $prod)
                <tr>
                    <td  class="seconds" scope="row">{{ $i }}</th>
                    <td>{{ $prod->name }}</td>
                    <td>{{ $prod->category->name }}</td>
                    <td class="bg-primary text-white">{{ $prod->count }}</td>
                    <td  class="d-flex  justify-content-between " >
                        <form action="{{ route('editplus',$prod->id) }}" method="post" class="d-flex form-control justify-content-between ">
                            @csrf
                            <input name="count" class="form-control m-1 w-75" placeholder="Son kiriting:"  style="min-width:200px;col-span:2" />
                        <button class="btn-danger w-100 px-1 m-1"style='border-radius:5px' ><i class="bi bi-trash-fill " >Saqlash</i></button>
                        </form>
                    </td>
                    
                </tr>
                <?php
                    $i++;
                ?>
                @empty
                <h3>Tavar mavjud emas!</h3>
                @endforelse
                @endif
            </tbody>
        </table>
        <script>
            function delet(){
                confirm('Haqiqatdan ham ochirmoqchimisiz?')
            }
        </script>
        <style>
            #th{
                background: #111;
            }
            #th:hover{
                background:white;
            }
        </style>
@endsection
996264721