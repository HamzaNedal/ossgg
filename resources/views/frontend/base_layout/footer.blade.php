
    <!-- Start Footer -->
    <footer class="footer wow bounceInUp">
        <div class="container text-light">
            <div class="row justify-content-center">
                <div class="col-md-3 logo">
                    <img src="{{ asset('frontend') }}/img/Group 122.png" alt="">
                </div>
                <div class="col-md-5 contact">
                    <ul class="list-unstyled">
                        <li>
                            @isset($static_page['address']) <i class="fa fa-map-marker mr-3"></i>
                            <span>{{ $static_page['address'] }}  </span>
                            @endisset
                        </li>
                        <li>
                            @isset($static_page['mobile'])
                            <i class="fa fa-whatsapp mr-3"></i><span> {{ $static_page['mobile'] }} </span>
                            @endisset
                        
                        </li>
                        <li>
                            @isset($static_page['phone'])
                            <i class="fa fa-phone mr-3"></i> <span> {{ $static_page['phone'] }} </span> 
                            @endisset
                        </li>
                    </ul>
                </div>
               
                <div class="col-md-4 members">
                    <h4>Members</h4>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                @if (!$users->isEmpty())
                                    @foreach ($users as $key => $user)
                                    {{-- {{ dd($key) }} --}}
                                    @if ($key >= 4)
                                        @push('member')
                                            <li style="text-transform: capitalize;">{{ $user->name }}</li>
                                        @endpush
                                        @else
                                        <li>{{ $user->name }}</li>
                                    @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                            @stack('member')
                            </ul>
                        </div>
                    </div>
                </div>  
              

            </div>
        </div>

    </footer>
    <!-- End Footer -->