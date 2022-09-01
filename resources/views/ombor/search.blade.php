@extends('admin.index')

@section('content')

<form action="{{ route('searchombor') }}" method="POST" class="form-control w-100" >
        @csrf
        @method('POST')
        <select name="category_id" id="" class="form-select m-2" style="width:99%">
            <option value="">Kategoriyani tanlang</option>
            @forelse($cate as $cate)
                <option value="{{$cate->id}}">{{ $cate->name }}</option>
                @empty
                <optgroup>Category yoq</optgroup>
            @endforelse
        </select>
        <button class="btn btn-success mx-2" >Tanlang</button>
    </form> 
    <table class="table table-bordered w-100">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nomi</th>
                    
                    <th>Narxi</th>
                    <th scope="col">ID raqami</th>
                    <th>Mavjud</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                @forelse($product as $prod)
                    <tr>
                        <td><?php echo $i?></td>
                        <td>{{ $prod->name }}</td>
                        
                        <td class="bg-primary text-white">{{ $prod->price }} so'm</td>
                        <td>{{ $prod->producttime }}</td>
                        
                        <td class="bg-success text-white">{{ $prod->count }}</td>
                    </tr>
                    <?php $i++;?>
                @empty
                    <h4>Hozircha Kategoriya tanlanmagan yoki kategoriyada tavar mavjud emas</h4>
                @endforelse
            </tbody>
        </table>
            <hr>
                <h3 class="h3 w-100 d-flex justify-content-between" >Tavarlar kelish baxosi jamlanmasi  <span style="color:red">{{$kelish}} so'm</span></h3>
                                <h3 class="h3 w-100 d-flex justify-content-between" >Tavarlar sotish baxosi jamlanmasi  <span style="color:red">{{$sotish}} so'm</span></h3>
                
                        <h3 class="h3 w-100 d-flex justify-content-between" >Kategoryadagi tavarlar soni  <span style="color:red">{{$soni}}</span>  </h3>
                        <h4 class="text-primary fw-1 w-100 d-flex justify-content-between">Ko'riladigan foyda <span>{{$res}} so'm</span></h4>

@endsection