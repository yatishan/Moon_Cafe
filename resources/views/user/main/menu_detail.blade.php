@extends('user.layout.master')
@section('content')
    <section class="menu-detail-hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img src="{{ asset('storage/images/' . $menu->image) }}" class="menu-detail-image"
                        alt="{{ $menu->title }}">
                </div>
                <div class="col-lg-6">
                    <a href="/menu" class="btn btn-outline-dark mb-4">
                        <i class="fas fa-arrow-left me-2"></i>Back to Menu
                    </a>
                    <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                        @if ($menu->category)
                            <span class="detail-chip">{{ $menu->category->title }}</span>
                        @endif
                        <span class="rating-pill"><i class="fas fa-star"></i> 4.8</span>
                    </div>
                    <h1 class="display-5 fw-bold mb-3">{{ $menu->title }}</h1>
                    <p class="section-copy mb-4">{{ $menu->detail }}</p>
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <span class="detail-price">{{ number_format($menu->price) }} MMK</span>
                        <button class="btn btn-warning px-4" type="button" onclick="addConfiguredMenuToCart()">
                            <i class="fas fa-cart-plus me-2"></i>Add Selection
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-block">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-end justify-content-between gap-3 mb-4">
                        <div>
                            <span class="eyebrow text-danger"><i class="fas fa-layer-group"></i> Customize</span>
                            <h2 class="section-title mb-0">Addon Categories</h2>
                        </div>
                    </div>

                    @forelse ($menuAddonCategories as $menuAddonCategory)
                            <div class="addon-group mb-4">
                                <div class="addon-group-header">
                                    <div>
                                        <h5 class="fw-bold mb-1">{{ $menuAddonCategory->addon_category->name }}</h5>
                                        <p class="text-muted mb-0">{{ $menuAddonCategory->addon_category->detail }}</p>
                                    </div>
                                    <span class="detail-chip">{{ $menuAddonCategory->addon_category->addons->count() }} addons</span>
                                </div>

                                <div class="row g-3 mt-1">
                                    @forelse ($menuAddonCategory->addon_category->addons as $addon)
                                        <div class="col-md-6">
                                            <label class="addon-option">
                                                <input class="form-check-input addon-checkbox" type="checkbox"
                                                    value="{{ $addon->id }}" data-name="{{ $addon->name }}"
                                                    data-price="{{ $addon->price }}">
                                                <span>
                                                    <strong>{{ $addon->name }}</strong>
                                                    <small>+ {{ number_format($addon->price) }} MMK</small>
                                                </span>
                                            </label>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <div class="empty-addon">No addons in this category yet.</div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                    @empty
                        <div class="card border-0">
                            <div class="card-body p-5 text-center">
                                <h5 class="fw-bold">No addon categories assigned.</h5>
                                <p class="text-muted mb-0">This menu item can be ordered as-is.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <div class="col-lg-4">
                    <div class="summary-box p-4 sticky-lg-top" style="top: 104px;">
                        <h5 class="fw-bold mb-4">Your Selection</h5>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Base price</span>
                            <span class="fw-bold">{{ number_format($menu->price) }} MMK</span>
                        </div>
                        <div class="selected-addon-list mb-3" id="selectedAddonList">
                            <span class="text-muted">No addons selected</span>
                        </div>
                        <div class="d-flex justify-content-between pt-3 border-top">
                            <strong>Total</strong>
                            <strong class="text-danger" id="detailTotal">{{ number_format($menu->price) }} MMK</strong>
                        </div>
                        <button class="btn btn-warning w-100 mt-4 py-3" type="button" onclick="addConfiguredMenuToCart()">
                            <i class="fas fa-cart-plus me-2"></i>Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            @if ($relatedMenus->isNotEmpty())
                <div class="mt-5 pt-4">
                    <h3 class="section-title mb-4">More Like This</h3>
                    <div class="row g-4">
                        @foreach ($relatedMenus as $relatedMenu)
                            <div class="col-md-4">
                                <div class="card h-100 border-0 food-card">
                                    <img src="{{ asset('storage/images/' . $relatedMenu->image) }}" class="card-img-top"
                                        alt="{{ $relatedMenu->title }}">
                                    <div class="card-body p-4">
                                        <h5 class="fw-bold">{{ $relatedMenu->title }}</h5>
                                        <p class="text-muted">
                                            {{ \Illuminate\Support\Str::limit($relatedMenu->detail, 80) }}</p>
                                        <a href="{{ route('menu.detail', $relatedMenu->id) }}"
                                            class="btn btn-outline-dark w-100">View Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

    <script>
        const detailMenu = @json($menu);
        const baseMenuPrice = Number(detailMenu.price || 0);
        console.log(detailMenu);

        function getSelectedAddons() {
            return Array.from(document.querySelectorAll('.addon-checkbox:checked')).map(addon => ({
                id: addon.value,
                name: addon.dataset.name,
                price: Number(addon.dataset.price || 0)
            }));
        }


        function updateDetailTotal() {
            const selectedAddons = getSelectedAddons();
            const addonTotal = selectedAddons.reduce((sum, addon) => sum + addon.price, 0);
            const total = baseMenuPrice + addonTotal;
            const list = document.getElementById('selectedAddonList');

            document.getElementById('detailTotal').textContent = total.toLocaleString() + ' MMK';

            if (!selectedAddons.length) {
                list.innerHTML = '<span class="text-muted">No addons selected</span>';
                return;
            }

            list.innerHTML = selectedAddons.map(addon => `
                <div class="d-flex justify-content-between gap-3 mb-2">
                    <span>${addon.name}</span>
                    <strong>+ ${addon.price.toLocaleString()} MMK</strong>
                </div>
            `).join('');
        }

        function addConfiguredMenuToCart() {
            const selectedAddons = getSelectedAddons();
            const addonTotal = selectedAddons.reduce((sum, addon) => sum + addon.price, 0);

            addToCart({
                ...detailMenu,
                price: baseMenuPrice + addonTotal,
                base_price: baseMenuPrice,
                selected_addons: selectedAddons
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.addon-checkbox').forEach(addon => {
                addon.addEventListener('change', updateDetailTotal);
            });
            updateDetailTotal();
        });
    </script>
@endsection
