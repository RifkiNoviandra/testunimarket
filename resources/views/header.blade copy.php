<?php

use App\Http\Controllers\ProductController;

$total = 0;
if (session()->has('user')) {
    $total = ProductController::cartItems();
}
?>

<nav class="navbar navbar-expand-lg bg-light py-3 shadow-sm">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <span class="fs-4 fw-bold text-primary">Uni</span><span class="fs-4 fw-bold">Market</span>
        </a>

        <!-- Search Bar -->
        <form class="d-flex flex-grow-1 mx-3">
            <input class="form-control me-2" type="search" placeholder="Cari di UniMarket..." aria-label="Search">
            <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
        </form>

        <!-- Icons and My Account -->
        <div class="d-flex align-items-center">
            <div class="me-3">
                <a href="#" class="text-dark"><i class="bi bi-grid fs-5"></i></a>
            </div>
            <div class="me-3 position-relative">
                <a href="#" class="text-dark"><i class="bi bi-bag fs-5"></i></a>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    1
                </span>
            </div>
            <a href="#" class="btn btn-primary text-white">My Account</a>
        </div>
    </div>
</nav>

<!-- Navbar Links -->
<div class="bg-light py-2 shadow-sm">
    <div class="container d-flex justify-content-between">
        <div class="d-flex">
            <a href="#" class="text-dark text-decoration-none mx-3">All Categories</a>
            <a href="#" class="text-dark text-decoration-none mx-3">Lukisan</a>
            <a href="#" class="text-dark text-decoration-none mx-3">Desain Interior</a>
            <a href="#" class="text-dark text-decoration-none mx-3">Fashion</a>
        </div>
        <a href="#" class="text-primary text-decoration-none mx-3">HOT DEALS</a>
    </div>
</div>