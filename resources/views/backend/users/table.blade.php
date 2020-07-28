
<div class="table-responsive">

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('admin.users.create') }}">Add User</a>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="form-users" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="form-users">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Image</th>
                        <th>Created at </th>
                        <th colspan="3">Acation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->dob }}</td>
                    <td>{{ $user->gender }}</td>
                    <td><img src="{{ asset('profile/'.$user->image) }}" style="width: 60px;hieght:60px" alt=""></td>
                    <td>{{ $user->created_at }}</td>
                        <td>
                            <form action="{{ route('admin.users.destroy', ['id'=>$user->id]) }}" method="post">
                                @method('delete')
                                @csrf
                            <div class='btn-group'>
                                {{-- <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a> --}}
                                <a href="{{ route('admin.users.edit', [$user->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
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
