@extends('user.layout.master')
@section('content')
    <section class="cart-page">
        <div class="container">
            <div class="row align-items-end mb-4 g-3">
                <div class="col-lg">
                    <span class="eyebrow text-danger"><i class="fas fa-shopping-basket"></i> Review your order</span>
                    <h1 class="display-6 fw-bold mb-2">Shopping Cart</h1>
                    <p class="section-copy mb-0">Adjust quantities and place your order when everything looks right.</p>
                </div>
                <div class="col-lg-auto">
                    <a href="/menu" class="btn btn-outline-dark px-4">Continue Shopping</a>
                </div>
            </div>

            <div class="cart-table-wrap table-responsive">
                <table class="table cart-table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="cart-items"></tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end my-5">
                <div class="summary-box p-4">
                    <div class="d-flex justify-content-between align-items-center pb-3 mb-3 border-bottom">
                        <span class="text-muted fw-bold">Total Amount</span>
                        <span class="fs-5 fw-bold" id="check_total"></span>
                        <input type="hidden" name="total" id="total-all">
                    </div>
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="cart_data" id="cart_data" value="">
                        <button id="orderForm" class="btn btn-warning w-100 py-3">
                            <i class="fas fa-bag-shopping me-2"></i>Order Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
