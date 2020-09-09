@extends('backend.layouts.app')
@section('title', 'Posts')

@section('content')

    <section class="content-header">
        {{-- <h1 class="pull-left">{{ __('dashboard.attributes.prodcut') }}</h1> --}}

    </section>
    <div class="content">
        <div class="clearfix"></div>

        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
        {{  Session::get('success') }}
        </div>
      @endif
      @if(Session::has('error'))
      <div class="alert alert-denger" role="alert">
      {{  Session::get('error') }}
      </div>
      @endif

        <div class="clearfix"></div>
        <div class="box box-primary">
 
            <div class="box-body">
                    @include('backend.profile.table')
            </div>
        </div>

    </div>
@push('js')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
     {{-- datatable --}}
     <script>
      $(function() {
          $('#form').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! route('admin.profile.datatable') !!}',
              columns: [
                  { data: 'file', name: 'file' },
                  { data: 'created_at', name: 'created_at' },
                  {data: 'actions', name: 'actions', orderable: false, searchable: false}
              ]
          });
      });
  </script>
@endpush
@endsection

