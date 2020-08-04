
<div class="card-body">
  <div class="row" id="form-static">
    @foreach ($about_us as $key => $data)
    <div class="col-md-6">
      <div class="form-group">
        <label for="{{ str_replace(' ', '_', $data->name)  }}">{{ $data->name }}</label>
        <textarea class="form-control"   name="{{ $data->name = str_replace(' ', '_', $data->name)  }}[value]">{{ $data->value ?? '' }}</textarea>
        <div class="form-check">
          @if ($data->name !='Who_are_OSSGG?')
          <input class="form-check-input" id="{{ $data->name = str_replace(' ', '_', $data->name)  }}" type="checkbox"  name="{{ $data->name = str_replace(' ', '_', $data->name)  }}[status]" {{ $data['status'] == 1 ? 'checked value=1'  : 'value=0' }}>
          <label class="form-check-label" for="{{ $data->name = str_replace(' ', '_', $data->name)  }}">    Status     </label>
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

