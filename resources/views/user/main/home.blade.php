@extends('user.layout.master')
@section('content')
    <section id="home" class="hero-section">
        <div class="container">
            <div class="hero-copy">
                <span class="eyebrow"><i class="fas fa-fire"></i> Fresh daily in Yangon</span>
                <h1 class="mb-4">Delicious food, delivered with care.</h1>
                <p class="lead mb-5">Order chef-made favorites, reserve a table, and enjoy warm restaurant service without the wait.</p>
                <div class="hero-actions">
                    <a href="/menu" class="btn btn-warning btn-lg px-4">Order Now</a>
                    <a href="#booking" class="btn btn-outline-light btn-lg px-4">Book a Table</a>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="section-block">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?auto=format&fit=crop&w=900&q=80" class="media-rounded" alt="Restaurant interior">
                </div>
                <div class="col-lg-6">
                    <span class="eyebrow text-danger"><i class="fas fa-heart"></i> About TasteBites</span>
                    <h2 class="section-title display-6">Made for good meals and easy moments.</h2>
                    <p class="section-copy mb-4">Founded in 2020, TasteBites brings fresh ingredients, thoughtful cooking, and simple ordering together for busy days and special nights.</p>
                    <ul class="list-unstyled feature-list mb-0">
                        <li><i class="fas fa-check"></i> Fresh local ingredients prepared every day</li>
                        <li><i class="fas fa-check"></i> Signature dishes from experienced chefs</li>
                        <li><i class="fas fa-check"></i> Easy ordering, booking, and friendly support</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="menu" class="section-block section-muted">
        <div class="container">
            <div class="row align-items-end mb-4 g-3">
                <div class="col-lg-7">
                    <span class="eyebrow text-danger"><i class="fas fa-star"></i> Customer favorites</span>
                    <h2 class="section-title display-6 mb-0">Popular Menu</h2>
                </div>
                <div class="col-lg text-lg-end">
                    <a href="/menu" class="btn btn-outline-dark px-4">View Full Menu</a>
                </div>
            </div>
            <div class="row g-4">
                @forelse ($menus->take(3) as $menu)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 food-card">
                            <img src="{{ asset('storage/images/' . $menu->image) }}" class="card-img-top" alt="{{ $menu->title }}">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
                                    <h5 class="card-title fw-bold mb-0">{{ $menu->title }}</h5>
                                    <span class="price-pill">{{ number_format($menu->price) }} MMK</span>
                                </div>
                                <p class="card-text text-muted">{{ $menu->detail }}</p>
                                <div class="d-flex gap-2 mt-2">
                                    <a href="{{ route('menu.detail', $menu->id) }}" class="btn btn-outline-dark flex-fill">Detail</a>
                                    <button class="btn btn-dark flex-fill" onclick="addToCart({{ json_encode($menu) }})">
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
                                <h5 class="fw-bold">Menu items are coming soon.</h5>
                                <p class="text-muted mb-0">Please check back after the kitchen updates the menu.</p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="booking" class="section-block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card booking-panel border-0">
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-4">
                                <span class="eyebrow text-danger"><i class="fas fa-calendar-check"></i> Reserve a seat</span>
                                <h2 class="section-title mb-2">Book a Table</h2>
                                <p class="section-copy mb-0">Choose your date, bring your people, and we will prepare the table.</p>
                            </div>
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Your Name</label>
                                        <input type="text" class="form-control" placeholder="John Doe">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" placeholder="+95 9 123 456 789">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Date</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Guests</label>
                                        <select class="form-select">
                                            <option>2 People</option>
                                            <option>3 People</option>
                                            <option>4 People</option>
                                            <option>5+ People</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <button type="submit" class="btn btn-warning w-100 py-3">Confirm Booking</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
