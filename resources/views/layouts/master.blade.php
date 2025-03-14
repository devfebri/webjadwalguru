
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

  <title>SMPN 19 Kota Jambi</title>
  @include('layouts.head')
</head>

<body>
  <script src="{{ asset('/assets/js/initTheme.js')}}"></script>

  <!-- Begin page -->
  <div id="wrapper">
    <div id="app">
      @include('layouts.sidebar')
      <div id="main"  class='layout-navbar navbar-fixed'>
        @include('layouts.topbar')
        <div id="main-content">
          @yield('content')
          @include('layouts.footer')
        </div>
      </div>
    </div>
  </div>
  <!-- END wrapper -->
  @include('layouts.footer-script')
</body>

</html>