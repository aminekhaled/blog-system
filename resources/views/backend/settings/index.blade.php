@extends('backend.layouts.app')

@section('content')
    <h1 class="py-4" >Website Settings</h1>

    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="logo-image" class="form-label">Website Logo</label>
            <div class="d-flex align-items-center" >
                <div>
                    <img width="200px" class="p-5 mt-3 mb-4 me-4 border rounded" src="{{ asset('img') }}/{{$settings->logo_image}}" alt="current-logo-image">
                </div>
                <input type="file" name="logo_image" class="form-control" id="logo-image">
            </div>
            @error('title')
                <span class="text-danger" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="hero-image" class="form-label">Hero Image</label>
            <div class="d-flex align-items-center" >
                <div>
                    <img height="120px" class="p-2 mt-3 mb-4 me-4 border rounded" src="{{ asset('../img/banner') }}/{{$settings->hero_image}}" alt="current-logo-image">
                </div>
                <input type="file" name="hero_image" class="form-control" id="hero-image">
            </div>
            @error('body')
                <span class="text-danger" >
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hero Title</label>
            <input type="text" value="{{ $settings->hero_title }}" placeholder=". . ." name="hero_title" class="form-control" id="hero_title">
            @error('image')
                <span class="text-danger" >
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">hero Text</label>
            <input type="text" value="{{ $settings->hero_text }}" placeholder=". . ." name="hero_text" class="form-control" id="hero-text">
            @error('image')
                <span class="text-danger" >
                    {{ $message }}
                </span>
            @enderror
        </div>
        
        <div class="mb-3">
            <input type="submit" value="Update Settings" class="btn btn-primary" id="submit">
        </div>

    </form>

@endsection
