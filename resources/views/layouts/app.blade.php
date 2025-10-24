<!DOCTYPE html>
<html lang="en">
<head>
  <!-- 
     META & PAGE SETUP
    ---------------------
    - Sets character encoding and viewport for responsive scaling.
    - Includes CSRF token for secure form submissions in Laravel.
  -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <!-- 
     PAGE TITLE
    --------------
    - Allows dynamic titles via @section('title') in child views.
    - Defaults to "Brew Coffee Shop".
  -->
  <title>@yield('title', 'Brew Coffee Shop')</title>
  
  <!-- 
     STYLESHEETS & FONTS
    ------------------------
    - Bootstrap 5.3 for responsive layout and prebuilt components.
    - Google Fonts: 'Poppins' for a clean, modern typography.
    - Custom CSS file for site-specific styles.
  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- 
    RESPONSIVE FALLBACK (Optional)
    ----------------------------------
    Ensures font and spacing look good even if Bootstrap fails to load.
  -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #fffdf9; /* Light, coffee-inspired tone */
    }

    main {
      min-height: 70vh; /* Keeps footer at bottom even with little content */
    }

    @media (max-width: 768px) {
      main {
        padding: 0 10px; /* Add breathing room on smaller screens */
      }
    }
  </style>
</head>

<body>
  <!-- 
     HEADER (Navbar)
    -------------------
    Included from 'layouts.header' partial.
    Contains navigation links and cart icon.
  -->
  @include('layouts.header')

  <!-- 
     MAIN CONTENT AREA
    ---------------------
    - Dynamically replaced by individual page content (Home, Menu, Cart, etc.).
    - Keeps consistent structure and padding sitewide.
  -->
  <main>
    @yield('content')
  </main>

  <!-- 
   FOOTER SECTION
    ------------------
    - Included from 'layouts.footer' partial.
    - Stays consistent across all pages.
  -->
  @include('layouts.footer')

  <!-- 
     SCRIPTS
    ------------
  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
