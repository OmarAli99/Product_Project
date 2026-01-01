@extends('master')
@section('title','SingleProduct')
  
 
@section('content')
@include('theme.hero',['title' => $product->name ])
  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
            <div class="main_blog_details">
                <img class="img-fluid" src="{{ asset('storage/' . $product->image) }}" alt="">
                <a href="#"><h4>{{ $product->name }}</h4></a>
                <div class="user_details">
                  <div class="float-right mt-sm-0 mt-3">
                    <div class="media">
                      <div class="media-body">
                        <h5>{{ $product->user->name }}</h5>
                        <p>{{ $product->created_at }}</p>
                      </div>
                      <div class="d-flex">
                        <img width="42" height="42" src="img/avatar.png" alt="avatar">
                      </div>
                    </div>
                  </div>
                </div>
                <p>{{$product->description}}</p>
                  <p>{{$product->price}} $ </p>
                </div>
          @if(count($product->rates) > 0 )
              <div class="comments-area">
                  <h4>{{ count($product->rates) }} Comments</h4>
                    @foreach ($product->rates as  $rate )
                      <div class="comment-list">
                      <div class="single-comment justify-content-between d-flex">
                          <div class="user justify-content-between d-flex">
                              <div class="thumb">
                                  <img src="img/avatar.png" width="50px">
                              </div>
                              <div class="desc">
                                  <h5><a href="#">{{ $rate->name }}</a></h5>
                                  <p class="date">{{ $rate->created_at }} </p>
                                  <p class="comment">
                                      {{ $rate->rate }}
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>
                    @endforeach                                   				
              </div>
              @endif
                   @if(session('statusrate'))
                  <div class ="alert alert-success">
                      {{ session('statusrate') }}
                  </div>
                   @endif
              <div class="comment-form">
                  <h4>Leave a rate</h4>

                  <form action="{{  route('myrate')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                      <div class="form-group form-inline">
                        <div class="form-group col-lg-6 col-md-6 name">
                          <input type="text" class="form-control" name="name" placeholder="Enter Name"
                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                        @error('name')
                        <span class ="text-danger"> {{ $message }}</span>
                        @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-6 email">
                          <input type="email" class="form-control" name="email" placeholder="Enter email address"
                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                        @error('email')
                        <span class ="text-danger"> {{ $message }}</span>
                        @enderror
                        </div>										
                      </div>
                      <div class="form-group">
                          <select class="form-control" name="rate" required>
                              <option value="" disabled selected>Select Your Rate</option>
                              <option value="5">Excellent (5 Stars)</option>
                              <option value="4">Very Good (4 Stars)</option>
                              <option value="3">Good (3 Stars)</option>
                              <option value="2">Fair (2 Stars)</option>
                              <option value="1">Poor (1 Star)</option>
                          </select>
                      </div>
                      @error('rate')
                        <span class ="text-danger"> {{ $message }}</span>
                      @enderror
                      <div class="form-group">
                          <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                        @error('message')
                        <span class ="text-danger"> {{ $message }}</span>
                        @enderror
                      </div>
                      <button type="submit" class="button submit_btn">Post Rate</button>     
             </form>
         
    


      </div>
      </div>
         @include('theme.sidebar')
  </section>
  <!--================ End Blog Post Area =================-->

@endsection
  <!--================ End Footer Area =================-->
