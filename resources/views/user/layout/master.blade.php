<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TasteBites | Food Order & Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/user.css'])
    <style>

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-warning" href="#"><i class="fas fa-utensils me-2"></i>TasteBites</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#booking">Booking</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-warning position-relative" href="/cart">
                            <i class="fas fa-shopping-cart"></i> Cart
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                2
                                <span class="visually-hidden">items in cart</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div>
    @yield('content')
    </div>

    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <div class="mb-3">
                <a href="#" class="text-white me-3 text-decoration-none"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3 text-decoration-none"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white text-decoration-none"><i class="fab fa-twitter"></i></a>
            </div>
            <p class="mb-0">&copy; 2026 TasteBites. All rights reserved.</p>
        </div>
    </footer>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 <script>
    function addToCart(menu) {
    let cart = [];

    try {
        // Get the data and attempt to parse it
        const savedCart = localStorage.getItem("cart");
        cart = savedCart ? JSON.parse(savedCart) : [];

        // If for some reason the data isn't an array, reset it
        if (!Array.isArray(cart)) cart = [];
    } catch (e) {
        // If parsing fails (the error you saw), reset to empty array
        console.error("Cart corrupted, resetting...", e);
        cart = [];
    }

    // Logic to find/add item
    let findItem = cart.find(item => item.title === menu.title);

    if (findItem) {
        findItem.qty++;
    } else {
        cart.push({ ...menu, qty: 1 });
    }

    // CRITICAL: Always stringify before saving!
    localStorage.setItem('cart', JSON.stringify(cart));

    console.log("Cart updated:", cart);
}

function loadData() {
    let tbody = document.getElementById('cart-items'); // Use ID for better selection
    if (!tbody) return; // Prevent errors if not on the cart page

    // 1. Fetch the data from localStorage (The 'bag' vs 'cart' fix)
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    tbody.innerHTML = "";
    let total_all = 0;

    if (cart.length === 0) {
        tbody.innerHTML = `<tr><td colspan="5" class="text-center my-5"><h3>Empty cart...</h3></td></tr>`;
        document.querySelector('#check_total').textContent = "0 MMK";
    } else {
        cart.forEach((item, index) => {
            const total_each = item.price * item.qty;
            total_all += total_each;

            tbody.innerHTML += `
            <tr style="background-color: #F6F6F6;">
              <td>
                <div class="d-flex align-items-center">
                  <img src="/storage/images/${item.image}" class="img-thumbnail me-3" style="width: 80px;" alt="${item.title}">
                  <span>${item.title}</span>
                  <input type="hidden" value="${item.id}" name="pro_id[]">
                </div>
              </td>
              <td>${item.price} MMK</td>
              <td>
                <div class="d-flex align-items-center">
                  <button type="button" onclick="changeQty('decrease', ${index})" class="btn btn-sm btn-outline-secondary">-</button>
                  <input name="qty[]" type="text" class="form-control text-center mx-2" style="width: 60px;" value="${item.qty}" readonly>
                  <button type="button" onclick="changeQty('increase', ${index})" class="btn btn-sm btn-outline-secondary">+</button>
                </div>
              </td>
              <td>${total_each.toLocaleString()} MMK</td>
              <td>
                <button type="button" onclick="removeItem(${index})" class="btn btn-danger btn-sm">Delete</button>
              </td>
            </tr>`;
        });

        document.querySelector('#check_total').textContent = total_all.toLocaleString() + " MMK";
        document.querySelector('#total-all').value = total_all;
    }
}

// 2. Trigger the load
document.addEventListener("DOMContentLoaded", loadData);

function changeQty(action, index) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    if (action === 'increase') {
        cart[index].qty++;
    } else if (action === 'decrease' && cart[index].qty > 1) {
        cart[index].qty--;
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    loadData(); // Refresh the table
}

function removeItem(index) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart.splice(index, 1); // Remove item at this index
    localStorage.setItem('cart', JSON.stringify(cart));
    loadData(); // Refresh the table
    updateCartBadge(); // Update the navbar number
}

function updateCartBadge() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
    const badge = document.querySelector('.badge');
    if (badge) {
        badge.textContent = totalItems;
    }
}

// Call this on every page load
document.addEventListener("DOMContentLoaded", updateCartBadge);

 </script>
</body>
</html>

