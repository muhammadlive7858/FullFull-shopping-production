<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Muzaffar Xost-Tavar</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/shopping-cart.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div  class="d-flex align-items-center justify-content-between">
      <a  href="#" class="logo d-flex align-items-center">
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <span class="d-none d-lg-block">Muzaffar Xost_Tavar</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

   <div>
   @if (count($errors) > 0)
   
        <!-- <strong>Whoops!</strong> There were some problems with your input.<br><br> -->
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-danger fw-bold">{{ $error }}</li>
            @endforeach
        </ul>
   
  @endif
   </div>

<nav class="header-nav ms-auto" id="nav" >
      <ul class="d-flex align-items-center">
        <li>
            <form action="{{route('pdf')}}">
              @if(!empty($savdo))
              <input type="hidden" value="{{$savdo}}" name="price">
              @else 
              <input type="hidden" name="">
              @endif
            <button href="" class="btn btn-success "><i class="bi bi-file-pdf"></i></button>

          </form>
        </li>
        <!-- savdo kunlik -->
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="{{route('coinday')}}" >
            <i class="bi bi-calendar"></i>
            <span class="badge bg-danger badge-number"></span>
          </a><!-- End Notification Icon -->
          
        </li><!-- End Notification Nav -->
        <!-- qarz kunlik -->
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="{{route('coin')}}" >
            <i class="bi bi-coin"></i>
            <span id="icon" class="badge bg-danger badge-number">{{$QarzProvider}}</span>
          </a><!-- End Notification Icon -->
          
        </li>
          
        






<div class="HARD">
<li class="nav-item dropdown pe-3">

<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
  <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
  <span class="d-none d-md-block dropdown-toggle ps-2"><i class="bi bi-calculator fw-bold fs-3"></i></span>
</a><!-- End Profile Iamge Icon --> 

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">


<div class="wrapper">
        <div class="container">
            <h1>Calculator</h1>
            <div class="first-row">
                <input class="inputs text-danger fw-bold" type="text" name="result" class="result" id="result" value="" placeholder="Result" readonly />
                <input id="c" class="inputs" type="button" value="C" onclick="clearScreen()" id="clear" />
            </div>
            <div class="second-row">
                <input class="inputs" type="button" value="1" onclick="liveScreen(1)" id="one" />
                <input class="inputs" type="button" value="2" onclick="liveScreen(2)" id="two" />
                <input class="inputs" type="button" value="3" id="three" onclick="liveScreen(3)" />
                <input class="inputs" type="button" value="+" onclick="liveScreen('+')" />
            </div>
            <div class="third-row">
                <input class="inputs" type="button" value="4" id="four" onclick="liveScreen(4)" />
                <input class="inputs" type="button" value="5" id="five" onclick="liveScreen(5)" />
                <input class="inputs" type="button" value="6" id="six" onclick="liveScreen(6)" />
                <input class="inputs" type="button" value="-" onclick="liveScreen('-')" />
            </div>
            <div class="fourth-row">
                <input class="inputs" type="button" value="7" id="seven" onclick="liveScreen(7)" />
                <input class="inputs" type="button" value="8" id="eight" onclick="liveScreen(8)" />
                <input class="inputs" type="button" value="9" id="nine" onclick="liveScreen(9)" />
                <input class="inputs" type="button" value="x" onclick="liveScreen('*')" />
            </div>
            <div class="fifth-row">
                <input class="inputs" type="button" value="/" onclick="liveScreen('/')" />

                <input class="inputs" type="button" value="0" id="zero" onclick="liveScreen(0)" />
                <input class="inputs" type="button" value="." class="dot" onclick="liveScreen('.')" />
                <input class="inputs" type="button" value="=" onclick="result.value = eval(result.value||null)" />
            </div>
            <div class="bottom-buttons">

        
            </div>
        </div>
    </div>



<style>
  .first-row>input {
    padding:10px;
    
  }
  #c{
    background-color: red;
    color:#fff;
  }
  .fifth-row>input{
    padding: 10px;
    font-weight: bold;
  }
  .fourth-row>input{
    padding: 10px;
    font-weight: bold;
  }
  .third-row>input{
    padding: 10px;
    font-weight: bold;
  }
  .second-row>input{
    padding: 10px;
    font-weight: bold;
  }
</style>


</ul><!-- End Profile Dropdown Items -->
</li><!-- End Profile Nav -->


</div>
<!-- /endhard -->





<script>
  let lightTheme = "styles/light.css";
let darkTheme = "styles/dark.css";

//adding event handler on the document to handle keyboard inputs
document.addEventListener("keydown", keyboardInputHandler);

