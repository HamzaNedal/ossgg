    <!-- Start Header -->
    <div class="main-header wow bounceInUp">
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg navbar-template">

                <a class="navbar-brand" href="#">
                    <img src="{{ asset('frontend') }}/img/logo.png" alt="">
                </a>
                <div class="d-flex flex-row order-2 order-lg-3">
                    @if (auth()->check())
                         <a href="{{ route('admin.home') }}" class="btn">OSSGG Profile</a>
                    @else
                    <a href="{{ route('login') }}" class="btn">Login</a>

                    @endif
                    <ul class="navbar-nav flex-row">
                        <li class="nav-item"><a class="nav-link px-2" href="{{ $static_page['facebook']??'#' }}"><i class="fa fa-facebook"></i></a></li>
                        <li class="nav-item"><a class="nav-link px-2" href="{{ $static_page['twitter']??'#' }}"><i class="fa fa-twitter"></i></a></li>
                        <li class="nav-item"><a class="nav-link px-2" href="{{ $static_page['instagram'] ??'#'}}"><i class="fa fa-instagram"></i></a></li>
                        <li class="nav-item"><a class="nav-link px-2" href="{{ $static_page['youtube'] ?? '#'}}"><i class="fa fa-youtube"></i></a></li>
                        <li class="nav-item"><a class="nav-link px-2" href="{{ $static_page['linkedin'] ?? '#' }}"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarNavDropdown">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse order-3 order-lg-2" id="navbarNavDropdown">
                    <ul class="navbar-nav mobile  ml-auto mr-3">
                        <li class="nav-item"><a class="nav-link" href="{{ route('frontend.home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About OSSGG</a></li>
                        <li class="nav-item"><a class="nav-link" href="#global">Our Global Group</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">DnA Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#news">OSSGG News & Events</a></li>
                        <li class="nav-item"><a class="nav-link" href="#partnaers">Our Partnaers</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact us</a></li>
                    </ul>
                </div>

            </nav>
        </div>
    </div>
    <!-- End Header -->