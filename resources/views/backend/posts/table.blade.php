
<div class="table-responsive">

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('admin.post.create') }}">Add Post</a>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="form-users" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="form-users">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>image</th>
                        <th colspan="3">Acation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td><img src="{{ asset('posts/'.$post->image) }}" style="width: 60px;hieght:60px" alt=""></td>
                    <td>{{ $post->created_at }}</td>
                        <td>
                            <form action="{{ route('admin.post.destroy', ['id'=>$post->id]) }}" method="post">
                                @method('delete')
                                @csrf
                            <div class='btn-group'>
                                {{-- <a href="{{ route('post.show', [$user->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a> --}}
                                <a href="{{ route('admin.post.edit', [$post->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
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
