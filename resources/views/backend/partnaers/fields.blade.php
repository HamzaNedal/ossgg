
<div class="card-body">
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name"@isset($partnaer)  value="{{ $partnaer->title }}" @endisset  name="title" placeholder="enter name partnaer">
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <input type="text" class="form-control" id="link" @isset($partnaer) value="{{ $partnaer->link }}" @endisset  name="link" placeholder="enter link partnaer">
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

