@extends('backend.layouts.app')
@section('title', 'Edit Post')

@section('content')
@push('css')
<link rel="stylesheet" href="{{ asset('backend') }}/plugins/summernote/summernote-bs4.css">

@endpush
    <div class="content">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif              <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary mt-2 mr-2">
                          <div class="card-header">
                            <h3 class="card-title">Edit post</h3>
                          </div>
                          <form action="{{ route('admin.post.update',['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('put')
                              @include('backend.posts.fields')
                                                        
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                          </form>
  
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
    <script src="{{ asset('backend') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="{{ asset('js/summernote-ext-rtl.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
             $('.textarea').summernote({
              height: 200,
              dialogsInBody: true,
              callbacks:{
                  onInit:function(){
                  $('body > .note-popover').hide();
                  }
               },
           });
        });
        function resetFile() { 
            const file = 
                document.getElementById('photoInput'); 
            file.value = ''; 
        } 
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('#image').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#photoInput").change(function() {
            readURL(this);
        });
        $(document).on('click','.undoImage',function(){
            // console.log('asfd');
            resetFile();
            src = $('.backImage').attr('src');
            $('#image').attr('src', src);
           
        })
        
  </script>
    @endpush
@endsection