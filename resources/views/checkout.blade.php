@extends('layouts.app')

@section('content')
<div class="container py-5">
  <!-- Page Heading -->
  <h2 class="text-center mb-4">Checkout</h2>

  <!-- Checkout Form -->
  <form id="checkoutForm" method="POST" action="{{ route('checkout.process') }}">
    @csrf
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Customer Details -->
        <input name="name" class="form-control mb-3" placeholder="Full name" required>
        <input name="email" type="email" class="form-control mb-3" placeholder="Email" required>
        <input name="address" class="form-control mb-3" placeholder="Address" required>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-custom w-100 py-2">Place Order</button>

        <!-- Note for Demo -->
        <p class="text-center text-muted mt-2">
          Payment processing not included — demo only.
        </p>
      </div>
    </div>
  </form>
</div>

<!-- =========================
     JS: SweetAlert2 for Order Confirmation
========================= -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('checkoutForm').addEventListener('submit', function(e){
    e.preventDefault(); // prevent actual form submission for demo

    Swal.fire({
      icon: 'success',
      title: 'Order Placed!',
      text: 'Your order has been successfully placed.',
      showConfirmButton: false,
      timer: 2000
    });

    // Clear form fields after submission
    this.reset();
});
</script>

<!-- =========================
     CSS: Custom Styling
========================= -->
<style>
/* Custom coffee-colored button */
.btn-custom {
    background-color: #a7744c; /* Coffee brown */
    color: #fff;
    border: none;
    transition: background 0.3s;
}
.btn-custom:hover {
    background-color: #8a633f;
    color: #fff;
}

/* Responsive font sizes */
@media (max-width: 576px) {
    h2 { font-size: 1.75rem; }
    .btn-custom { font-size: 0.9rem; }
}
</style>
@endsection
