
<div class="card-body">
    <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title"@isset($slider)  value="{{ $slider->title }}" @endisset  name="title" placeholder="enter name">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="description" cols="30" rows="10"  placeholder="enter description to slider">@isset($slider){{$slider->description}}@endisset</textarea>
      </div>

    <div class="form-group">
      <label for="photo">Image(optional)</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="photo" name="image">
          <label class="custom-file-label" for="image">Add Image</label>
        </div>

      </div>
    </div>
    <div class="form-group">
      <label for="background-image">Background Image</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="background-image" name="background_image">
          <label class="custom-file-label" for="image">Add Background Image</label>
        </div>

      </div>
    </div>
  </div>
  <!-- /.card-body -->