//function to handle keyboard inputs
function keyboardInputHandler(e) {
  //grabbing the liveScreen
  let res = document.getElementById("result");

  //numbers
  if (e.key === "0") {
    res.value += "0";
  } else if (e.key === "1") {
    res.value += "1";
  } else if (e.key === "2") {
    res.value += "2";
  } else if (e.key === "3") {
    res.value += "3";
  } else if (e.key === "4") {
    res.value += "4";
  } else if (e.key === "5") {
    res.value += "5";
  } else if (e.key === "6") {
    res.value += "6";
  } else if (e.key === "7") {
    res.value += "7";
  } else if (e.key === "7") {
    res.value += "7";
  } else if (e.key === "8") {
    res.value += "8";
  } else if (e.key === "9") {
    res.value += "9";
  }

  //operators
  if (e.key === "+") {
    res.value += "+";
  } else if (e.key === "-") {
    res.value += "-";
  } else if (e.key === "*") {
    res.value += "*";
  } else if (e.key === "/") {
    res.value += "/";
  }

  //decimal key
  if (e.key === ".") {
    res.value += ".";
  }

  //press enter to see result
  if (e.key === "Enter") {
    res.value = eval(result.value || null);
  }

  //backspace for removing the last input
  if (e.key === "Backspace") {
    let resultInput = res.value;

    //remove the last element in the string
    res.value = resultInput.substring(0, res.value.length - 1);
  }
}

// Clears the screen on click of C button.
function clearScreen() {
  document.getElementById("result").value = "";
}
// Displays entered value on screen.
function liveScreen(value) {
  let res = document.getElementById("result");
  if (!res.value) {
    res.value = "";
  }
  res.value += value;
}
// Swaps the stylesheet in order to  achieve dark mode.
function changeTheme() {
  let darkMode = document.getElementById("dark-mode");
  let theme = document.getElementById("theme");
  if (theme.getAttribute("href") === lightTheme) {
    theme.href = darkTheme;
    darkMode.innerHTML = "Light Mode 🌞";
  } else {
    theme.href = lightTheme;
    darkMode.innerHTML = "Dark Mode 🌙";
  }
}

</script>
















        
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="{{route('procount')}}" >
            <i class="bi bi-bell"></i>
            <span id="icon" class="badge bg-danger  badge-number">{{$proCount}}</span>
          </a><!-- End Notification Icon -->
          
        </li><!-- 
          
        
        
    
        End Notification Nav -->
   
      <style>
        #jpg{
          border-radius: 40%;
        }
        #icon{
    background-color: #ff69b4;
    animation: pulse 1500ms infinite;
}
@keyframes pulse {
    0% {
        box-shadow: #ff69b4 0 0 0 0;
    }
    75% {
        box-shadow: #ff69b400 0 0 0 16px;
    }
}
      </style>


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6></h6>
              <span></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="">
                
                <span><i class="bi bi-person"></i>My Role    --</span>
                <span>{{ Auth::user()->role }}</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                @csrf
                <button class="w-100 btn btn-outline-danger">Sign Out</button>
              </form>
            </li>

          </ul>
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <div class="row">
    <aside id="sidebar" class=" sidebar" >
  <ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-heading">Sotuv bo'limi</li><!-- End Dashboard Nav -->


<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-layout-text-window-reverse btn btn-warning"></i><span>Sotuv Paneli</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{ route('shop-index') }}">
        <i class="bi bi-circle "></i><span>Asosiy Sotuv paneli</span>
        </a>
    </li>
    <li>
        <a href="{{ route('shop-indextu') }}">
        <i class="bi bi-circle "></i><span>Ikkinchi Sotuv paneli </span>
        </a>
    </li>
    <li>
        <a href="{{ route('shop-indexthree') }}">
        <i class="bi bi-circle "></i><span>Uchinchi Sotuv paneli </span>
        </a>
    </li>
    <li>
        <a href="{{ route('sotuvlar') }}">
        <i class="bi bi-circle"></i><span>Sotuvlar ro'yxati</span>
        </a>
    </li>
    <li>
        <a href="{{ route('hisob') }}">
        <i class="bi bi-circle"></i><span>Jami Hisobot</span>
        </a>
    </li>
    </ul>
</li><!-- End Sotuv Nav -->

<li class="nav-heading">Omborxona</li>
<!-- Kategory start -->
<li class="nav-item">
    <a id="menu" class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-menu-button-wide   btn btn-warning"></i><span>Kategoriyalar</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{ route('category.index') }}">
        <i class="bi bi-circle"></i><span>Hamma Kategoriyalar</span>
        </a>
    </li>
    <li>
        <a href="{{ route('category.create') }}">
        <i class="bi bi-circle"></i><span>Kategoriya Yaratish</span>
        </a>
    </li>
    </ul>
</li><!-- End Kategoriya Nav -->

