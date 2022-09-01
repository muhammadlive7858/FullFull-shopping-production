@extends('admin.index')

@section('content')
@if(Session::has('text'))
<div class="alert alert-success">
    {{Session::get('text')}}
</div>

@endif

<h2>Hodimlar Sotuv Ofisi</h2>
<hr>



<div class="row g-3 d-flex justify-content-between align-center form-control m-1 header-mazza" action="">
    @csrf
    <!-- Nom qidiruv -->
    <div class="col-md-5 d-flex aling-center justify-content-between row">
        <form action="{{ route('hodimproductsearch') }}"  method="post" class="w-100 d-flex align-center justify-content-between  ">
            @csrf
            <div class="col-auto" style="width:80%">
                <label for="inputPassword21" class="visually-hidden">Tavar</label>
                <input type="text" name="productsearch" class="form-control" id="inputPassword21" placeholder="Tavar nomini kiriting:">
            </div>
            <div class="col-auto">
                <button id="submit" class="btn btn-primary mb-2"><i class="bi bi-search"></i></button>
            </div>
        </form>

        <form action="{{route('hodimcreate_vaqtincha')}}"  class="d-flex justify-content-between w-100 col-6" method="post">
            @csrf
            @method('post')
            <select name="productid" id="" class="w-100 form-select" style="width:80%;margin-right:5px">
                <option selected disabled>Tavar tanlang</option>
                @if(isset($productname))
                    @forelse($productname as $product_id)
                    <option value="{{ $product_id->id }}">{{ $product_id->name }}</option>
                    @empty
                    <option value="">Tavar mavjud emas</option>
                    @endforelse
                @endif
            </select>
            <button class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i></button>
        </form>
    </div>
    <!-- ID qidiruv -->
    <form action="{{ route('hodimproduct-id') }}" class=" div col-md-5 d-flex aling-center justify-content-between">
        <div class="col-auto" style="width:80%">
            <label for="inputPassword2" class="visually-hidden">Tavar</label>
            <input type="text" name="productid" class="form-control" id="inputPassword2" placeholder="ID kiriting:">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2"><i class="bi bi-search"></i></button>
        </div>
    </form>
</div>

<hr>



@if(!empty($prod_vaqt))
<div class="row">
    <div class="col-9">
            <form action="{{ route('hodimhisoblash') }}" method="">
                <div class="d-flex justify-content-end mb-1 w-100  ">
                    <button  id="btn" class="btn btn-primary w-40 p-3 "><i class="bi bi-calculator fs-2"></i></button>
                </div>
            </form>

            <table class="table table-bordered w-100">
                <thead>
                    <tr>
                        <th scope="col" style="width:10%">#</th>
                        <th scope="col">Tavar nomi</th>
                        <th style="width:10%">Narxi</th>
                        <th scope="col" style="width:10%">mavjud</th>
                        <th scope="col" style="width:20% !important">Sotilmoqda...</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prod_vaqt as $prod)
                    <tr>
                        <form action="{{ route('hodimedit',$prod->id) }}" method="post">
                            @csrf
                                <td scope="row" style="width:10%">{{ $prod->product_id }}</th>
                                <td>{{ $prod->product_name }}</td>
                                <td class=" fw-bold bg-danger text-white">{{ $prod->price }}</td>
                                <input type="hidden" name="product[]" value="{{ $prod->product_id }}">
                                <td style="width:10%" class="text-white fw-bold bg-success">{{ $prod->product_count }}</td>
                                <td class="d-flex justify-content-around align-center">
                                    @csrf
                                    @method('POST')
                                    <input type="text" step="any" name="inputVal" value="{{ $prod->inputVal }}" id="sum" class="form-control" placeholder="Tavarlar soni:">
                                    <input class="p-2 m-2 input-control " style="width:50px" type="hidden" name="prod_id[]" id="" value="{{ $prod->product_id }}">
                                    <button class="btn btn-primary"><i class="bi bi-plus"></i></button>
                                </td>
                        </form>
                    </tr>

                    @endforeach
                  
                </tbody>
            </table>
