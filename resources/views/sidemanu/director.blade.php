@extends('admin.index')

@section('sidebar')
<ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-heading">Sotuv bo'limi</li>

    <li class="nav-item">
        <a class="nav-link " href="{{ route('dashbord') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->


<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-layout-text-window-reverse"></i><span>Sotuv Paneli</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{ route('shop-index') }}">
        <i class="bi bi-circle"></i><span>Asosiy Sotuv paneli</span>
        </a>
    </li>
    <li>
        <a href="{{ route('sotuvlar') }}">
        <i class="bi bi-circle"></i><span>Sotuvlar ro'yxati</span>
        </a>
    </li>
    </ul>
</li><!-- End Sotuv Nav -->

<li class="nav-heading">Omborxona</li>
<!-- Kategory start -->
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-menu-button-wide"></i><span>Kategoriyalar</span><i class="bi bi-chevron-down ms-auto"></i>
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
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-journal-text"></i><span>Tavarlar</span><i class="bi bi-chevron-down ms-auto"></i>
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
    </ul>
</li><!-- End Tavar Nav -->


<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-gem"></i><span>Omborxona</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{ route('ombor') }}">
        <i class="bi bi-circle"></i><span>Asosiy Omborxona</span>
        </a>
    </li>
    </ul>
</li><!-- End Icons Nav -->
<li class="nav-heading">Qarz</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('qarz.index') }}">
    <i class="bi bi-bank"></i>
    <span>Qarz</span>
    </a>
</li>


<li class="nav-heading">Adminstrator</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('users.index') }}">
    <i class="bi bi-person"></i>
    <span>Users</span>
    </a>
</li><!-- End Profile Page Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('users.create') }}">
    <i class="bi bi-card-list"></i>
    <span>Register</span>
    </a>
</li><!-- End Register Page Nav -->

<li class="nav-item">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
        @csrf
        <button class="w-100 btn btn-outline-danger">Sign Out</button>
    </form>
</li><!-- End Login Page Nav -->

</ul>
@endsection