@extends('frontend.layouts.app')


@section('content')
        <!-- Start News -->
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
                            <a href="#"><img src="{{ asset('posts/'.$post->image) }}"
                                    class="card-img-top wow bounceIn"></a>
                            <div class="card-body">
                                <span class="wow slideInLeft">{{ $post->category->name }}</span>
                                <a href="#">
                                    <h5 class="card-title wow slideInRight">{{ $post->name }}</h5>
                                </a>
                                @php
                                $post->description =  strip_tags($post->description);
                                $post->description = html_entity_decode($post->description,ENT_IGNORE,"UTF-8");
                                $post->description = Str::substr($post->description, 0, 200)
                              @endphp
                              {{-- {{ dd(Str::substr($post->description, 0, 30)) }} --}}
                              <p class="card-text wow slideInLeft">{{ $post->description }}.... </p>
                              <a href="#" class="btn wow zoomIn">Read More</a>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </section>
        <!-- End News -->
        <section class="paginations">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center my-3">
                        <div style="text-align:center; margin:0 auto">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection