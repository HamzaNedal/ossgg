@extends('backend.layouts.app')

@section('content')
@push('css')
    <style>
        .add{  
            position: relative;
            bottom: 46px;
            left: 400px;
        }
        .remove{ 
            position: relative;
            bottom: 46px;
            left: 403px;
            }
        
    </style>
@endpush
    <div class="content">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
        {{  Session::get('success') }}
        </div>
      @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif      
      <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary mt-2 mr-2">
                          <div class="card-header">
                            <h3 class="card-title">Setting</h3>
                          </div>
                          <form action="{{ route('admin.static_page.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                                @include('backend.static_page.fields')
                                
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                          </form>
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
    <script src="{{ asset('backend') }}/dist/css/jq.multiinput.min.css"></script>
    <script src="{{ asset('backend') }}/dist/js/jq.multiinput.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-yaml/3.14.0/js-yaml.min.js" integrity="sha512-ia9gcZkLHA+lkNST5XlseHz/No5++YBneMsDp1IZRJSbi1YqQvBeskJuG1kR+PH1w7E0bFgEZegcj0EwpXQnww==" crossorigin="anonymous"></script>
        <script>
            $.get('{{ asset("backend/icons.yml") }}', function(data) {
  
            var parsedYaml = jsyaml.load(data);
            var icons = new Array();
            $.each(parsedYaml.icons, function(index, icon){
                $('#select').append(`<div class="icheck-primary col-2">
                <input type="radio" id="${icon.id}" name="icon" value="${icon.id}">
                <label for="${icon.id}"><i class="fa fa-fw fa-${icon.id}"></i>${icon.id}</label></div>`);
            });
            });
            $('#keys').on('change',function(){
                console.log($(this).val());
                if($(this).val() == 'twitter' ||$(this).val() == 'linkend'||$(this).val() == 'facebook'||$(this).val() == 'youtube'||$(this).val() == 'instagram'){
                    $('#type').html('Link');
                    $('#type').siblings('#val').attr('placeholder','enter url')
                }else{
                    $('#type').html('value');
                    $('#type').siblings('#val').attr('placeholder','enter value')

                }
            });
            $('#member').multiInput({
            limit:6,
            input: $(`<div class="form-group">
    <input type="text" class="form-control"   name="members[]">
    </div> 
  </div> `),
    
            });
        </script>
    @endpush
@endsection
