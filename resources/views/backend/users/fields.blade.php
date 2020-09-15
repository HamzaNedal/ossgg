
<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="email">Username</label>
        <input type="text" class="form-control" id="email" @isset($user) value="{{ $user->name }}" @endisset value="{{ old('name') }}"  name="name" placeholder="enter username ">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" @isset($user) value="{{ $user->email }}" @endisset value="{{ old('email') }}"  name="email" placeholder="enter email ">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password"  name="password" placeholder="enter password">
        </div>
    </div>

    <div class="form-group">
      <label for="photo">Image</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="" id="photoInput" name="image">
          @isset($user)
          <img src="{{ asset('profile/'.$user->image) }}" alt="" style="width: 50px;" id="image"> 
          <img src="{{ asset('profile/'.$user->image) }}" class="d-none backImage" style="width: 50px;"> 
          <i class="fa fa-undo undoImage"  aria-hidden="true" alt='undo' style="margin-left: 8px;cursor: pointer;"></i>
          @else
          <img src="#" class="d-none" alt="" style="width: 50px;" id="image">
        @endisset
        </div>

      </div>
    </div>
  </div>
  
  <!-- /.card-body -->

