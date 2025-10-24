@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container py-5">
  <!-- Page Heading -->
  <h2 class="text-center mb-5">Contact Us</h2>

  <div class="row justify-content-center">
    <div class="col-md-6">
      <!-- Contact Card -->
      <div class="contact-card p-4 rounded shadow-sm">
        <form id="contactForm">
          <!-- Name Field -->
          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" placeholder="Enter your name" required>
          </div>

          <!-- Email Field -->
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Enter your email" required>
          </div>

          <!-- Message Field -->
          <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea class="form-control" rows="5" placeholder="Your message..." required></textarea>
          </div>

          <!-- Submit Button -->
          <button type="submit" class="btn btn-custom w-100">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- =========================
     JS: SweetAlert2 for Form Submission
========================= -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('contactForm').addEventListener('submit', function(e){
    e.preventDefault(); // prevent actual form submission

    Swal.fire({
      icon: 'success',
      title: 'Message Sent!',
      text: 'Thank you for contacting us. We will get back to you soon!',
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
/* Card Styling */
.contact-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.contact-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.15);
}

/* Custom Button */
.btn-custom {
    background: #a7744c; /* Coffee brown */
    color: #fff;
    border: 0;
    font-weight: 500;
    transition: background 0.3s ease;
}
.btn-custom:hover {
    background: #8a633f;
}

/* Input Focus Effect */
.form-control:focus {
    border-color: #a7744c;
    box-shadow: 0 0 5px rgba(167,116,76,0.5);
}

/* Heading */
h2 {
    font-weight: 600;
    color: #333;
}

/* Responsive Adjustments */
@media (max-width: 576px) {
    .contact-card { padding: 20px; }
}
</style>
@endsection
