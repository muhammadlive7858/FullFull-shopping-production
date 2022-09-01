@extends('admin.index')

@section('content')
<?php
    $oy = 1;
?>
        <div class="d-flex justify-content-between">
            <div class="w-75">
                @foreach($res as $result)
    
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th scope="col">{{$oy}}-oy</th>
                                <th scope="col">Jami savdo </th>
                                <th>Jami  foyda</th>
                                <th>Jami Qaytim</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>{{ $result['savdo'] }}</td>
                                <td>{{ $result['foyda'] }}</td>
                                <td>{{ $result['qaytim'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <?php  $oy++  ?>

        @endforeach
            </div>
        
        <hr>
        
        <div class="w-25">
            @foreach($rasxot as $rasxot)
    
            <table class="table table-bordered w-100">
                <thead>
                    <tr>
                        <th scope="col">Chiqim </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $rasxot['chiqim'] }}</td>
                    </tr>
                </tbody>
            </table>

        @endforeach
        </div>
        
        </div>
        <hr>
        <table class="table table-bordered w-100">
            <thead>
                <tr>
                    <th scope="col">Yillik</th>
                    <th scope="col">Jami savdo </th>
                    <th>Jami  foyda</th>
                    <th>Jami Qaytim</th>
                    <th>Yillik Chiqim</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $date }} - yil</td>
                    <td>{{ $jamiSavdo }}</td>
                    <td>{{ $jamiFoyda }}</td>
                    <td>{{ $jamiQaytim }}</td>
                    <td>{{ $yearchiqim }}</td>
                    <td><a href="{{route('yillik')}}" class="btn btn-success">Fayl orqali yuklash</a></td>
                </tr>
            </tbody>
        </table>

@endsection