@else
<h1>Tavar Qo'shing</h1>
@endif




<hr>
</div>
<div class="col-3 d-flex flex-column">
    <div class="w-100 d-flex align-center justify-content-between flex-column ">
        <!-- <label class="d-flex fs-4">
                    <div class="form-check form-check-inline">
                        <input required class="form-check-input" type="radio" name="tolav_turi"  value="naxt">
                        <img src="{{asset('1123.jpg')}}" alt=""style="width:50px;border-radius:3px;">
                    </div>
                    <div class="form-check form-check-inline">
                        <input required class="form-check-input" type="radio" name="tolav_turi"  value="plastik">
                        <img src="{{asset('6637.jpg')}}" style="width:50px;border-radius:3px;">
                    </div>
            </label> -->
        <div class="div w-100 d-flex align-center justify-content-center mx-1 flex-column">
            <h1 class="text-success fw-bold">
                @if(!empty($savdo))
                {{$savdo}} sum
                @else
                <span></span>
                @endif



            </h1>
            <form action="{{ route('hodimfullhisob') }}" method="post">
                @csrf 
                @if(!empty($savdo))
                    <input type="hidden" name="savdo" value="{{ $savdo }}">
                @else
                    <span></span>
                @endif
                <select name="hodim_id" id="" class="form-control my-2">
                    <option value="">Hodimni tanlang</option>
                    @if(isset($client))
                        @forelse($client as $hodim)
                        <option value="{{ $hodim->id }}">{{ $hodim->name }}</option>
                        @empty
                        <option value="">Hodim mavjud emas</option>
                        @endforelse
                    @endif
                </select>
                @if(!empty($savdo))
                    @forelse($product_mossiv as $product)
                        <input type="hidden" name="product[]" value="{{ $product }}">
                      
                    @empty
                    @endforelse
                @else
                @endif
                @if(!empty($savdo))
                    @forelse($sotish_soni_mossiv as $son)
                        <input type="hidden" name="count[]" value="{{ $son }}">
                    @empty
                    @endforelse
                @else
                @endif

                <h6 class="w-100 my-2"><b>Qaytim:</b></h6>
                <input type="number" id="input" name="skidka" value="0" class="form-control  w-100">
                <div class="d-flex justify-content-between mt-1 ">
                    <a style="transform: scale(0.7);" href="#" class="btn btn-success  text-white  fw-bold  w-100" onclick="decrement()"><i class="bi bi-dash-circle fs-2"></i></a>
                    <a style="transform: scale(0.7); " href="#" id="clic" class="btn btn-danger  text-white  fw-bold w-100" onclick="increment()"><i class="bi bi-plus-circle fs-2"></i></a>
                </div>

        </div>
    </div>
    <hr>
    <div class="d-flex">
        <button onclick="sotish()" class="btn btn-primary w-50 mx-1"> <i class="bi bi-check2-all fs-2  "></i></button>
        <a href="{{route('tozalash')}}" class="btn btn-danger w-50 mx-1"><i class="bi bi-trash fs-2"></i></a>
    </div>
</div>
</div>
</form>
<!-- <form action="{{route('pdf')}}">
    @if(!empty($savdo))
    <input type="hidden" value="{{$savdo}}" name="price">
    @else 
    <input type="hidden" name="">
    @endif
  

<button href="" class="btn btn-success w-30 px-4 mt-1"><i class="bi bi-file-pdf fs-3"></i></button>

</form> -->


<script>
    function sotish() {}
</script>

<!-- Modal -->

<!-- Button trigger modal -->
<script>
//     let btn = document.getElementById('btn');
    
// btn.onclick = (event) => {
//   event.target.preventDefault()
 
// }

    function increment() {
        let inputval = document.querySelector('#input').value;
        inputval *= 1
        inputval = inputval + 1000;
        document.querySelector('#input').value = inputval
    }

    function decrement() {
        let inputval = document.querySelector('#input').value;
        inputval *= 1
        inputval = inputval - 1000;
        document.querySelector('#input').value = inputval
    }
   
        
   
</script>

@endsection

