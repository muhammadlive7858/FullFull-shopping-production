<h1>Muzaffar  Xos Tavar  do'kani</h1>
<h5><span>Manzil</span> BERUNIY TUMANI ....</h5>
<p >Do'kan egasi <b>Muzaffar</b></p>
<hr>
<div class="divv" style="display:flex;justify-content:around;align-items:center;">

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nomi</th>
                <th>Baxosi</th>
                <th>Soni</th>
            </tr>
        </thead>
        <tbody>
            {{$i = 1}}
            {{$n = 0}}
            @foreach($name as $names)
                <tr>
                    
                    <td>{{ $i }}</td>
                        @foreach($names as $key => $nom)
                            @if($key === "name")
                                <td>{{$nom}}</td>
                            @endif
                            @if($key === "count")
                                <td>{{$nom}}</td>
                                {{$n = $n + $nom}}
                            @endif
                            @if($key === "price")
                                <td>{{$nom}}</td>
                            @endif
                            {{$i++}}
                        @endforeach
                        
                    </tr>
                    @endforeach
                    <tr>
                        <th></th>
                        <th>Jami tavarlar soni</th>
                        <td>{{ $n }}</td>
                        <th></th>
                    </tr>
        </tbody>
    </table>

    <div class="left" style="width:50%; float:left;">
        <h3 style="padding:15px">Summa:</h3>
        <h3 style="padding:15px">Vaqti:</h3>
    </div>
    <div class="right" style="width:50%; float:right;">
        <h3 style="padding:15px">{{$s['savdo']}}so'm</h3>
        <h3 style="padding:15px">{{$s['created_at']}}</h3>
    </div>
</div>



<h3 style="text-align:center">Haridingiz Uchun Rahmat </h3>
<div style="width:100%;margin:50px 0; display:flex;justify-content:around;align-items:center;">
    <h4 style="width:50% ;float:left">Tadbirkor:</h4>
    <h4 style="width:50%; float:right;display:flex;justify-content:between;">Muzaffar <span>+998997478083</span></h6>
</div>
<div style="width:100%;margin:50px 0; display:flex;justify-content:between;align-items:center;">
    <h4 style="width:80%;float:left">{{ $s->hodim }}</h4>
    <h4 style="width:50%;float:right;display:flex;justify-content:between;">Xizmat ko'rsatuvchi:</h6>
</div>


<style>
    h1 , p  ,h5 , h2{
        text-align: center;
    }
    b{
        font-size: 20px;
    }
    div{
        align-items: center
    }
    table{
        border-collapse: collapse;
        width: 100%;
    }
    thead,tbody,tr,td,th{
        border: 1px solid black;
    }
    .d-flex{
        display: flex;
    }
</style>