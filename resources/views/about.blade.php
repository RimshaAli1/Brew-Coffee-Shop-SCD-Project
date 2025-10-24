@extends('layouts.app')

@section('title','About Us')

@section('content')

<!-- 
  =============================
      ABOUT US PAGE STYLES
  =============================
  - Ensures all images have uniform size.
  - Cards have soft shadows and hover effect.
  - Fully responsive using Bootstrap grid.
-->
<style>
  /* Make images in cards equal height and nicely cropped */
  .about-img {
    width: 100%;
    height: 230px; /* fixed height for consistency */
    object-fit: cover; /* ensures no stretching */
    border-top-left-radius: 0.5rem;
    border-top-right-radius: 0.5rem;
  }

  /* Card styling */
  .card {
    border: none;
    border-radius: 0.5rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: transform 0.3s;
  }

  /* Card hover effect */
  .card:hover {
    transform: translateY(-5px);
  }

  /* Responsive adjustments for small screens */
  @media (max-width: 576px) {
    .about-img { height: 180px; } /* reduce image height */
    h2 { font-size: 1.75rem; }    /* smaller heading for mobile */
  }
</style>

<div class="container py-5">
  <!-- Page Heading -->
  <h2 class="mb-4 text-center">About Brew Coffee</h2>

  <!-- Intro Text -->
  <p class="lead text-center">
    Inspired by Melbourne's coffee culture, Brew Coffee brings specialty coffee to your city. 
    Our passion is freshly brewed happiness in every cup.
  </p>

  <!-- Features Section -->
  <div class="row mt-5 gy-4">
    <!-- Feature 1: High Quality Coffee -->
    <div class="col-12 col-sm-6 col-md-4 text-center">
      <div class="card h-100">
        <img src="{{ asset('images/coffee1.jpg') }}" class="about-img" alt="High Quality Coffee">
        <div class="card-body">
          <h5 class="fw-semibold">High Quality Coffee</h5>
          <p>We use premium beans roasted to perfection.</p>
        </div>
      </div>
    </div>

    <!-- Feature 2: Expert Baristas -->
    <div class="col-12 col-sm-6 col-md-4 text-center">
      <div class="card h-100">
        <img src="{{ asset('images/barista.jpg') }}" class="about-img" alt="Expert Baristas">
        <div class="card-body">
          <h5 class="fw-semibold">Expert Baristas</h5>
          <p>Our baristas craft every cup with care and passion.</p>
        </div>
      </div>
    </div>

    <!-- Feature 3: Cozy Ambience -->
    <div class="col-12 col-sm-6 col-md-4 text-center mx-auto">
      <div class="card h-100">
        <img src="{{ asset('images/cafe.jpeg') }}" class="about-img" alt="Cozy Ambience">
        <div class="card-body">
          <h5 class="fw-semibold">Cozy Ambience</h5>
          <p>Relax and enjoy your coffee in our cozy cafes.</p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
