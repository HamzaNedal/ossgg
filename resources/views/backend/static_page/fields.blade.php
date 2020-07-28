
<div class="card-body">
  <div class="row" id="form-static">

@php
   $page_static = array_column($page_static->toArray(),'value', 'key')
@endphp
@foreach ($keys as $k => $key)
  @if(array_key_exists($k,$page_static)) 
        <div class="col-md-4">
          <div class="form-group">
            <label for="{{ $key }}">{{ $key }}</label>
            <input type="text" class="form-control" id="{{ $key }}" value="{{ $page_static[$k] }}" name="{{ $k }}">
            </div> 
          </div> 
          @else
          <div class="col-md-4">
            <div class="form-group">
              <label for="{{ $key }}">{{ $key }}</label>
              <input type="text" class="form-control" id="{{ $key }}"  name="{{ $k }}">
              </div> 
            </div> 
  @endif
  
@endforeach
    </div>
  </div>
  <!-- /.card-body -->

