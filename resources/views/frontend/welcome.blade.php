@extends('frontend.layouts.app')
@section('title', 'Home')

@section('content')
@push('css')
<style>
    h4{
        text-transform: capitalize;
    }
    .item-01 h4::before{
        content: '';
    position: absolute;
    display: inline-block;
    width: 60px;
    height: 60px;
    background-color: #FFD922;
    border-radius: 50%;
    top: 0;
    /* left: 0; */
    margin-left: -32px;
    z-index: -1;
}
.item-02 h4::before{
    content: '';
    position: absolute;
    display: inline-block;
    width: 60px;
    height: 60px;
    background-color: #FFD922;
    border-radius: 50%;
    top: 0;
    /* left: 0; */
    margin-left: -32px;
    z-index: -1;
}
#sector_of_project_id:after{
  width: 0; 
  height: 0; 
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-top: 6px solid #f00;
  position: absolute;
  top: 40%;
  right: 5px;
  content: "";
  z-index: 98;
 }
 .custom-select{
        background: #fff url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAFCAYAAABirU3bAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACZJREFUeNpiYACCPwckGkAYxGYEMgyA9HkGCDBkQAfYVSCbARBgAKpZD1vniviBAAAAAElFTkSuQmCC') no-repeat right .75rem center/8px 10px ;
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
                                        </div>
                                        <p>{{$slider->description}}</p>
                                        @if ($slider->link)
                                           <a href="{{ $slider->link }}" class="btn btn-one" target="_blank" rel="nofollow">Learn More</a>
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
                                        </div>
                                        <p>{{$slider->description}}.</p>
                                        @if ($slider->link)
                                        <a href="{{ $slider->link }}" class="btn btn-one" target="_blank" rel="nofollow">Learn More</a>
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
                            @if ($about->name == 'our vision')
                             <img src="{{ asset('frontend') }}/img/eye.png" alt="">
                            @endif
                            @if ($about->name == 'our mission')
                            <img src="{{ asset('frontend') }}/img/target.png" alt="">
                           @endif
                            @if ($about->name == 'our values')
                            <img src="{{ asset('frontend') }}/img/correct.png" alt="">
                            @endif
                            @if ($about->name == 'our policies')
                            <img src="{{ asset('frontend') }}/img/shield (1).png" alt="">
                            @endif
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
                                <a href="{{ $company->link }}" target="_blank" rel="nofollow"><img src="{{ asset('company/'.$company->image) }}" alt="" class="wow fadeInUpBig"></a>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <div class="title wow jackInTheBox">
                                    <a href="{{ $company->link }}" target="_blank" rel="nofollow"><h4>{{ $company->name }}</h4></a>
                                    <p>
                                        {{ $company->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

    
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
                                    <select class="custom-select my-1 mr-sm-2" name="sector_of_project_id" id="sector_of_project_id">
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
                        <div class="card news-card wow bounceIn" style="border: none;">
                            <div class="date">
                                {{-- @php
                                    $post->cerated_at = $post->
                                @endphp --}}
                                <span>{{date('d', strtotime( $post->created_at))}}
                                </span>
                                <span> {{date('F', strtotime( $post->created_at))}}</span>
                            </div>
                            <a href="{{ route('details.news', ['id'=>$post->id]) }}">
                                <div class="img-card card-img-top "
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
                    <h2>Our Partners</h2>
                    <span></span>
                </div>
            </div>
            <div class="container-fluid  px-0">
                <div class="partnaers owl-carousel owl-theme">

                        @foreach ($partnaers as $partnaer)
                        <div class="item">
                          <div class="part-img">
                              <a href="{{ $partnaer->link }}" target="_blank" rel="nofollow"><img src="{{ asset('partnaers/'.$partnaer->image) }}" title="{{ $partnaer->title }}" alt="{{ $partnaer->title }}" class="wow shake"></a> 
                          </div> 
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
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
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
        <button class="scrollToTop" id="scrollToTop" style="display: inline-block;"><i class="fa fa-arrow-up"></i></button>
@endsection