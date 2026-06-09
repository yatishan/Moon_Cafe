@extends('user.layout.master')
@section('content')
    <section class="cart-page">
        <div class="container">
            <div class="row g-4 g-lg-5">
                <div class="col-lg-8">
                    <span class="eyebrow text-danger"><i class="fas fa-credit-card"></i> Secure checkout</span>
                    <h1 class="display-6 fw-bold mb-4">Delivery and Payment</h1>

                    <form action="/store" method="POST">
                        <div class="card border-0 mb-4">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4"><i class="fas fa-truck-fast me-2 text-danger"></i>Delivery Information</h5>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" placeholder="Aung Aung" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" placeholder="09xxxxxxxxx" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" rows="3" placeholder="Street, Township, City" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4"><i class="fas fa-wallet me-2 text-danger"></i>Payment Method</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="radio" class="btn-check" name="payment_method" id="kpay" value="kpay" checked autocomplete="off">
                                        <label class="card payment-card p-3 w-100" for="kpay">
                                            <div class="d-flex align-items-center">
                                                <img src="https://play-lh.googleusercontent.com/cnKJYzzHFAE5ZRepCsGVhv7ZnoDfK8Wu5z6lMefeT-45fTNfUblK_gF3JyW5VZsjFc4" class="payment-logo me-3" alt="KPay">
                                                <div>
                                                    <h6 class="mb-0 fw-bold">KBZ Pay</h6>
                                                    <small class="text-muted">Fast and secure</small>
                                                </div>
                                            </div>
                                        </label>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="radio" class="btn-check" name="payment_method" id="wave" value="wave" autocomplete="off">
                                        <label class="card payment-card p-3 w-100" for="wave">
                                            <div class="d-flex align-items-center">
                                                <img src="https://play-lh.googleusercontent.com/rPq4GMCZy12WhwTlanEu7RzxihYCgYevQHVHLNha1VcY5SU1uLKHMd060b4VEV1r-OQ=w240-h480-rw" class="payment-logo me-3" alt="Wave Pay">
                                                <div>
                                                    <h6 class="mb-0 fw-bold">Wave Pay</h6>
                                                    <small class="text-muted">Digital wallet</small>
                                                </div>
                                            </div>
                                        </label>
                                    </div>

                                    <div class="col-12">
                                        <input type="radio" class="btn-check" name="payment_method" id="cod" value="cod" autocomplete="off">
                                        <label class="card payment-card p-3 w-100" for="cod">
                                            <div class="d-flex align-items-center">
                                                <span class="brand-mark me-3"><i class="fas fa-money-bill-wave"></i></span>
                                                <div>
                                                    <h6 class="mb-0 fw-bold">Cash on Delivery</h6>
                                                    <small class="text-muted">Pay when you receive your order</small>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-warning btn-lg w-100 mt-4 py-3" type="submit">Place Order Now</button>
                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 sticky-lg-top" style="top: 104px;">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Order Summary</h5>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Subtotal</span>
                                <span class="fw-bold">50,000 MMK</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Delivery Fee</span>
                                <span class="fw-bold">2,000 MMK</span>
                            </div>
                            <div class="d-flex justify-content-between pt-3 border-top">
                                <div>
                                    <strong>Total amount</strong>
                                    <p class="mb-0 small text-muted">Including VAT</p>
                                </div>
                                <span class="fs-5 fw-bold text-danger">52,000 MMK</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
