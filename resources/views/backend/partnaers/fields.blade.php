
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
          <input type="file" class="" id="photoInput" name="image">
          {{-- <label class="custom-file-label" for="logo">Add logo</label> --}}
          @isset($partnaer)
          <img src="{{ asset('partnaers/'.$partnaer->image) }}" alt="" style="width: 50px;" id="image"> 
          <img src="{{ asset('partnaers/'.$partnaer->image) }}" class="d-none backImage" style="width: 50px;"> 
          <i class="fa fa-undo undoImage"  aria-hidden="true" alt='undo' style="margin-left: 8px;cursor: pointer;"></i>
          @else
          <img src="#" class="d-none" alt="" style="width: 50px;" id="image">
        @endisset
        </div>

      </div>
    </div>
  </div>
  <!-- /.card-body -->

