<x-admin-master>

    @section('content')
    <h1>Create Post</h1>
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" type="text" id='title' placeholder="Title" class="form-control">
            </div>
           
            <div class="form-group">
                <label for="post_image">File</label>
                <input type="file" name="post_image" id="post_image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" cols="30",  rows="5" class="form-control" type="text" id='body' placeholder="Body" class="form-control">
                </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>


        </form>

    @endsection
</x-admin-master>