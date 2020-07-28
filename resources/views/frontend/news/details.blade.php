@extends('frontend.layouts.app')

@section('title',  $post->title)

@section('content')
        <!-- Start Breadcrumb -->
        <section>
            <div class="container my-5">
                <div class="d-flex align-items-center p-3 my-2 text-white-50 bg-primary hero-header rounded shadow-sm">
                    <div class="lh-100">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('news') }}">News</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb -->
    
        <!-- Start News -->
        <section class="news-detales" id="news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="d-flex align-items-center p-3 my-2 text-white-50 bg-primary hero-header rounded shadow-sm">
                            <div>
                                <h4>Similar News</h4>
                            </div>
                        </div>
                        <hr>
                        <ul class="list-group">
                            @foreach ($posts as $post1)
                            <li class="list-group-item">
                                <div><a href="{{ route('details.news', ['id'=>$post1->id]) }}"><img style="width: 100%;height:auto; margin-bottom: 15px;" src="{{ asset('posts/'.$post1->image) }}" alt=""></a></div>
                                <a href="{{ route('details.news', ['id'=>$post1->id]) }}"> <h4>{{ $post1->title }}</h4></a>
                                 {{-- @php
                                     $post1->description =  strip_tags($post1->description);
                                     $post1->description = html_entity_decode($post1->description,ENT_IGNORE,"UTF-8");
                                     $post1->description = Str::substr($post1->description, 0, 200)
                                  @endphp
                              <p>{{ $post1->description }}.... </p> --}}
                            </li>
                            @endforeach
                           
                       
    
                        </ul>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="d-flex align-items-center p-3 my-2 text-white-50 bg-primary hero-header rounded shadow-sm">
                            <div>
                                <h4>{{ $post->title }}</h4>
                            </div>
                        </div>
                        <hr>
                        <img src="{{ asset('posts/'.$post->image) }}" style="width: 100%;height: 400px; overflow: hidden;">
                        <hr>
                        <p>
                          {!! $post->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End News -->
    
@endsection