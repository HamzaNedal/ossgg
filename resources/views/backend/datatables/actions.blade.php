<form action="{{ route('admin.'.$route.'.destroy', ['id'=>$data->id]) }}" method="post">
    @method('delete')
    @csrf
<div class='btn-group'>
    {{-- @dd($route == "profile") --}}
    @if ($route!='service_requests' && $route != "profile")
    <a href="{{ route('admin.'.$route.'.edit', [$data->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
    @endif
    @if ($route=='service_requests')
        @if ($data->status == 0)
        <a class="btn btn-success btn-xs mr-2" title="Read"  href="{{ route('admin.service_requests.status.update', ['service'=>$data->id]) }}"><i class="fa fa-check"></i></a> 
        @endif
        
    @endif
    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('هل انت متأكد من الحذف ؟')"><i class="fa fa-trash"></i></button>
</div>
</form>