<?php

use App\Http\Controllers\ProductController;

$total = 0;
if (session()->has('user')) {
    $total = ProductController::cartItems();
}
?>


<nav class="navbar sticky-top navbar-expand-lg bg-white mb-1">
    <div class="container-fluid px-5">
        <a class="navbar-brand me-0" href="/"><img src="{{ url('img/UniMarket Logo.png') }}" alt=""></a>
        <div class="input-group ms-3 w-50">
            <input class="form-control border-end-0 rounded-start py-4" type="search" placeholder="Cari di UniMarket..."
                aria-label="Search" style="background-color: #F1F1F1">
            <span class="input-group-text bg-white border-start-0 rounded-end py-4"
                style="background-color: #F1F1F1!important"><i class="fa-solid fa-magnifying-glass"
                    style="background-color: #F1F1F1"></i></span>
        </div>
        <div class="d-flex align-items-center">
            <div class="me-4">
                <a href="#" class="text-dark"><i class="fa-solid fa-border-all fs-5"></i></a>
            </div>
            <div class="me-4 ms-3 position-relative">
                <a href="#" class="text-dark"><i class="fa-solid fa-cart-shopping fs-5"></i></a>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    1
                </span>
            </div>
        </div>
        {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/orders">Orders</a>
                </li>
                <form action="/search" class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" name="query"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </ul> --}}


        <ul class="nav navbar-nav navbar-right">

            {{-- Dropdown start here --}}
            @if (session()->has('user'))
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <button class="btn btn-primary dropdown-toggle d-flex align-items-center"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-user fs-5 me-4"></i>
                                {{ session()->get('user')['name'] }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @if (session()->get('user')['role_id'] == 1)
                                    <li><a class="dropdown-item"
                                            href="{{ route('organize', session()->get('user')['id']) }}">My
                                            Items</a></li>
                                @endif
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            @else
                <a class="nav-link" href="/login">Login</a>
                <a class="nav-link" href="/register">Register</a>
            @endif
            {{-- Dropdown ends here --}}

        </ul>


    </div>
    </div>
</nav>
