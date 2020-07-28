<!DOCTYPE html >
<html >
  <head>
      @include('backend.base_layout.header.header')
    @stack('css')
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      @include('backend.base_layout.nav')
      @include('backend.base_layout.aside')
      <div class="content-wrapper">
          @yield('content')
       </div>
       @include('backend.base_layout.footer.footer')
       @include('backend.base_layout.footer.footer-meta')
    </div>

    @stack('js')

  </body>
</html>
