<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TasteBites | Food Order & Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/user.css'])
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
                <span class="brand-mark"><i class="fas fa-utensils"></i></span>
                TasteBites
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('menu*') ? 'active' : '' }}" href="/menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#booking">Booking</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn cart-button position-relative" href="{{ url('/cart') }}">
                            <i class="fas fa-shopping-cart"></i>
                            Cart
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill cart-badge">
                                0
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="page-shell">
        @yield('content')
    </main>

    <div class="modal fade" id="confirmCartModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Add <strong id="pendingItemName"></strong> to your cart?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Not Now</button>
                    <button type="button" class="btn btn-primary" id="finalConfirmBtn">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md">
                    <div class="navbar-brand fw-bold mb-2">
                        <span class="brand-mark"><i class="fas fa-utensils"></i></span>
                        TasteBites
                    </div>
                    <p class="mb-0">Fresh meals, easy booking, and warm service every day.</p>
                </div>
                <div class="col-md-auto">
                    <div class="d-flex gap-2">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-top border-secondary mt-4 pt-4 small">
                &copy; 2026 TasteBites. All rights reserved.
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let pendingMenuEntry = null;

        function addToCart(menu) {
            pendingMenuEntry = menu;

            document.getElementById('pendingItemName').innerText = menu.title;

            const myModal = new bootstrap.Modal(document.getElementById('confirmCartModal'));
            myModal.show();
        }

        document.getElementById('finalConfirmBtn').addEventListener('click', function() {
            if (!pendingMenuEntry) return;

            let cart = [];
            try {
                const savedCart = localStorage.getItem("cart");
                cart = (savedCart && JSON.parse(savedCart) instanceof Array) ? JSON.parse(savedCart) : [];
            } catch (e) {
                cart = [];
            }

            const addonKey = (pendingMenuEntry.selected_addons || [])
                .map(addon => addon.id)
                .sort()
                .join('-');
            const entryKey = pendingMenuEntry.cart_key || `${pendingMenuEntry.id || pendingMenuEntry.title}:${addonKey}`;
            let findItem = cart.find(item => {
                if (item.cart_key) {
                    return item.cart_key === entryKey;
                }

                return !addonKey && item.title === pendingMenuEntry.title;
            });

            if (findItem) {
                findItem.qty++;
            } else {
                cart.push({
                    ...pendingMenuEntry,
                    cart_key: entryKey,
                    qty: 1
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartBadge();

            const modalElement = document.getElementById('confirmCartModal');
            const modalInstance = bootstrap.Modal.getInstance(modalElement);
            modalInstance.hide();

            pendingMenuEntry = null;
        });

        function loadData() {
            let tbody = document.getElementById('cart-items');
            if (!tbody) return;

            let cart = JSON.parse(localStorage.getItem("cart")) || [];

            tbody.innerHTML = "";
            let total_all = 0;

            if (cart.length === 0) {
                tbody.innerHTML = `<tr><td colspan="5" class="text-center py-5"><h4 class="mb-2">Your cart is empty</h4><p class="text-muted mb-0">Add something tasty from the menu to get started.</p></td></tr>`;
                document.querySelector('#check_total').textContent = "0 MMK";
                document.querySelector('#total-all').value = 0;
            } else {
                cart.forEach((item, index) => {
                    const total_each = item.price * item.qty;
                    total_all += total_each;

                    const addonList = (item.selected_addons || []).map(addon => addon.name).join(', ');

                    tbody.innerHTML += `
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <img src="/storage/images/${item.image}" class="cart-item-img me-3" alt="${item.title}">
                  <div>
                    <span class="fw-bold d-block">${item.title}</span>
                    ${addonList ? `<small class="text-muted">Addons: ${addonList}</small>` : ''}
                  </div>
                  <input type="hidden" value="${item.id}" name="pro_id[]">
                </div>
              </td>
              <td>${item.price} MMK</td>
              <td>
                <div class="qty-control">
                  <button type="button" onclick="changeQty('decrease', ${index})" class="btn btn-sm btn-outline-dark">-</button>
                  <input name="qty[]" type="text" class="form-control text-center" value="${item.qty}" readonly>
                  <button type="button" onclick="changeQty('increase', ${index})" class="btn btn-sm btn-outline-dark">+</button>
                </div>
              </td>
              <td class="fw-bold">${total_each.toLocaleString()} MMK</td>
              <td>
                <button type="button" onclick="removeItem(${index})" class="btn btn-outline-dark btn-sm" aria-label="Remove ${item.title}">
                    <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>`;
                });

                document.querySelector('#check_total').textContent = total_all.toLocaleString() + " MMK";
                document.querySelector('#total-all').value = total_all;
            }
        }

        document.addEventListener("DOMContentLoaded", loadData);

        function changeQty(action, index) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            if (action === 'increase') {
                cart[index].qty++;
            } else if (action === 'decrease' && cart[index].qty > 1) {
                cart[index].qty--;
            }
            localStorage.setItem('cart', JSON.stringify(cart));
            loadData();
            updateCartBadge();
        }

        function removeItem(index) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            loadData();
            updateCartBadge();
        }

        function filterMenu() {
            const searchInput = document.getElementById('searchInput');
            const menuItems = document.querySelectorAll('.menu-item');
            if (!searchInput || !menuItems.length) return;

            const query = searchInput.value.trim().toLowerCase();

            menuItems.forEach(item => {
                const title = item.dataset.title || '';
                const detail = item.dataset.detail || '';
                item.classList.toggle('d-none', query && !title.includes(query) && !detail.includes(query));
            });
        }

        function updateCartBadge() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
            const badge = document.querySelector('.cart-badge');
            if (badge) {
                badge.textContent = totalItems;
            }
        }

        document.addEventListener("DOMContentLoaded", updateCartBadge);
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                searchInput.addEventListener('input', filterMenu);
                searchInput.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        filterMenu();
                    }
                });
            }
        });

        const orderFormButton = document.getElementById('orderForm');
        if (orderFormButton) {
            orderFormButton.addEventListener('click', function(e) {
                const cartArray = JSON.parse(localStorage.getItem('cart')) || [];

                if (cartArray.length === 0) {
                    e.preventDefault();
                    alert('Your cart is empty!');
                    return;
                }

                document.getElementById('cart_data').value = JSON.stringify(cartArray);
                localStorage.setItem('cart', JSON.stringify([]));
                loadData();
                updateCartBadge();
            });
        }
    </script>
</body>

</html>
