<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.base_layout.header')
    @stack('css')
    <style>
         .slideInLeft{
        text-transform: capitalize;
    }
    </style>
</head>
<body>
    @include('frontend.base_layout.nav')

   @yield('content') 
   @include('frontend.base_layout.footer')
</body>
    @include('frontend.base_layout.footer-meta')
  
</html>