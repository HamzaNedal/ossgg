@extends('backend.layouts.app')

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
                    @include('backend.partnaers.table')
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

