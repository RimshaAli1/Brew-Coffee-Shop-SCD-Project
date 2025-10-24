@extends('layouts.app')

@section('content')
<!-- ======================
     Hero Section
====================== -->
<section class="hero">
  <div class="hero-content text-center">
    <h1 class="display-4 fw-bold">Welcome to Brew Coffee Shop</h1>
    <p class="lead">Freshly brewed happiness in every cup ☕</p>
    <a href="{{ route('products') }}" class="btn btn-custom btn-lg mt-3">Shop Now</a>
  </div>
</section>

<!-- ======================
     Features Section
====================== -->
<section class="py-5 text-center">
  <div class="container">
    <h2 class="section-title">Why Choose Us</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="feature-icon">☕</div>
        <h5>Premium Coffee</h5>
        <p>Only the finest beans roasted to perfection for a rich, smooth flavor.</p>
      </div>
      <div class="col-md-4">
        <div class="feature-icon">🏠</div>
        <h5>Cozy Ambience</h5>
        <p>Relax in our inviting environment, perfect for work, study, or socializing.</p>
      </div>
      <div class="col-md-4">
        <div class="feature-icon">👨‍🍳</div>
        <h5>Expert Baristas</h5>
        <p>Our skilled baristas craft every cup with precision and care.</p>
      </div>
    </div>
  </div>
</section>

<!-- ======================
     About Us Section
====================== -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h2 class="section-title">About Us</h2>
        <p>At Brew Coffee Shop, we’re passionate about delivering the perfect cup. From selecting the finest beans to creating a cozy ambience, our goal is simple: happiness in every sip.</p>
        <p>Founded in 2023, we’ve grown a loyal community of coffee lovers who trust us for quality, taste, and experience.</p>
        <a href="{{ route('about') }}" class="btn btn-custom mt-3">Learn More</a>
      </div>
      <div class="col-md-6">
        <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?auto=format&fit=crop&w=800&q=80" alt="Coffee Shop" class="about-img">
      </div>
    </div>
  </div>
</section>

<!-- ======================
     Testimonials Section
====================== -->
<section class="py-5 text-center">
  <div class="container">
    <h2 class="section-title">What Our Customers Say</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="testimonial-card">
          <p>"Best coffee in town! Loved the caramel macchiato."</p>
          <strong>- Sara K.</strong>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testimonial-card">
          <p>"Amazing ambience and friendly staff. Highly recommend!"</p>
          <strong>- Ahmed R.</strong>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testimonial-card">
          <p>"Freshly brewed happiness in every cup ☕."</p>
          <strong>- Rimsha A.</strong>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- =========================
     CSS
========================= -->
<style>
/* General Styles */
.hero {
  background: url('https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=1470&q=80') center/cover no-repeat;
  height: 80vh;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  color: white;
}
.hero::after {
  content: "";
  position:absolute;
  top:0; left:0; right:0; bottom:0;
  background: rgba(0,0,0,0.5);
}
.hero-content { position: relative; z-index:1; }
.btn-custom { background:#a7744c; color:#fff; border:0; transition:0.3s; }
.btn-custom:hover { background:#8a633f; }
h2.section-title { font-weight:700; margin-bottom:40px; }
.feature-icon { font-size: 50px; color:#a7744c; margin-bottom:20px; }
.testimonial-card { border:1px solid #ddd; border-radius:10px; padding:20px; transition:0.3s; background:white; }
.testimonial-card:hover { transform: translateY(-5px); box-shadow:0 5px 15px rgba(0,0,0,0.1); }
.about-img { border-radius:15px; max-width:100%; }

/* Responsive */
@media (max-width: 576px) {
  .hero { height: 60vh; }
  h2.section-title { font-size:1.5rem; }
}
</style>
@endsection
