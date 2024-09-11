@extends('backend.layouts.app')

@section('content')
    <h1 class="py-4" >Add New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder=". . .">
            @error('title')
                <span class="text-danger" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea name="body" placeholder=". . ." class="form-control" id="body" rows="3"></textarea>
            @error('body')
                <span class="text-danger" >
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="image">
            @error('image')
                <span class="text-danger" >
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Category</label>
            <select class="form-select" name="category">
                <option value="{{ null }}" selected>-- Choose Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <input type="submit" value="Publish" class="btn btn-primary" id="submit">
        </div>

    </form>

@endsection
