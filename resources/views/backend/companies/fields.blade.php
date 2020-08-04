
<div class="card-body">
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name"@isset($company)  value="{{ $company->name }}" @endisset value="{{ old('name') }}" name="name" placeholder="enter name company">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10"  placeholder="enter description to company">@isset($company){{$company->description}}@endisset</textarea>
        </div>
    <div class="form-group">
        <label for="link">Link</label>
        <input type="text" class="form-control" id="link" @isset($company) value="{{ $company->link }}" @endisset value="{{ old('name') }}" name="link" placeholder="enter link company">
      </div>

  

    <div class="form-group">
      <label for="photoInput">logo</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="" id="photoInput" name="image">
          @isset($company)
          <img src="{{ asset('company/'.$company->image) }}" alt="" style="width: 50px;" id="image"> 
          <img src="{{ asset('company/'.$company->image) }}" class="d-none backImage" style="width: 50px;"> 
          <i class="fa fa-undo undoImage"  aria-hidden="true" alt='undo' style="margin-left: 8px;cursor: pointer;"></i>
          @else
          <img src="#" class="d-none" alt="" style="width: 50px;" id="image">
        @endisset
        </div>

      </div>
    </div>
  </div>
  <!-- /.card-body -->

