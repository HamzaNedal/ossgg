
<div class="card-body">
  <div class="form-group">
    <label for="name">Title</label>
    <input type="text" class="form-control" id="name"@isset($post)  value="{{ $post->title }}" @endisset  name="title" placeholder="enter title">
    </div>
    <div class="form-group">
      <label for="name">Cagertory</label>
      <select class="form-control" name="category_id">
        @foreach ($categories as $category)
          <option value="{{ $category->id }}" @isset($post)@if ($category->id == $post->category->id) {{ 'selected' }} @endif @endisset>{{ $category->name }}</option>
        @endforeach
            
      </select>   
      <small><a href="{{ route('admin.category.create') }}">Add category</a></small>
   </div>
       <div class="form-group">
      <label for="photo">Image(The image must be size 336x504)</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="" id="photo" name="image">
          {{-- <label class="custom-file-label" for="image">Add Image</label> --}}
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

