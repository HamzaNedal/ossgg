
<div class="card-body">
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name"@isset($company)  value="{{ $company->name }}" @endisset  name="name" placeholder="enter name company">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10"  placeholder="enter description to company">@isset($company){{$company->description}}@endisset</textarea>
        </div>
    <div class="form-group">
        <label for="link">Link</label>
        <input type="text" class="form-control" id="link" @isset($company) value="{{ $company->link }}" @endisset  name="link" placeholder="enter link company">
      </div>

  

    <div class="form-group">
      <label for="photo">logo</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="photo" name="logo">
          <label class="custom-file-label" for="logo">Add logo</label>
        </div>

      </div>
    </div>
  </div>
  <!-- /.card-body -->

