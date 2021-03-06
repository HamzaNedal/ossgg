
<div class="table-responsive">

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('admin.static_page.create') }}">Add</a>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="form-users" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="form-users">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Icon</th>
                        <th>Status</th>
                        <th>Created At</th>
 
                        <th colspan="3">Acation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($page_static as $val)
                    <tr>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->value }}</td>
                    <td><i class="fa fa-{{ $val->icon }}"></i></td>
                    <td>{{ $val->status }}</td>

                    <td>{{ $val->created_at }}</td>
                        <td>
                            <form action="{{ route('admin.static_page.destroy', ['id'=>$val->id]) }}" method="post">
                                @method('delete')
                                @csrf
                            <div class='btn-group'>
                                {{-- <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a> --}}
                                <a href="{{ route('admin.static_page.edit', [$val->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('هل انت متأكد من الحذف ؟')"><i class="fa fa-trash"></i></button>
                                {{-- {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('هل انت متأكد من الحذف ؟')"]) !!} --}}
                            </div>
                        </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
      </div>


</div>
