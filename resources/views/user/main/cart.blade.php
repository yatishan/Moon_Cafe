@extends('user.layout.master')
@section('content')
<div class="container" onload="loadData()">
    <h5 class="my-5 text-center">Shopping Cart</h5>
    <form action="" method="post">
    <table class="table" border="1">
      <thead class="table-danger"  style="background-color: pink;">
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
    <div action="" method="post" class="d-flex justify-content-end my-5">
        <div style="width: 300px; border: 1px solid pink; background-color:#F6F6F6;">
        <div class="d-flex justify-content-between px-3 pt-3" style="border-bottom: 1px solid pink; ">
            <p>Total Amount</p>
            <p id="check_total"></p>
            <input type="hidden" name="total" id="total-all">
        </div>
        <input type="submit" name="order" value="Order Now" class="home-btn text-white float-end my-3 me-3">
        </div>
    </div>
    </form>
</div>

@endsection

