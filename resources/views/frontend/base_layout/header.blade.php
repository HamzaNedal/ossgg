<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.min.css">
<!-- Bootstrap  -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/font-awesome.min.css">
<!-- Animate -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .fixed-top {
        background-color: white;
        width: 100%;
        box-shadow: 0 0 10px rgba(123, 123, 123, 0.5);
    }
    .scrollToTop{
    display: none;
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    border: none;
    outline: none;
    background-color: #ffc107;
    color: white;
    cursor: pointer;
    border-radius: 50%;
    font-size: 18px;
    width: 50px;
    height: 50px;
}
.scrollToTop:hover{
    text-decoration:none;
}
</style>
@toastr_css

<!-- <script src="js/scrollreveal.min.js"></script> -->
<title>@yield('title')</title>