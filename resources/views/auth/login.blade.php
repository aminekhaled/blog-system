@extends('layouts.app')
  
@section('content')
  @include('includes.header')
  <!--================ Hero sm banner start =================-->  
  <section class="mb-5px">
    <div class="container">
      <div class="hero-banner hero-banner--sm">
        <div class="hero-banner__content">
          <h1>Login</h1>
        </div>
      </div>
    </div>
  </section>
  <!--================ Hero sm banner end =================-->  

  <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-6 mx-auto">
          <form action="{{ route('login') }}" class="form-contact contact_form" method="POST" id="contactForm" novalidate="novalidate">
            @csrf
            <div class="form-group">
                <input class="form-control border" name="email" id="email" type="email" placeholder="Enter email address">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control border @error('password') is-invalid @enderror" name="password" id="name" type="password" placeholder="************">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group text-center text-md-right mt-3">
              <button type="submit" class="button button--active button-contactForm">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->
  @include('includes.footer')
@endsection