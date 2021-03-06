<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- CSRF Token -->

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta content="survey-ikm-sumbawa" name="keywords">

  <meta content="survey-ikm-sumbawa" name="description">

  <meta name="mobile-web-app-capable" content="yes">

  <meta name="apple-mobile-web-app-capable" content="yes">

  <meta name="application-name" content="e-IKM">

  <meta name="apple-mobile-web-app-title" content="e-IKM">

  <meta name="theme-color" content="#081E5B">

  <meta name="msapplication-navbutton-color" content="#081E5B">

  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

  <meta name="msapplication-starturl" content="/ikm">



  <title>@yield('title', 'Survey Indeks Kepuasan Masyarakat')</title>



  {{-- <link rel="manifest" href="{{ asset('manifest.json') }}"> --}}

  <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon-32x32.png') }}" sizes="32x32">

  <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('assets/images/web-sumbawa1x.png') }}">

  <link rel="apple-touch-icon" type="image/png" sizes="48x48" href="{{ asset('assets/images/web-sumbawa1x.png') }}">

  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/images/web-sumbawa2x.png') }}">

  <link rel="apple-touch-icon" type="image/png" sizes="96x96" href="{{ asset('assets/images/web-sumbawa2x.png') }}">

  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/images/web-sumbawa3x.png') }}">

  <link rel="apple-touch-icon" type="image/png" sizes="192x192" href="{{ asset('assets/images/web-sumbawa3x.png') }}">

  <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('assets/images/web-sumbawa4x.png') }}">

  <link rel="apple-touch-icon" type="image/png" sizes="512x512" href="{{ asset('assets/images/web-sumbawa4x.png') }}">



  <!-- Google Fonts -->

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">



  <!-- Bootstrap CSS File -->

  <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">



  <!-- Libraries CSS Files -->

  <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

  <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet">

  <link href="{{ asset('assets/css/ionicons.min.css') }}" rel="stylesheet">

  <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">

  <link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet">



  <!-- Main Stylesheet File -->

  <link href="{{ asset('assets/css/reveal.css') }}" rel="stylesheet">



  @yield('link')



</head>



<body id="body">



  @yield('content')



  <!--==========================

    Footer

  ============================-->

  <footer id="footer">

    <div class="container">

      <div class="copyright">

        &copy; Copyright <strong>Reveal</strong>. All Rights Reserved

      </div>

      <div class="credits">

        Stasiun Karatina Pertanian Kelas I Sumbawa Besar

      </div>

    </div>

  </footer><!-- #footer -->



  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>



  <!-- JavaScript Libraries -->

  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

  <script src="{{ asset('assets/js/easing.min.js') }}"></script>

  <script src="{{ asset('assets/js/hoverIntent.js') }}"></script>

  <script src="{{ asset('assets/js/superfish.min.js') }}"></script>

  <script src="{{ asset('assets/js/wow.min.js') }}"></script>

  <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

  <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>

  <script src="{{ asset('assets/js/sticky.js') }}"></script>



  <!-- Contact Form JavaScript File -->

  <script src="{{ asset('assets/js/contactform.js') }}"></script>



  <!-- Template Main Javascript File -->

  <script src="{{ asset('assets/js/reveal.js') }}"></script>



  @yield('script')



</body>

</html>