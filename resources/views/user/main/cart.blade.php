@extends('user.layout.master')
@section('content')
    <div class="container">
        <h5 class="my-5 text-center">Shopping Cart</h5>
        <div>
            <table class="table" border="1">
                <thead class="table-danger" style="background-color: pink;">
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody id="cart-items">
                    <!-- Example Product Row -->

                    <!-- Add more products dynamically here -->
                </tbody>
            </table>
            <div action="" class="d-flex justify-content-end my-5">
                <div style="width: 300px; border: 1px solid pink; background-color:#F6F6F6;">
                    <div class="d-flex justify-content-between px-3 pt-3" style="border-bottom: 1px solid pink; ">
                        <p>Total Amount</p>
                        <p id="check_total"></p>
                        <input type="hidden" name="total" id="total-all">
                    </div>
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="cart_data" id="cart_data" value="">

                        <button id="orderForm" class="btn btn-warning m-2">Order Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
