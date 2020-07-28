
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
        <label for="link">Link</label>
        <input type="text" class="form-control" id="link" @isset($slider)  value="{{ $slider->link }}" @endisset  name="link" placeholder="enter link">
      </div>
    <div class="form-group">
      <label for="photo">Image(optional)</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file"  id="photoInput" name="image">
          {{-- <label class="custom-file-label" for="image">Add Image</label> --}}
          @isset($slider)
          <img src="{{ asset('image/'.$slider->image) }}" alt="" class="returnImage" style="width: 50px;" id="image"> 
          <img src="{{ asset('image/'.$slider->image) }}" class="d-none backImage" style="width: 50px;"> 
          <i class="fa fa-undo undoImage"  aria-hidden="true" alt='undo' style="margin-left: 8px;cursor: pointer;"></i>
          @else
          <img src="#" class="d-none" alt="" style="width: 50px;" id="image">
        @endisset
        </div>

      </div>
    </div>
    <div class="form-group">
      <label for="background-image">Background Image</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file"  id="background-image" name="background_image">
          {{-- <label class="custom-file-label" for="image">Add Background Image</label> --}}
          @isset($slider)
          <img src="{{ asset('background_image/'.$slider->background_image) }}" alt="" style="width: 50px;" class="returnImage" id="background_image"> 
          <img src="{{ asset('background_image/'.$slider->background_image) }}" class="d-none backImage" style="width: 50px;"> 
          <i class="fa fa-undo undoImage"  aria-hidden="true" alt='undo' style="margin-left: 8px;cursor: pointer;"></i>
          @else
          <img src="#" class="d-none" alt="" style="width: 50px;" id="background_image">
        @endisset
        </div>

      </div>
    </div>
  </div>
  <!-- /.card-body -->

