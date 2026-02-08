@extends('user.layout.master')
@section('content')
<section id="home" class="hero-section text-center">
        <div class="container">
            <h1 class="display-3 fw-bold mb-4">Delicious Food, <br> Delivered To You</h1>
            <p class="lead mb-5">Fresh ingredients, tasty meals, and the fastest delivery in town.</p>
            <a href="#menu" class="btn btn-warning btn-lg me-3 text-dark fw-bold">Order Now</a>
            <a href="#booking" class="btn btn-outline-light btn-lg fw-bold">Book a Table</a>
        </div>
    </section>

    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?auto=format&fit=crop&w=800&q=80" class="img-fluid rounded shadow" alt="Restaurant Interior">
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <h2 class="section-title text-start mx-0">About Us</h2>
                    <p class="lead">We believe in the joy of eating together.</p>
                    <p>Founded in 2020, TasteBites brings the finest culinary experiences right to your doorstep. Our chefs use only the freshest locally sourced ingredients to create magic on a plate.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-warning me-2"></i> Fresh Ingredients</li>
                        <li><i class="fas fa-check text-warning me-2"></i> Expert Chefs</li>
                        <li><i class="fas fa-check text-warning me-2"></i> 24/7 Support</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="menu" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center section-title">Popular Menu</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Burger">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title mb-0">Classic Burger</h5>
                                <span class="badge bg-warning text-dark">$12.99</span>
                            </div>
                            <p class="card-text text-muted">Juicy beef patty with fresh lettuce, tomatoes, and our secret sauce.</p>
                            <button class="btn btn-outline-dark w-100">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="https://images.unsplash.com/photo-1574071318508-1cdbab80d002?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Pizza">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title mb-0">Margherita Pizza</h5>
                                <span class="badge bg-warning text-dark">$15.50</span>
                            </div>
                            <p class="card-text text-muted">Authentic Italian dough topped with mozzarella and basil.</p>
                            <button class="btn btn-outline-dark w-100">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Salad">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title mb-0">Greek Salad</h5>
                                <span class="badge bg-warning text-dark">$10.00</span>
                            </div>
                            <p class="card-text text-muted">Healthy greens, olives, feta cheese, and olive oil dressing.</p>
                            <button class="btn btn-outline-dark w-100">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="#" class="btn btn-dark">View Full Menu</a>
            </div>
        </div>
    </section>

    <section id="booking" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow border-0">
                        <div class="card-body p-5">
                            <h2 class="text-center mb-4">Book A Table</h2>
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Your Name</label>
                                        <input type="text" class="form-control" placeholder="John Doe">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" placeholder="+1 234 567 890">
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
                                        <button type="submit" class="btn btn-warning w-100 text-dark fw-bold">Confirm Booking</button>
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
