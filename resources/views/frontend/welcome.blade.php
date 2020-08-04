@extends('frontend.layouts.app')
@section('title', 'Home')

@section('content')
@push('css')
<style>
    h4{
        text-transform: capitalize;
    }
</style>
@endpush
    @if (!$sliders->isEmpty())
               <!-- Start Slider -->
               <section class="wow flipInX">
                <div class="container">
                    <div class="owl-carousel owl-theme slider">
                
                        @foreach ($sliders as $slider)
                        @if ($slider->image)
                        <div class="item item-01"  style="background-image: url('{{ asset('background_image/'.$slider->background_image) }}')">
                            <div class="row align-items-center h-100">
                                <div class="col-lg-6 col-md-12 col-sm-12 slider-lfet">
                                    <div class="caption">
                                        <div class="title">
                                            <h4>{{ $slider->title }}</h4>
                                            <span class="circle"></span>
                                        </div>
                                        <p>{{$slider->description}}</p>
                                        @if ($slider->link)
                                           <a href="{{ $slider->link }}" class="btn btn-one">Learn More</a>
                                        @endif
                                        <a href="#contact" class="btn btn-tow">Contact Us</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="img-containt">
                                        <img src="{{ asset('image/'.$slider->image) }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        @else
                        <div class="item item-02" style="background-image: url('{{ asset('background_image/'.$slider->background_image) }}')">
                            <div class="row align-items-center h-100">
                                <div class="col-md-12">
                                    <div class="caption">
                                        <div class="title">
                                            <h4>{{ $slider->title }}</h4>
                                            <span class="circle"></span>
                                        </div>
                                        <p>{{$slider->description}}.</p>
                                        @if ($slider->link)
                                        <a href="{{ $slider->link }}" class="btn btn-one">Learn More</a>
                                     @endif
                                        <a href="#contact" class="btn btn-tow">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                  
                        @endforeach
    
                      
                    </div>
                </div>
            </section>
            <!-- End Slider --> 
    @endif

    @if (!$about_us->isEmpty())
        <!-- Start About -->
        <section class="about" id="about">
            <div class="container">
          
                <div class="section-title wow slideInLeft">
                    @foreach ($about_us as $about)
                    @if($loop->first)
                            <h2>About OSSGG</h2>
                            <span></span>
                            <p>{{$about->value  }}.</p>
                    @else
                    @push('about_us')

                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="containt wow zoomIn">
                            <img src="{{ asset('frontend') }}/img/eye.png" alt="">
                            <div class="item-containt">
                                <h4 style="text-transform: capitalize;">{{ $about->name }}</h4>
                                <p>
                                    {{$about->value}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endpush

                @endif
                @endforeach
                </div>

                <div class="row contint-card">
                    @stack('about_us')

                  
             
                    {{-- <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="containt wow zoomIn">
                            <img src="{{ asset('frontend') }}/img/eye.png" alt="">
                            <div class="item-containt">
                                <h4>Our Vision</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="containt wow zoomIn">
                            <img src="{{ asset('frontend') }}/img/target.png" alt="">
                            <div class="item-containt">
                                <h4>Our Vision</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="containt wow zoomIn">
                            <img src="{{ asset('frontend') }}/img/correct.png" alt="">
                            <div class="item-containt">
                                <h4>Our Vision</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="containt wow zoomIn">
                            <img src="{{ asset('frontend') }}/img/shield (1).png" alt="">
                            <div class="item-containt">
                                <h4>Our Vision</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                        </div>
                    </div> --}}
                </div>
    
            </div>
    
        </section>
        <!-- End About -->       
     @endif
    <!-- Start Our Global -->
    @if (!$companies->isEmpty())
        <section class="our_global" id="global">
            <div class="container">
                <div class="section-title  wow slideInLeft">
                    <h2>Our Global Group</h2>
                    <span></span>
                </div>
    
                <div class="global-slider owl-carousel owl-theme">
                    @foreach ($companies as $company)
                    <div class="item">
                        <div class="row justify-content-center align-items-center slide">
                            <div class="col-lg-4 col-md-4 col-sm-12  mb-5">
                                <img src="{{ asset('company/'.$company->image) }}" alt="" class="wow fadeInUpBig">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <div class="title wow jackInTheBox">
                                    <h4>{{ $company->name }}</h4>
                                    <p>
                                        {{ $company->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="item">
                        <div class="row justify-content-center align-items-center slide">
                            <div class="col-lg-4 col-md-4 col-sm-12  mb-5">
                                <img src="{{ asset('frontend') }}/img/Ellipse 32.png" alt="" class="wow fadeInUpBig">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <div class="title wow jackInTheBox">
                                    <h4>Smile Digital</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row justify-content-center align-items-center slide">
                            <div class="col-lg-4 col-md-4 col-sm-12  mb-5">
                                <img src="{{ asset('frontend') }}/img/Ellipse 32.png" s alt="">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <div class="title">
                                    <h4>Smile Digital</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
    
                </div>
            </div>
    
        </section>
    @endif
     <!-- End Our Global -->


        <!-- Start portfolio -->
        @if ($service)
        <section class="portfolio" id="portfolio">
            <div class="container">
                <div class="section-title wow slideInLeft">
                    <h2>DnA Portfolio </h2>
                    <span></span>
                </div>
            </div>
            <div class="container-fluid p-0">
                <div class="portfolio-contint">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 text-center justify-content-center align-content-center">
                            <div class="item portfolio-contints">
                                <img src="{{ asset('frontend') }}/img/work.png" style="width: 120px;" alt="" class="wow fadeInRightBig">
                                <h4 class="wow fadeInLeftBig">{{ $service->title }}</h4>
                                <p class="wow fadeInDownBig">
                                {{  $service->description }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 form-portfolio">
                            <form action="{{ route('storeServiceResquests') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <div class="form-group wow lightSpeedIn">
                                    <input type="text" class="form-control" id="" name="name" placeholder="Client Name">
                                </div>
                                <div class="form-group wow lightSpeedIn">
                                    @include('frontend.country.country_name')
                                </div>
                                <div class="form-group wow lightSpeedIn">
                                    @include('frontend.country.country_code')
    
                                </div>
                                <div class="form-group wow lightSpeedIn">
                                    <input type="text" class="form-control" id="" name="phone_no" placeholder="Phone No.">
                                </div>
                                <div class="form-group wow lightSpeedIn">
                                    <input type="email" class="form-control" id="" name="email" placeholder="E-mail">
                                </div>
                                <div class="form-group wow lightSpeedIn">
                                    <input type="text" class="form-control" id="" name="name_of_project" placeholder="The Project Name">
                                </div>
                                <div class="form-group wow lightSpeedIn">
                                    <select class="custom-select my-1 mr-sm-2" name="sector_of_project_id" id="">
                                        <option selected>Sector of Project</option>
                                        @foreach ($sectors as $sector)
                                         <option value="{{ $sector->id }}">{{ $sector->name }}</option>
    
                                        @endforeach
                                  
                                    </select>
                                </div>
                                <div class="form-group wow lightSpeedIn">
                                    <input type="text" class="form-control" id="" name="short_description" placeholder="Short Description">
                                </div>
                                <div class="form-group wow lightSpeedIn">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file" id="customFile" >
                                        <label class="custom-file-label" for="customFile">Please, Choose file</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
    
            </div>
        </section>
        @endif
        <!-- End portfolio -->
    
        <!-- Start News -->
        @if (!$posts->isEmpty())
        <section class="news" id="news">
            <div class="container">
                <div class="section-title  wow slideInLeft">
                    <h2>OSSGG News & Events</h2>
                    <span></span>
                </div>
                <div class="row">
                    @foreach ($posts as $post)
                    

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card news-card" style="border: none;">
                            <a href="{{ route('details.news', ['id'=>$post->id]) }}">
                                <div class="img-card card-img-top wow bounceIn"
                                    style="background-image:url({{ asset('posts/'.$post->image) }});">
                                </div>
                            </a>
                            <div class="card-body">
                                <span class="wow slideInLeft">{{ $post->category->name }}</span>
                                <a href="{{ route('details.news', ['id'=>$post->id]) }}">
                                    <h5 class="card-title wow slideInRight">{{ $post->title }}</h5>
                                </a>
                                @php
                                     $post->description =  strip_tags($post->description);
                                     $post->description = html_entity_decode($post->description,ENT_IGNORE,"UTF-8");
                                     $post->description = Str::substr($post->description, 0, 200)
                                  @endphp
                              <p class="card-text wow slideInLeft">{{ $post->description }}.... </p>
                              <a href="{{ route('details.news', ['id'=>$post->id]) }}" class="btn wow zoomIn">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    {{-- <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card news-card" style="border: none;">
                            <a href="#"><img src="{{ asset('frontend') }}/img/alexandre-debieve-FO7JIlwjOtU-unsplash.png" class="card-img-top wow bounceIn"></a>
                            <div class="card-body">
                                <span class="wow slideInLeft">Technology</span>
                                <a href="#">
                                    <h5 class="card-title wow slideInRight">Big Title 1</h5>
                                </a>
                                <p class="card-text wow slideInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. </p>
                                <a href="#" class="btn wow zoomIn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card news-card-ce" style="border: none;">
                            <a href="#"><img src="{{ asset('frontend') }}/img/christopher-burns-Kj2SaNHG-hg-unsplash.png" class="card-img-top wow bounceIn"></a>
                            <div class="card-body">
                                <span class="wow slideInLeft">Technology</span>
                                <a href="#">
                                    <h5 class="card-title wow slideInRight">Big Title 2</h5>
                                </a>
                                <p class="card-text wow slideInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. </p>
                                <a href="#" class="btn wow zoomIn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card news-card" style="border: none;">
                            <a href="#"> <img src="{{ asset('frontend') }}/img/markus-spiske-iar-afB0QQw-unsplash.png" class="card-img-top wow bounceIn"></a>
                            <div class="card-body">
                                <span class="wow slideInLeft">Technology</span>
                                <a href="#">
                                    <h5 class="card-title wow slideInRight">Big Title 3</h5>
                                </a>
                                <p class="card-text wow slideInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. </p>
                                <a href="#" class="btn wow zoomIn">Read More</a>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="row text-center">
                    <a href="{{ route('news') }}" class="btn btn-warning" style="margin: auto;"> View All News & Events</a>
                </div>

            </div>
        </section>           
        @endif

        <!-- End News -->
    
        <!-- Start Partnaers -->
        @if (!$partnaers->isEmpty())
        <section class="partnaers" id="partnaers">
            <div class="container">
                <div class="section-title  wow slideInLeft">
                    <h2>Our Partnaers</h2>
                    <span></span>
                </div>
            </div>
            <div class="container-fluid  px-0">
                <div class="partnaers owl-carousel owl-theme">
                    {{-- <div class="item">
                        <img src="{{ asset('frontend') }}/img/Ellipse 37.png" alt="" class="wow shake">
                    </div>
                    <div class="item">
                        <img src="{{ asset('frontend') }}/img/Ellipse 38.png" alt="" class="wow shake">
                    </div>
                    <div class="item">
                        <img src="{{ asset('frontend') }}/img/Ellipse 37.png" alt="" class="wow shake">
                    </div>
                    <div class="item">
                        <img src="{{ asset('frontend') }}/img/Ellipse 37.png" alt="" class="wow shake">
                    </div> --}}
                    {{-- @foreach ($companies as $company)
                    <div class="item">
                        <div class="item">
                           <a href="{{ as }}"><img src="{{ asset('company'.$company->logo) }}" alt="" class="wow shake"></a> 
                        </div>
                    @endforeach --}}
                        @foreach ($partnaers as $partnaer)
                        <div class="item">
                            <a href="{{ $partnaer->link }}"><img src="{{ asset('partnaers/'.$partnaer->image) }}" title="{{ $partnaer->title }}" alt="{{ $partnaer->title }}" class="wow shake"></a> 
                        </div>
                        @endforeach
                  
                    
                </div>
            </div>
        </section>     
        @endif

        <!-- End Partnaers -->
    
        <!-- Start Touch -->
        <section class="touch" id="contact">
            <div class="container">
                <div class="section-title  wow slideInLeft">
                    <h2>Get In Touch</h2>
                    <span></span>
                </div>
                <div class="contact-us">
                    <form action="{{ route('storeContactUs') }}" method="post">
                        @csrf
                        <div class="row justify-content-center ">
                            <div class="col-md-6">
                                <div class="form-group wow lightSpeedIn">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Baraa Husain Zoroub">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group wow lightSpeedIn">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email..">
                                </div>
                            </div>
                        </div>
                        <div class="form-group wow lightSpeedIn">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter subject..">
                        </div>
                        <div class="form-group wow lightSpeedIn">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter message.."></textarea>
                        </div>
                        <button type="submit" class="btn badge-primary">Send Message <i
                                class="fa fa-send-o ml-3"></i></button>
                    </form>
                </div>
            </div>
        </section>

        <!-- End Touch -->
@endsection