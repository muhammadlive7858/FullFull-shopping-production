<h1>Muzaffar  Xos Tavar  do'kani</h1>
<h5 style="display:flex;justify-content:between;align_items:center"><span>Yillik hisobot</span>   -->  {{$res['yil']}} </h5>
<p >Do'kan egasi <b>Muzaffar</b></p>
<hr>
<div class="divv" style="display:flex;justify-content:around;align-items:center;">

    

    <div class="left" style="width:50%; float:left;">
        <h3 style="padding:15px">Shu Yilgi jami savdolar:</h3>
        <h3 style="padding:15px">Foyda:</h3>
        <h3 style="padding:15px">Qaytim puli:</h3>
    </div>
    <div class="right" style="width:50%; float:right;">
        <h3 style="padding:15px">{{$res['sotuv']}}so'm</h3>
        <h3 style="padding:15px">{{$res['foyda']}}</h3>
        <h3 style="padding:15px">{{$res['skidka']}}</h3>
    </div>
</div>

<hr>

<!--<div style="width:100%;margin:50px 0; display:flex;justify-content:around;align-items:center;">-->
<!--    <h4 style="width:50% ;float:left">Yil:</h4>-->
<!--    <h6 style="width:50%; float:right;display:flex;justify-content:between;"> <span> yil</span>-->
<!--    </h6>-->
<!--</div>-->


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