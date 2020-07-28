@extends('backend.layouts.app')

@section('content')
 
    <div class="content">
        <div class="content">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif          <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary mt-2 mr-2">
                          <div class="card-header">
                            <h3 class="card-title">Edit Slider</h3>
                          </div>
                          <form action="{{ route('admin.slider.update',['id'=>$slider->id]) }}" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('put')
                              @include('backend.sliders.fields')
                                                        
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
    <script>
        function resetFile(file) { 
            // const file = 
            //     document.getElementById('photoInput'); 
            console.log(file);
            file.val(''); 
        } 
        function readURL(input,id) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function(e) {
                    $(`#${id}`).attr('src', e.target.result);
                    $(`#${id}`).removeClass('d-none');
                    }
                    
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

        $("#photoInput").change(function() {
            readURL(this,'photoInput');
        });
        $("#background-image").change(function() {
            readURL(this,'background_image');
        });
        $(document).on('click','.undoImage',function(){
            resetFile($(this).siblings('#background-image'));
            src = $(this).siblings('.backImage').attr('src');
            // console.log(src)
            $(this).siblings('.returnImage').attr('src', src);
        })
     </script>
  @endpush
@endsection