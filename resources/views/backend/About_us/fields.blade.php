
<div class="card-body">
  <div class="row" id="form-static">
    @foreach ($about_us as $key => $data)
    <div class="col-md-6">
      <div class="form-group">
        <label for="{{ $data->name }}">{{ $data->name }}</label>
        <textarea class="form-control"   name="{{ $data->name }}[value]">{{ $data->value ?? '' }}</textarea>
        <div class="form-check">
          {{-- <input class="form-check-input" id="{{$data->name  }}" type="checkbox"  name="{{ $data->name }}[status]" {{ $data['status'] == 1 ? 'checked value=1'  : 'value=0' }}> --}}
          {{-- <label class="form-check-label" for="{{ $data->name }}">    Status     </label> --}}
          {{-- @if ($data->name !='Who are OSSGG?')
          <div class="iconEdit">
            <a href="#" class="iconClick">     <i class="fa fa-paperclip"></i></a>
            <input class="form-input d-none icon" id="{{$data->icon  }}" type="file"  name="{{ $data->name }}[file]">
            <label class="form-check-label" for="{{ $data->icon }}">add icon</label>
          </div>
          @endif --}}
          @if ($data->name !='Who are OSSGG?')
          <input class="form-check-input" id="{{$data->name  }}" type="checkbox"  name="{{ $data->name }}[status]" {{ $data['status'] == 1 ? 'checked value=1'  : 'value=0' }}>
          <label class="form-check-label" for="{{ $data->name }}">    Status     </label>
          @endif

        </div>
        <div class="form-check">

        </div>
      </div> 
      </div>
    @endforeach

    </div>
    {{-- <div class="input_fields_wrap">
      <button class="add_field_button btn btn-primary" type="button">Add More Fields</button>
  </div> --}}
  </div>
  <!-- /.card-body -->

