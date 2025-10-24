<!-- 
   FOOTER SECTION
  -----------------
  - Simple, clean dark footer to complement the site's coffee theme.
  - Contains copyright.
-->

<footer class="bg-dark text-light pt-5 pb-3 mt-5">
  <div class="container text-center">

    <!--  Dynamic Year & Branding -->
    <p class="mb-2">
      &copy; {{ date('Y') }} <strong>Brew Coffee</strong>. All rights reserved.
    </p>

    <!--  Social Media Links -->
    <div class="social-icons my-2">
      <!-- Replace '#' with actual social links when ready -->
      <a href="#" class="text-light text-decoration-none me-3">Instagram</a>
      <a href="#" class="text-light text-decoration-none me-3">Facebook</a>
      <a href="#" class="text-light text-decoration-none">Twitter</a>
    </div>

  </div>
</footer>

<!-- 
  💡 RESPONSIVE FOOTER STYLING
  ------------------------------
  - Ensures spacing, font sizes, and layout look good on smaller screens.
  - Centers links and slightly increases tap targets for touch devices.
-->
<style>
  footer {
    font-family: 'Poppins', sans-serif;
    background-color: #1c1c1c; /* Slightly softer than pure black */
  }

  .social-icons a:hover {
    color: #d4a373; /* Coffee gold hover color */
    transition: color 0.3s ease;
  }

  @media (max-width: 576px) {
    footer {
      font-size: 0.9rem; /* Slightly smaller text for compact look */
    }

    .social-icons a {
      display: block;
      margin: 5px 0; /* Stack links vertically for readability */
    }
  }
</style>
