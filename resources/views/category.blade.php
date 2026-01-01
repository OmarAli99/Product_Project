@extends('master')
@section('title','Category')
@section('cat_active','active')
  
 
@section('content')
@include('theme.hero',['title' => 'Category'])
  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            @if(count($products) > 0)
            @foreach ($products as $product)
              <div class="col-md-6">
              <div class="single-recent-blog-post card-view">
                <div class="thumb">
                  <img class="card-img rounded-0" src="{{ asset('storage/' . $product->image) }}" alt="">
                  <ul class="thumb-info">
                    <li><a href="#"><i class="ti-user"></i>{{ $product->user->name}}</a></li>
                    <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                  </ul>
                </div>
                <div class="details mt-20">
                  <a href="blog-single.html">
                    <h3>{{ $product->name }}</h3>
                  </a>
                  <p>{{ $product->description }}</p>
                  <a class="button" href="{{ route('products.show',['product' => $product])}}">Read More <i class="ti-arrow-right"></i></a>
                </div>
              </div>
            </div>
            @endforeach
            @endif
          </div>         

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

@endsection
  <!--================ End Footer Area =================-->
