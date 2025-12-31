
@extends('master')
@section('title','Home')
@section('home-active','active')
<!--================Header Menu Area =================-->
 
  <!--================Header Menu Area =================-->
  
  <main class="site-main">
    <!--================Hero Banner start =================-->  
  
    <!--================Hero Banner end =================-->  
@section('content')
  <section class="mb-30px">
      <div class="container">
        <div class="hero-banner">
          <div class="hero-banner__content">
            <h3>Thchnology_shop </h3>
            <h1>Electronic Shop</h1>
            <h4>since  12, 2016</h4>
          </div>
        </div>
      </div>
    </section>
        <!--================ Blog slider start =================-->  
        <section>
        <div class="container">
            <div class="owl-carousel owl-theme blog-slider">
            <div class="card blog__slide text-center">
                <div class="blog__slide__img">
                <img class="card-img rounded-0" src="{{asset("assets/img")}}/blog/blog-slider/blog-slide1.png" alt="">
                </div>
                <div class="blog__slide__content">
                <a class="blog__slide__label" href="#">Fashion</a>
                <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                <p>2 days ago</p>
                </div>
            </div>
            <div class="card blog__slide text-center">
                <div class="blog__slide__img">
                <img class="card-img rounded-0" src="{{asset("assets/img")}}/blog/blog-slider/blog-slide2.png" alt="">
                </div>
                <div class="blog__slide__content">
                <a class="blog__slide__label" href="#">Fashion</a>
                <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                <p>2 days ago</p>
                </div>
            </div>
            <div class="card blog__slide text-center">
                <div class="blog__slide__img">
                <img class="card-img rounded-0" src="{{asset("assets/img")}}/blog/blog-slider/blog-slide3.png" alt="">
                </div>
                <div class="blog__slide__content">
                <a class="blog__slide__label" href="#">Fashion</a>
                <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                <p>2 days ago</p>
                </div>
            </div>
            <div class="card blog__slide text-center">
                <div class="blog__slide__img">
                <img class="card-img rounded-0" src="{{asset("assets/img")}}/blog/blog-slider/blog-slide1.png" alt="">
                </div>
                <div class="blog__slide__content">
                <a class="blog__slide__label" href="#">Fashion</a>
                <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                <p>2 days ago</p>
                </div>
            </div>
            <div class="card blog__slide text-center">
                <div class="blog__slide__img">
                <img class="card-img rounded-0" src="{{asset("assets/img")}}/blog/blog-slider/blog-slide2.png" alt="">
                </div>
                <div class="blog__slide__content">
                <a class="blog__slide__label" href="#">Fashion</a>
                <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                <p>2 days ago</p>
                </div>
            </div>
            <div class="card blog__slide text-center">
                <div class="blog__slide__img">
                <img class="card-img rounded-0" src="{{asset("assets/img")}}/blog/blog-slider/blog-slide3.png" alt="">
                </div>
                <div class="blog__slide__content">
                <a class="blog__slide__label" href="#">Fashion</a>
                <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                <p>2 days ago</p>
                </div>
            </div>
            </div>
        </div>
        </section>
        <!--================ Blog slider end =================-->  

        <!--================ Start Blog Post Area =================-->
        <section class="blog-post-area section-margin mt-4">
        <div class="container">
            <div class="row">
            <div class="col-lg-8">
                @if(!empty($products) && count($products) > 0 )
                @foreach ( $products as $product)   
                <div class="single-recent-blog-post">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('storage/' . $product->image) }}" alt="">
                            <ul class="thumb-info">
                                                             
                                <li><a href="#"><i class="ti-user"></i>{{ $product->user->name }}</a></li>
                                <li><a href="#"><i class="ti-notepad"></i>{{ $product->created_at}}</a></li>
                                <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                               
                            </ul> 
                        </div>
                        <div class="details mt-20">
                            <a href="blog-single.html">
                            <h3>{{ $product->name }}</h3>
                            </a>
                            <p>{{$product->description}}</p>
                            <p>{{$product->price}} $</p>
                            <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
                             
                        </div>
                </div>
                @endforeach  
                @endif


                <div class="row">
                <div class="col-lg-12">
                   {{ $products->render("pagination::bootstrap-4") }}
                </div>
                </div>
            </div>

@include('theme.sidebar')
        </div>
        </div>
        </section>
        <!--================ End Blog Post Area =================-->
    </main>
  @endsection

  <!--================ Start Footer Area =================-->
  
  <!--================ End Footer Area =================-->

  
</body>
</html>