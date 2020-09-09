
<div class="card-body">
  <div class="form-group">
    <label for="name">Title</label>
    <input type="text" class="form-control" id="name"@isset($post)  value="{{ $post->title }}" @endisset value="{{ old('title') }}"  name="title" placeholder="enter title">
    </div>
    <div class="form-group">
      <label for="category_id">Cagertory</label>
      <select class="form-control" name="category_id">
        @foreach ($categories as $category)
          <option value="{{ $category->id }}" @isset($post)@if ($category->id == $post->category->id) {{ 'selected' }} @endif @endisset>{{ $category->name }}</option>
        @endforeach
            
      </select>   
      <small><a href="{{ route('admin.category.create') }}">Add category</a></small>
   </div>
       <div class="form-group">
      <label for="photoInput">Image</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="" id="photoInput" name="image">
          @isset($post)
            <img src="{{ asset('posts/'.$post->image) }}" alt="" style="width: 50px;" id="image"> 
            <img src="{{ asset('posts/'.$post->image) }}" class="d-none backImage" style="width: 50px;"> 
            <i class="fa fa-undo undoImage"  aria-hidden="true" title='undo' alt='undo' style="margin-left: 8px;cursor: pointer;"></i>
            @else
            <img src="#" class="d-none" alt="" style="width: 50px;" id="image">
          @endisset
        </div>

      </div>
    </div>
      <div class="form-group">
        <label><strong>Description :</strong></label>

        <textarea class="textarea" name="description" placeholder="Place some text here"
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">@isset($post) {{ $post->description }} @endisset</textarea>
      </div>

  {{-- <div class="form-group">
    <label><strong>Description :</strong></label>
    <textarea class="summernote" name="description">@isset($post) {{ $post->description }} @endisset</textarea>
</div> --}}

  </div>
  <!-- /.card-body -->

