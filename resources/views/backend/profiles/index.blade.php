@extends('backend.layouts.app')

@section('content')
    <h1 class="py-4" >Profile Informations</h1>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="logo-image" class="form-label">Name</label>
            <div class="d-flex align-items-center" >
                <input type="text" name="name" value="{{ $user_data->name }}" class="form-control" placeholder=". . ." id="logo-image">
            </div>
            @error('title')
                <span class="text-danger" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="logo-image" class="form-label">Email</label>
            <div class="d-flex align-items-center" >
                <input type="email" name="email" value="{{ $user_data->email }}" placeholder=". . ." class="form-control" id="logo-image">
            </div>
            @error('title')
                <span class="text-danger" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="hero-image" class="form-label">Profile Picture</label>
            <div class="d-flex align-items-center" >
                <div>
                    <img width="140px" height="140px" class="p-2 mt-3 mb-4 me-4 border rounded" src="{{ asset('img') }}/{{ $user_data->image ? $user_data->image : 'user-pic.png'}}" alt="current-logo-image">
                </div>
                <input type="file" name="image" class="form-control" id="hero-image">
            </div>
            @error('body')
                <span class="text-danger" >
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="logo-image" class="form-label">New Password</label>
            <div class="d-flex align-items-center" >
                <input type="password" name="password" class="form-control" placeholder="********" id="logo-image">
            </div>
            @error('title')
                <span class="text-danger" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
        
        <div class="mb-3 d-flex justify-content-end">
            <input type="submit" value="Update Profile" class="btn btn-primary" id="submit">
        </div>

    </form>

@endsection

@section('script')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        @if (session('success'))
            Swal.fire({
                title: '{{ session("success") }}',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>

@endsection

