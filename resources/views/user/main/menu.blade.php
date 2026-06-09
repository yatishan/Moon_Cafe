@extends('user.layout.master')
@section('content')
    <section class="menu-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-9">
                    <span class="eyebrow text-danger"><i class="fas fa-utensils"></i> Explore the kitchen</span>
                    <h1 class="display-5 fw-bold mb-3">Our Full Menu</h1>
                    <p class="section-copy mb-4">Search your craving or filter by category to find your next plate.</p>

                    <div class="search-panel mb-4">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" id="searchInput"
                                placeholder="Search for food, for example Pizza or Burger">
                            <button class="btn btn-warning px-4" type="button" onclick="filterMenu()">
                                <i class="fas fa-search me-2"></i>Search
                            </button>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap justify-content-center gap-2" id="category-filters">
                        <a href="/menu" class="text-decoration-none">
                            <button
                                class="btn rounded-pill px-4 category-btn {{ request()->is('menu') ? 'active' : '' }}">All</button>
                        </a>
                        @foreach ($categories as $cat)
                            <a href="{{ url('/menu', $cat->id) }}" class="text-decoration-none">
                                <button
                                    class="btn rounded-pill px-4 category-btn {{ request()->segment(2) == $cat->id ? 'active' : '' }}">{{ $cat->title }}</button>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-block">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="menu-container">
                @forelse ($menus as $menu)
                    <div class="col menu-item" data-title="{{ strtolower((string) $menu->title) }}"
                        data-detail="{{ strtolower((string) $menu->detail) }}">
                        <div class="card h-100 border-0 food-card">
                            <img src="{{ asset('storage/images/' . $menu->image) }}" class="card-img-top"
                                alt="{{ $menu->title }}">
                            <div class="card-body p-4 d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
                                    <h5 class="card-title fw-bold mb-0">{{ $menu->title }}</h5>
                                    <span class="price-pill">{{ number_format($menu->price) }} MMK</span>
                                </div>
                                <p class="card-text text-muted flex-grow-1">{{ $menu->detail }}</p>
                                <div class="d-flex justify-content-between align-items-center gap-3 mt-3">
                                    <span class="rating-pill"><i class="fas fa-star"></i> 4.8</span>
                                    <a href="{{ route('menu.detail', $menu->id) }}"
                                        class="btn btn-outline-dark px-3">Detail</a>
                                    <button class="btn btn-dark px-3"
                                        onclick="addToCart({{ json_encode(array_merge($menu->toArray(), ['selected_addons' => []])) }})">
                                        <i class="fas fa-plus me-2"></i>Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body text-center p-5">
                                <h5 class="fw-bold">No menu items found.</h5>
                                <p class="text-muted mb-0">Try another category or come back after the menu is updated.</p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
