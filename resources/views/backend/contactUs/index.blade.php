@extends('backend.layouts.app')

@section('content')

    <section class="content-header">
        {{-- <h1 class="pull-left">{{ __('dashboard.attributes.prodcut') }}</h1> --}}

    </section>
    <div class="content">
        <div class="clearfix"></div>

        {{-- @include('flash::message') --}}

        <div class="clearfix"></div>
        <div class="box box-primary">
 
            <div class="box-body">
                    @include('backend.contactUs.table')
            </div>
        </div>

    </div>
@push('js')
    <script>
        
  $(function () {
    $('#form-users').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
    </script>
@endpush
@endsection

