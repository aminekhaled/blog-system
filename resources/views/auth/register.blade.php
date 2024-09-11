
  
  

  @extends('layouts.app')
  
  @section('content')
    @include('includes.header')

    <!--================ Hero sm banner start =================-->  
  <section class="mb-5px">
    <div class="container">
      <div class="hero-banner hero-banner--sm">
        <div class="hero-banner__content">
          <h1>Register</h1>
        </div>
      </div>
    </div>
  </section>
  <!--================ Hero sm banner end =================-->  

  <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">
            <form action="{{ route('register') }}" class="form-contact contact_form" method="POST" id="contactForm" novalidate="novalidate">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input class="form-control border @error('name') is-invalid @enderror" required autofocus value="{{ old('name') }}" name="name" id="name" type="text" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <input class="form-control border @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" type="email" placeholder="Enter email address">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input class="form-control border @error('email') is-invalid @enderror" name="password" id="name" type="password" placeholder="Enter your password">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" class="form-control border" name="password_confirmation" required type="password" placeholder="Enter your password confirmation">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group text-center text-md-right mt-3">
                    <button type="submit" class="button button--active button-contactForm">Register</button>
                </div>
            </form>

        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->  
    
    @include('includes.footer')
  @endsection