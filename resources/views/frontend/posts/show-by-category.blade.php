@extends('layouts.app')

@section('content')
  @include('includes.header')

  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin">
    <div class="container">
        @foreach($postsByCategory as $post)
            <h1>{{ $post->title }}</h1>                
        @endforeach
    </div>
  </section>
  <!--================ End Blog Post Area =================-->

  @include('includes.footer')
@endsection