<li class="nav-item">
    <a id="menu" class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-journal-text   btn btn-warning"></i><span>Tavarlar</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{ route('product.index') }}">
        <i class="bi bi-circle"></i><span>Hamma Tavarlar</span>
        </a>
    </li>
    <li>
        <a href="{{ route('product.create') }}">
        <i class="bi bi-circle"></i><span>Tavar Yaratish</span>
        </a>
    </li>
    <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('product.createplus') }}">
    <i class="bi bi-circle "></i>
    <span>Qaytim tavar</span>
    </a>
</li>
    </ul>
</li><!-- End Tavar Nav -->


<li class="nav-item">
    <a id="menu" class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-gem btn btn-warning"></i><span>Omborxona</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{ route('ombor') }}">
        <i class="bi bi-circle"></i><span>Asosiy Omborxona</span>
        </a>
    </li>
    </ul>
</li><!-- End Icons Nav -->
<li class="nav-item">
    <a class="nav-link collapsed"  href="{{ route('taminot.index') }}">
    <i class="bi bi-arrow-down-square-fill btn btn-warning"></i><span>Taminotchi</span>
    </a>
    
</li>
<li class="nav-heading">Qarz</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('qarz.index') }}">
    <i class="bi bi-bank btn btn-warning"></i>
    <span>Qarz</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('shaxsiyqarz.index') }}">
    <i class="bi bi-bank btn btn-warning"></i>
    <span>Shaxsiy Qarz</span>
    </a>
</li>
<li class="nav-heading">Mijozlar</li>
<li class="nav-item">
    <a class="nav-link collapsed"   href="{{ route('client.index') }}">
    <i class="bi bi-menu-button-wide btn btn-warning"></i><span>Mijozlar</span>
    </a>
</li>
<li class="nav-heading">O'chirilganlar</li>
<li class="nav-item">
    <a class="nav-link collapsed"   href="{{ route('delete') }}">
    <i class="bi bi-menu-button-wide btn btn-warning"></i><span>O'chirilganlar</span>
    </a>
</li>
<!-- hodim -->
<li class="nav-heading">Hodim</li>
<li class="nav-item">
    <a id="menu" class="nav-link collapsed" data-bs-target="#components-hodim" data-bs-toggle="collapse" href="#">
    <i class="bi bi-menu-button-wide btn btn-warning"></i><span>Hodimlar</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-hodim" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{ route('hodim.index') }}">
        <i class="bi bi-circle"></i><span>Hamma Hodimlar</span>
        </a>
    </li>
    <li>
        <a href="{{ route('hodim.show') }}">
        <i class="bi bi-circle"></i><span>Hodimlar daftari </span>
        </a>
    </li>
    <li>
        <a href="{{ route('hodimshop-index') }}">
        <i class="bi bi-circle"></i><span>Hamma Savdo</span>
        </a>
    </li>
    <li>
        <a href="{{ route('hodimSotuvlar.index') }}">
        <i class="bi bi-circle"></i><span>Hodim Savdo Ro'txati</span>
        </a>
    </li>
    </ul>
</li>

<li class="nav-heading">Chiqim</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('chiqim.index') }}">
    <i class="bi bi-person btn btn-warning"></i>
    <span>Chiqim</span>
    </a>
</li>
<!-- admin -->

<li class="nav-heading">Adminstrator</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('users.index') }}">
    <i class="bi bi-person btn btn-warning"></i>
    <span>Users</span>
    </a>
</li><!-- End Profile Page Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" href="{{route('users.create')}}">
    <i class="bi bi-card-list btn btn-warning"></i>
    <span>Register</span>
    </a>
</li><!-- End Register Page Nav -->

<li class="nav-item">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
        @csrf
        <button class="w-100 btn btn-outline-danger">Sign Out</button>
    </form>
</li><!-- End Login Page Nav -->
<marquee>1 USD kursi <span class="text-danger">{{$rate}}</span> ga teng bugungi vaqt xabari..</marquee>
</ul>
</aside><!-- End Sidebar-->
      <div class="col-3"></div>
    <div class=" col-9 content my-5 p-4">
        @yield('content')
    </div>
  </div>

  <!-- ======= Footer ======= -->
  <!-- <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>


<!-- <script>
  let sidebar = document.getElementsByClassName('sidebar');
  let menu = document.getElementById('menu');

  let biList = document.querySelector('.bi-list')

  // let btn = document.getElementsByClassName('bi-list')

  
  window.addEventListener('click', (e) => {

    console.log(e.target !== sidebar);
    if(e.target !== sidebar && e.target !== biList)  {
      sidebar.style.display = 'none'
    }
    
  })

  // biList.addEventListener('click', () => {
  //   sidebar.style.display = 'block'
  // }) -->
<!-- </script> -->
</html>