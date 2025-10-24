<!-- 
   NAVBAR SECTION
-->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
  <div class="container">
    <!--  Brand / Logo -->
    <a class="navbar-brand fw-bold" href="{{ route('home') }}">
      ☕ Brew Coffee
    </a>

    <!--  Toggle button for mobile view -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!--  Navigation links (collapse on small screens) -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        
        <!-- Home -->
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
            Home
          </a>
        </li>

        <!-- About -->
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
            About Us
          </a>
        </li>

        <!-- Menu / Products -->
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('products') ? 'active' : '' }}" href="{{ route('products') }}">
            Menu
          </a>
        </li>

        <!-- Contact -->
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
            Contact
          </a>
        </li>

        <!-- Cart (shows total items) -->
        <li class="nav-item position-relative ms-lg-3 mt-2 mt-lg-0">
          <a class="nav-link d-flex align-items-center" href="{{ route('cart') }}">
            🛒
            <span class="ms-1">Cart</span>
            <span id="cart-count" class="badge bg-danger ms-2">
              {{ count(session('cart', [])) }}
            </span>
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<!--  Responsive tweaks -->
<style>
  /* Improve spacing and readability on smaller screens */
  @media (max-width: 768px) {
    .navbar-brand {
      font-size: 1.1rem;
    }
    .nav-link {
      text-align: center;
      padding: 0.75rem 1rem;
    }
    #cart-count {
      position: relative;
      top: -1px;
    }
  }

  /* Adjust cart icon alignment for very small devices */
  @media (max-width: 576px) {
    .nav-item .nav-link {
      display: flex;
      justify-content: center;
      align-items: center;
    }
  }
</style>
