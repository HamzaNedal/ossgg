@extends('backend.layouts.app')

@section('content')
 
    <div class="content">
        <div class="content">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif          <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary mt-2 mr-2">
                          <div class="card-header">
                            <h3 class="card-title">Edit partnaer</h3>
                          </div>
                          <form action="{{ route('admin.partnaer.update',['id'=>$partnaer->id]) }}" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('put')
                              @include('backend.partnaers.fields')
                                                        
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                          </form>
  
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
@endsection