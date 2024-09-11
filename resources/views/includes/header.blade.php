@php
    $logo = App\Models\Setting::get()->first()->logo_image;

    $categories = App\Models\Category::get();
@endphp
<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="index.html"><img height="40px" src="{{ asset('img') }}/{{$logo}}" alt="logo_image"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-center">
                <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li> 
                <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Categories</a>
                <ul class="dropdown-menu">
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
            </ul>
            
            @guest
                <ul class="nav navbar-nav navbar-right navbar-social d-flex justify-content-end">
                    <li>
                        <a href="{{ route('register') }}" class=" text-light btn btn-sm btn-warning">Register</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class=" text-light btn btn-sm btn-warning">Login</a>
                    </li>
                </ul>
            @else
                <ul class="nav navbar-nav navbar-right navbar-social d-flex justify-content-end">
                    <li>
                        <a href="{{ route('posts.create') }}" class=" text-light btn btn-sm btn-primary">Add New</a>
                    </li>
                    <li>
                        <a onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" href="{{ route('logout') }}" 
                        class=" text-light btn btn-sm btn-warning">logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            @endguest
            </div> 
        </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->
