
<div class="card-body">
  <div class="form-group">
  <label for="name">Name</label>
  <input type="text" class="form-control" id="name"@isset($sector)  value="{{ $sector->name }}" @endisset  name="name" placeholder="enter sector name">
  </div>

</div>
<!-- /.card-body -->

