
<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name"@isset($user)  value="{{ $user->name }}" @endisset  name="name" placeholder="enter name">
        </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" @isset($user) value="{{ $user->email }}" @endisset  name="email" placeholder="enter email ">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password"  name="password" placeholder="enter password">
        </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="mobile">Gender</label>
        <select class="form-control" name="gender">
             <option value="0" @isset($user) @if($user->gender == "None") {{ 'selected' }} @endif @endisset>choose</option>
             <option value="1" @isset($user) @if($user->gender == 'Male') {{ 'selected' }} @endif @endisset>male</option>
             <option value="2" @isset($user) @if($user->gender == "Female") {{ 'selected' }} @endif @endisset>female</option>
      </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Date:</label>
        <input type="date" name="dob" class="form-control datetimepicker-input" data-target="#reservationdate">

      </div>
    </div>
  </div>
    

    <div class="form-group">
      <label for="photo">Image</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="" id="photoInput" name="image">
          {{-- <label class="custom-file-label" for="logo">Add logo</label> --}}
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

