<x-admin-master>

    @section('content')
        <h1>All Post</h1>
        @if(session('message'))
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
            @elseif(session('creted_message'))
            <div class="alert alert-success">
                {{session('creted_message')}}
            </div>
        @elseif(session('updated_message'))
            <div class="alert alert-success">
                {{session('updated_message')}}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Body</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Body</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Delete
                            <th>Edit</th>

                        </tr>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>{{Str::limit($post->body, 20, '...')}}</td>
                                <td><div><img src="{{$post->post_image}}" alt=""></div></td>
                                <td>{{$post->created_at}}</td>
                                <td>{{$post->updated_at}}</td>
                                <td>
                                    <form action="{{route('post.destroy', $post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{route('post.edit', $post->id)}}" class="btn btn-primary">Edit</a></td>


                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection
</x-admin-master>
