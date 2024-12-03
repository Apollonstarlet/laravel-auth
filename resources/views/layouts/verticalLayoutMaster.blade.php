<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
    @include('panels.sidebar')

  <!-- Layout container -->
  <div class="layout-page">
      
    @include('panels.navbar')

      <!-- Content wrapper -->
      <div class="content-wrapper">
        
        @yield('content')

        @include('panels.footer')

        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>

  <!-- Drag Target Area To SlideIn Menu On Small Screens -->
  <div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->

  @include('panels.scripts')
</body>