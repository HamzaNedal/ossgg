
<div class="card-body">
    <div class="form-group">
    <label for="title">title</label>
    <input type="text" class="form-control" id="title"@isset($service)  value="{{ $service->title }}" @endisset  value="{{ old('title') }}" name="title" placeholder="enter title">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="description" cols="30" rows="10"  placeholder="enter description to slider">@isset($service){{$service->description}}@endisset {{ old('description') }}</textarea>
      </div>
  </div>
  <!-- /.card-body -->

