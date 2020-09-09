<form action="{{ route('admin.'.$route.'.update', ["$bindModel"=>$data->id]) }}" method="post">
    @method('put')
    @csrf
<div class='btn-group'>
    <button type="submit" class="btn btn-success btn-xs" title="read"><i class="fa fa-check"></i></button>
</div>
</form>