
<div class="card-body">
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name"@isset($member)  value="{{ $member->name }}" @endisset value="{{ old('name') }}" name="name" placeholder="enter name">
    </div>

  </div>
  <!-- /.card-body -->

