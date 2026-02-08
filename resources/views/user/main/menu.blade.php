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
                    <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
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
                        <button class="btn btn-outline-dark rounded-pill px-4 category-btn active" onclick="filterCategory('all')">All</button>
                        <button class="btn btn-outline-dark rounded-pill px-4 category-btn" onclick="filterCategory('burger')">Burgers</button>
                        <button class="btn btn-outline-dark rounded-pill px-4 category-btn" onclick="filterCategory('pizza')">Pizza</button>
                        <button class="btn btn-outline-dark rounded-pill px-4 category-btn" onclick="filterCategory('pasta')">Pasta</button>
                        <button class="btn btn-outline-dark rounded-pill px-4 category-btn" onclick="filterCategory('drinks')">Drinks</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="menu-container">

                <div class="col menu-item" data-category="burger">
                    <div class="card h-100 border-0 shadow-sm food-card">
                        <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Classic Burger">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title fw-bold">Classic Burger</h5>
                                <span class="text-warning fw-bold">$12.99</span>
                            </div>
                            <p class="card-text text-muted small">Juicy beef patty with fresh lettuce, tomatoes, and house sauce.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-warning"><i class="fas fa-star"></i> 4.8</span>
                                <button class="btn btn-sm btn-dark rounded-pill px-3">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col menu-item" data-category="pizza">
                    <div class="card h-100 border-0 shadow-sm food-card">
                        <img src="https://images.unsplash.com/photo-1574071318508-1cdbab80d002?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Margherita Pizza">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title fw-bold">Margherita Pizza</h5>
                                <span class="text-warning fw-bold">$15.50</span>
                            </div>
                            <p class="card-text text-muted small">Traditional Italian dough with tomato sauce and mozzarella.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-warning"><i class="fas fa-star"></i> 4.9</span>
                                <button class="btn btn-sm btn-dark rounded-pill px-3">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col menu-item" data-category="pasta">
                    <div class="card h-100 border-0 shadow-sm food-card">
                        <img src="https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Carbonara">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title fw-bold">Pasta Carbonara</h5>
                                <span class="text-warning fw-bold">$14.00</span>
                            </div>
                            <p class="card-text text-muted small">Creamy sauce with pancetta, egg, and parmesan cheese.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-warning"><i class="fas fa-star"></i> 4.7</span>
                                <button class="btn btn-sm btn-dark rounded-pill px-3">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col menu-item" data-category="burger">
                    <div class="card h-100 border-0 shadow-sm food-card">
                        <img src="https://images.unsplash.com/photo-1594212699903-ec8a3eca50f5?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Chicken Burger">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title fw-bold">Crispy Chicken</h5>
                                <span class="text-warning fw-bold">$11.50</span>
                            </div>
                            <p class="card-text text-muted small">Fried chicken breast with coleslaw and spicy mayo.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-warning"><i class="fas fa-star"></i> 4.5</span>
                                <button class="btn btn-sm btn-dark rounded-pill px-3">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col menu-item" data-category="drinks">
                    <div class="card h-100 border-0 shadow-sm food-card">
                        <img src="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Lemonade">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title fw-bold">Fresh Lemonade</h5>
                                <span class="text-warning fw-bold">$5.00</span>
                            </div>
                            <p class="card-text text-muted small">Freshly squeezed lemons with mint and ice.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-warning"><i class="fas fa-star"></i> 4.9</span>
                                <button class="btn btn-sm btn-dark rounded-pill px-3">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col menu-item" data-category="pizza">
                    <div class="card h-100 border-0 shadow-sm food-card">
                        <img src="https://images.unsplash.com/photo-1628840042765-356cda07504e?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Pepperoni Pizza">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title fw-bold">Pepperoni Pizza</h5>
                                <span class="text-warning fw-bold">$16.00</span>
                            </div>
                            <p class="card-text text-muted small">Loaded with spicy pepperoni slices and extra cheese.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-warning"><i class="fas fa-star"></i> 4.8</span>
                                <button class="btn btn-sm btn-dark rounded-pill px-3">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @endsection
