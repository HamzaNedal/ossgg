    <!-- Js File -->
    <script src="{{ asset('frontend') }}/js/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{ asset('frontend') }}/js/popper.js"></script>
        <!-- jQuery -->
{{-- <script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script> --}}
<!-- Bootstrap 4 -->
<script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend') }}/js/smooth-scroll.min.js"></script>
    <script src="{{ asset('frontend') }}/js/wow.min.js"></script>

    <script src="{{ asset('frontend') }}/js/script.js"></script>

    @toastr_js
    @toastr_render
    <script>
        new WOW().init();
        $(document).ready(function() {
            $('.select2bs4').select2()
        });

        $(document).on('change','#country_name',function(){
       var parent_code =  $(this).find(':selected').data('code')
       console.log($(this).find(':selected').data('code'));
        $('#phone_country_code').children().toArray().forEach((element) => {
            if(parent_code == element.value){
                document.getElementById('phone_country_code').value = parent_code;
            }
        }); 
        $('#phone_country_code').trigger('change');
    })
    $(window).on('scroll',function(){
        var currentScrollPos = window.pageYOffset;        
        if (currentScrollPos > 0 ) {
            $('.main-header').addClass('fixed-top')
        }else{
            if($('.main-header').hasClass('fixed-top')){
                $('.main-header').removeClass('fixed-top')
            }
        }
        
       
    });
    $(document).ready(function(){

    //Check to see if the window is top if not then display button
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    //Click event to scroll to top
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

    });
    
    </script>

