@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Our Coffee Menu</h2>

    <!-- Search Box -->
    <div class="mb-4 text-center">
        <input type="text" id="product-search" placeholder="Search products..." class="form-control w-50 mx-auto">
    </div>

    <!-- Category Filter -->
    <div class="mb-4 text-center">
        <button class="btn btn-outline-dark btn-sm filter-btn active" data-cat="all">All</button>
        <button class="btn btn-outline-dark btn-sm filter-btn" data-cat="coffee">Coffee</button>
        <button class="btn btn-outline-dark btn-sm filter-btn" data-cat="desserts">Desserts</button>
        <button class="btn btn-outline-dark btn-sm filter-btn" data-cat="tea">Tea</button>
    </div>

    <!-- Product Grid -->
    <div class="row g-4" id="product-container">
        @php
            $seen = [];
            $allowedProducts = [
                'Cappuccino Classic','Cappuccino Mocha','Cappuccino Caramel',
                'Cold Brew Vanilla','Cold Brew Caramel','Mocha Latte','Mocha Mint',
                'Cheesecake','Brownie','Cupcake','Green Tea','Chamomile Tea','Masala Tea'
            ];
        @endphp

        @forelse($products as $p)
            @if(in_array($p->name, $allowedProducts) && !in_array($p->name, $seen))
                @php $seen[] = $p->name; @endphp
                <div class="col-sm-6 col-md-4 product-card" data-cat="{{ strtolower(trim($p->category)) }}">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('images/' . $p->image) }}" class="card-img-top" alt="{{ $p->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $p->name }}</h5>
                            <p class="text-muted small">{{ Str::limit($p->description, 100) }}</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <div class="fw-bold">Rs. {{ number_format($p->price, 0) }}</div>
                                <button class="btn btn-sm btn-coffee add-to-cart" data-id="{{ $p->id }}">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <p class="text-center">No products available.</p>
        @endforelse
    </div>
</div>

<!-- =========================
     CSS
========================= -->
<style>
body { font-family: 'Poppins', sans-serif; background-color: #fffdf9; }

.btn-coffee { background: #a7744c; color: #fff; border: 0; transition: 0.3s; }
.btn-coffee:hover { background: #8a633f; }

.card { transition: transform 0.25s ease, box-shadow 0.25s ease; }
.card:hover { transform: translateY(-6px); box-shadow: 0 8px 20px rgba(0,0,0,0.1); }

.filter-btn.active { background: #a7744c; color: #fff; }

.card-img-top { width: 100%; height: 230px; object-fit: cover; border-top-left-radius: .5rem; border-top-right-radius: .5rem; }

@media (max-width: 768px) { .card-img-top { height: 200px; } #product-search { width: 80% !important; } }
@media (max-width: 576px) { .card-img-top { height: 180px; } }
</style>

<!-- =========================
     Scripts
========================= -->
<script>
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
let activeCategory = 'all';

// Add to Cart
document.querySelectorAll('.add-to-cart').forEach(btn => {
    btn.addEventListener('click', async () => {
        const id = btn.dataset.id;
        const res = await fetch('{{ route("cart.add") }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': token },
            body: JSON.stringify({ id, quantity: 1 })
        });
        const data = await res.json();
        if (data.success) {
            alert(data.message);
            const badge = document.querySelector('#cart-count');
            if (badge) badge.textContent = parseInt(badge.textContent) + 1;
        } else { alert('Error adding to cart'); }
    });
});

// Filter & Search
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        activeCategory = btn.dataset.cat.toLowerCase();
        filterProducts();
    });
});

document.getElementById('product-search').addEventListener('input', filterProducts);

function filterProducts() {
    const term = document.getElementById('product-search').value.toLowerCase();
    document.querySelectorAll('.product-card').forEach(card => {
        const cardCat = (card.dataset.cat || '').toLowerCase().trim();
        const name = card.querySelector('.card-title').textContent.toLowerCase();
        const matchesCategory = activeCategory === 'all' || cardCat === activeCategory;
        const matchesSearch = name.includes(term);
        card.style.display = (matchesCategory && matchesSearch) ? 'block' : 'none';
    });
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
