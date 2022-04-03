<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}" /> 
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}" />  --}}
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
   {{--  <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" />  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

    @yield('link')

  </head>
  <body>
    <div class="container-scroller">

      {{-- Sidebar --}}

      @include('admin.layouts.sidebar')

      {{-- End sidebar --}}
     
      <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
          </div>
        </div>
        
        {{-- Navbar --}}

        @include('admin.layouts.navbar')

        {{-- End navbar --}}

        {{-- Content --}}

        <div class="main-panel">
          <div class="content-wrapper pb-20">
            

            {{-- Header --}}
               @yield('header')
            {{-- end header --}}

            @yield('content')

          </div>

          <footer class="footer mt-5">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Badan Karantina Pertanian</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="sumbwa.karantina.pertanian.go.id" target="_blank">Stasiun Karantina Pertanian Kelas I Sumbawa Besar</span>
            </div>
          </footer>
        </div>

        {{-- End Content --}}
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }} "></script> 
    <!-- endinject -->
    <!-- Plugin js for this page -->
 {{--    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }} "></script> 
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }} "></script>  --}}
    {{-- <script src="{{ asset('assets/vendors/flot/jquery.flot.js') }} "></script>
    <script src="{{ asset('assets/vendors/flot/jquery.flot.resize.js') }} "></script>
    <script src="{{ asset('assets/vendors/flot/jquery.flot.categories.js') }} "></script>
    <script src="{{ asset('assets/vendors/flot/jquery.flot.fillbetween.js') }} "></script>
    <script src="{{ asset('assets/vendors/flot/jquery.flot.stack.js') }} "></script>
    <script src="{{ asset('assets/vendors/flot/jquery.flot.pie.js') }} "></script> --}}
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }} "></script> 
    <script src="{{ asset('assets/js/hoverable-collapse.js') }} "></script>
    <script src="{{ asset('assets/js/misc.js') }} "></script> 
    <!-- endinject -->
    <!-- Custom js for this page -->
    {{-- <script src="{{ asset('assets/js/dashboard.js') }} "></script>  --}}
    <!-- End custom js for this page -->

    @yield('script')

  </body>
</html>