<form action="{{ route('admin.'.$route.'.destroy', ['id'=>$data->id]) }}" method="post">
    @method('delete')
    @csrf
<div class='btn-group'>
    <a href="{{ route('admin.'.$route.'.edit', [$data->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('هل انت متأكد من الحذف ؟')"><i class="fa fa-trash"></i></button>
</div>
</form>