@extends('master')
@section('title', 'Login')
 
 
  
  <!--================ Hero sm banner start =================-->  

  <!--================ Hero sm banner end =================-->  

  <!-- ================ contact section start ================= -->
  @section('content')
<!--================Header Menu Area =================-->
    <section class="mb-5px">
    <div class="container">
      <div class="hero-banner hero-banner--sm">
        <div class="hero-banner__content">
          <h1>Login</h1>
        </div>
      </div>
    </div>
  </section>
<!--================Header Menu Area =================-->

  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-6 mx-auto">
          <form action="{{ route('login') }}" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            @csrf
            <div class="form-group">
              <input class="form-control border" name="email" value="{{ old('email') }}" type="email" placeholder="Enter email address">
              <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>
            <div class="form-group">
              <input class="form-control border" name="password"  type="password" placeholder="Enter your password">
              <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>
            <div class="form-group text-center text-md-right mt-3">
            <a href="{{ route('register') }}" class = "mx-3">Go to Register ? </a> 
            <button type="submit" class="button button--active button-contactForm">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  @endsection

