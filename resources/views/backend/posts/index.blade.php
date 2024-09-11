@extends('backend.layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center" >
        <h1 class="py-4" >Posts</h1>
        <div>
            <a class="btn btn-primary btn-sm" href="{{ route('posts.create') }}"><i class="fa-solid fa-plus me-1"></i>Add New Post</a>
        </div>
    </div>

    @if($posts->count() > 0)
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Image</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Image</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ substr($post->title,0 ,50) }}</td>
                                <td>{{ substr($post->body,0 ,40) }}</td>
                                <td>
                                    <img class="rounded" height="50px" width="50px" src="{{ asset('backend/assets/images/posts/') }}/{{ $post->image }}" alt="post-image">
                                </td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    <div class="pt-2" style="min-width: 250px" >
                                        <a class="btn btn-sm btn-primary" target="_blank" href="{{ route('frontend.posts.show', $post->id) }}"><i class="fa-regular fa-newspaper me-1"></i>Show</a>
                                        <a class="btn btn-sm btn-success" href="{{ route('posts.edit', $post->id) }}"><i class="fa-regular fa-pen-to-square me-1"></i>Edit</a>
                                        <form class="d-inline-block" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit"><i class="fa-solid fa-trash-can me-1"></i>Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <span>There Is No Post to Show</span>
    @endif
@endsection

@section('script')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        @if (session('success'))
            Swal.fire({
                title: 'Article Published Successfully',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>

@endsection
