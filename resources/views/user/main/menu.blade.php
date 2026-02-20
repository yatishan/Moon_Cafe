@extends('user.layout.master')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-warning" href="index.html"><i class="fas fa-utensils me-2"></i>TasteBites</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.html#about">About</a></li>
                    <li class="nav-item"><a class="nav-link active text-warning" href="#">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.html#booking">Booking</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-warning position-relative" href="#">
                            <i class="fas fa-shopping-cart"></i> Cart
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">2</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="bg-white py-5 shadow-sm">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-4">Our Full Menu</h2>

                    <div class="input-group mb-4">
                        <input type="text" class="form-control form-control-lg border-2" id="searchInput" placeholder="Search for food (e.g. 'Pizza', 'Burger')...">
                        <button class="btn btn-warning px-4 fw-bold" type="button" onclick="filterMenu()"><i class="fas fa-search"></i> Search</button>
                    </div>

                    <div class="d-flex flex-wrap justify-content-center gap-2" id="category-filters">
                        <a href="/menu">
                            <button class="btn btn-outline-dark rounded-pill px-4 category-btn active" >All</button>
                        </a>
                        @foreach ($categories as $cat)
                        <a href="{{ url('/menu',$cat->id) }}">
                             <button class="btn btn-outline-dark rounded-pill px-4 category-btn" >{{ $cat->title }}</button>
                        </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="menu-container">
                @foreach ($menus as $menu)
                <div class="col menu-item" data-category="burger">
                    <div class="card h-100 border-0 shadow-sm food-card">
                        <img src="{{ asset('storage/images/' . $menu->image) }}" class="card-img-top" alt="Classic Burger">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title fw-bold">{{ $menu->title }}</h5>
                                <span class="text-warning fw-bold">{{ $menu->price }}</span>
                            </div>
                            <p class="card-text text-muted small">J{{ $menu->detail }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-warning"><i class="fas fa-star"></i> 4.8</span>
                                <button class="btn btn-sm btn-dark rounded-pill px-3">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @endsection
