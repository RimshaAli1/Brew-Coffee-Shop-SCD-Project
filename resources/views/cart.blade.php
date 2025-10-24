@extends('layouts.app')

@section('content')

<div class="container py-5">
    <!-- Page Heading -->
    <h2 class="text-center mb-4">Your Cart</h2>

    <!-- Empty Cart Message -->
    @if(empty($cart))
        <p class="text-center">
            Your cart is empty. 
            <a href="{{ route('products') }}">Shop now</a>
        </p>
    @else
    <!-- Cart Table -->
    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                <tr data-id="{{ $id }}">
                    <td>
                        <!-- Product image + name -->
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/' . ($item['image'] ?? 'placeholder.jpg')) }}" 
                                 width="70" class="me-3 rounded" alt="{{ $item['name'] }}">
                            <div>{{ $item['name'] }}</div>
                        </div>
                    </td>
                    <td>Rs. {{ number_format($item['price'],0) }}</td>
                    <td>
                        <!-- Quantity input -->
                        <input type="number" class="form-control qty" value="{{ $item['quantity'] }}" min="1" style="width:90px">
                    </td>
                    <td>
                        Rs. <span class="subtotal">{{ number_format($item['price'] * $item['quantity'],0) }}</span>
                    </td>
                    <td>
                        <!-- Remove button -->
                        <button class="btn btn-sm btn-danger remove">Remove</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Total & Checkout -->
    <div class="d-flex justify-content-end mt-3">
        <div class="text-end">
            <p class="mb-1">Total</p>
            <h4>Rs. {{ number_format($total,0) }}</h4>
            <a href="{{ route('checkout') }}" class="btn btn-coffee mt-2 w-100">Checkout</a>
        </div>
    </div>
    @endif
</div>

<!-- =========================
     JS: Cart Actions
========================= -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Update cart quantity
document.querySelectorAll('.qty').forEach(input => {
    input.addEventListener('change', async (e) => {
        const tr = e.target.closest('tr');
        const id = tr.dataset.id;
        const quantity = parseInt(e.target.value) || 1;

        await fetch('{{ route("cart.update") }}', {
            method: 'POST',
            headers: {'Content-Type':'application/json','X-CSRF-TOKEN': token},
            body: JSON.stringify({ id, quantity })
        });

        Swal.fire({
            icon: 'success',
            title: 'Updated!',
            text: 'Cart quantity updated.',
            timer: 1200,
            showConfirmButton: false
        }).then(() => location.reload());
    });
});

// Remove item from cart
document.querySelectorAll('.remove').forEach(btn => {
    btn.addEventListener('click', async (e) => {
        const tr = e.target.closest('tr');
        const id = tr.dataset.id;

        await fetch('{{ route("cart.remove") }}', {
            method: 'POST',
            headers: {'Content-Type':'application/json','X-CSRF-TOKEN': token},
            body: JSON.stringify({ id })
        });

        Swal.fire({
            icon: 'success',
            title: 'Removed!',
            text: 'Item removed from cart.',
            timer: 1200,
            showConfirmButton: false
        }).then(() => location.reload());
    });
});
</script>

<!-- =========================
     CSS: Custom Styling
========================= -->
<style>
/* Coffee-colored buttons */
.btn-coffee {
    background-color: #a7744c; /* Coffee brown */
    color: #fff;
    border: none;
    transition: background 0.3s;
}
.btn-coffee:hover {
    background-color: #8a633f;
    color: #fff;
}

/* Danger button override */
.btn-danger {
    background-color: #c75f3c;
    border: none;
}
.btn-danger:hover {
    background-color: #a1472a;
    color: #fff;
}

/* Table header styling */
.table thead th {
    border-bottom: 2px solid #8a633f;
}

/* Heading color */
h2 {
    color: #5b3a29;
}

/* Responsive adjustments */
@media (max-width: 576px) {
    h2 { font-size: 1.75rem; }
    .btn-coffee { font-size: 0.9rem; }
    .table-responsive { font-size: 0.9rem; }
}
</style>
@endsection
