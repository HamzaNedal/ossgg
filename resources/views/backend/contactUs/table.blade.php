
<div class="table-responsive">

    <div class="card">
        <div class="card-header">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="form-users" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="form-users">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Created at</th>
                        {{-- <th colspan="3">Acation</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->subject }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>{{ $contact->created_at }}</td>
                        {{-- <td>
                            <form action="{{ route('admin.contactUs.destroy', ['id'=>$contact->id]) }}" method="post">
                                @method('delete')
                                @csrf
                            {{-- <div class='btn-group'> --}}
                                {{-- <a href="{{ route('post.show', [$user->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a> --}}
                                {{-- <a href="{{ route('admin.post.edit', [$post->id]) }}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a> --}}
                                {{-- <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('هل انت متأكد من الحذف ؟')"><i class="fa fa-trash"></i></button> --}}
                                {{-- {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('هل انت متأكد من الحذف ؟')"]) !!} --}}
                            {{-- </div> --}}
                        {{-- </form> --}}
                        {{-- </td> --}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
      </div>


</div>
