@extends('layouts.app')

@section('content')
  @include('includes.header')
    <main class="site-main">
      <!--================Hero Banner start =================-->  
      <section class="mb-30px">
        <div class="container">
          <div class="hero-banner" style="background:url(../img/banner/{{ $settings->hero_image }}) center center no-repeat;background-size: cover" >
            <div class="hero-banner__content">
              <h3>{{ $settings->hero_title }}</h3>
              <h1>{{ $settings->hero_text }}</h1>
            </div>
          </div>
        </div>
      </section>
      <!--================Hero Banner end =================-->  

      <!--================ Blog slider start =================-->  
      <section>
        <div class="container">
          <div class="owl-carousel owl-theme blog-slider">

            @foreach($posts as $post)
              <div class="card blog__slide text-center">
                <div class="blog__slide__img">
                  <img height="230px" class="card-img rounded-0" src="{{ asset('backend/assets/images/posts') }}/{{$post->image}}" alt="post-image">
                </div>
                <div class="blog__slide__content">
                  <a class="blog__slide__label" href="#">{{ $post->category->name }}</a>
                  <h3><a href="#">{{ $post->title }}</a></h3>
                  <p>{{ $post->created_at->diffForHumans() }}</p>
                </div>
              </div>
            @endforeach          
          </div>
        </div>
      </section>
      <!--================ Blog slider end =================-->  

      <!--================ Start Blog Post Area =================-->
      <section class="blog-post-area section-margin mt-4">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
                @foreach($posts as $post)
                  <div class="single-recent-blog-post">
                    <div class="thumb">
                      <img class="img-fluid" src="{{ asset('backend/assets/images/posts') }}/{{$post->image}}" alt="post-image">
                      <ul class="thumb-info">
                        <li><a href="#"><i class="ti-user"></i>{{ $post->user->name }}</a></li>
                        <li><a href="#"><i class="ti-notepad"></i>{{ $post->created_at->diffForHumans() }}</a></li>
                        <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                      </ul>
                    </div>
                    <div class="details mt-20">
                      <a href="blog-single.html">
                        <h3>{{ $post->title }}</h3>
                      </a>
                      <p>{{ substr($post->body, 0, 300) }}</p>
                      <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
                    </div>
                  </div>         
                @endforeach
              <div class="row">
                <div class="col-lg-12">
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">
                                        <i class="ti-angle-left"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="page-item active"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <span aria-hidden="true">
                                        <i class="ti-angle-right"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
              </div>
            </div>

            <!-- Start Blog Post Siddebar -->
            <div class="col-lg-4 sidebar-widgets">
                <div class="widget-wrap">
                  <div class="single-sidebar-widget newsletter-widget">
                    <h4 class="single-sidebar-widget__title">Newsletter</h4>
                    <div class="form-group mt-30">
                      <div class="col-autos">
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'Enter email'">
                      </div>
                    </div>
                    <button class="bbtns d-block mt-20 w-100">Subcribe</button>
                  </div>

                  <div class="single-sidebar-widget post-category-widget">
                    <h4 class="single-sidebar-widget__title">Catgory</h4>
                    <ul class="cat-list mt-20">
                      @foreach($categories as $category)
                        <li>
                          <a href="#" class="d-flex justify-content-between">
                            <p>{{ $category->name }}</p>
                            <p>({{ $category->posts_count }})</p>
                          </a>
                        </li>
                      @endforeach
                    </ul>
                  </div>

                  <div class="single-sidebar-widget popular-post-widget">
                    <h4 class="single-sidebar-widget__title">Recent Post</h4>
                    <div class="popular-post-list">
                      @foreach($posts as $post)
                        <div class="single-post-list">
                          <div class="thumb">
                            <img class="card-img rounded-0" src="{{ asset('backend/assets/images/posts') }}/{{$post->image}}" alt="post-image">
                            <ul class="thumb-info">
                              <li><a href="#">{{ $post->user->name }}</a></li>
                              <li><a href="#">{{ $post->created_at->diffForHumans() }}</a></li>
                            </ul>
                          </div>
                          <div class="details mt-20">
                            <a href="blog-single.html">
                              <h6>{{ $post->title }}</h6>
                            </a>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
            </div>
            <!-- End Blog Post Siddebar -->
          </div>
      </section>
      <!--================ End Blog Post Area =================-->
    </main>
  @include('includes.footer')
@endsection
