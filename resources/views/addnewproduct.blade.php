@extends('master')

	<!-- ================ contact section start ================= -->
@section('content')
@include('theme.hero',['title' => 'Add New Product'])
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-lg-9">
                @if(session('success'))
                        <div class ="alert alert-success">
                            {{ session('success') }}
                        </div>
                @endif
          <form action="{{ route('products.store') }}" class="form-contact contact_form" method="post" enctype="multipart/form-data">
            @csrf
            @if(Auth::check())
            <div class="row">
              <div class="col-lg-5">
              <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">

                <div class="form-group">
                  <input class="form-control" name="name" type="text" placeholder="Enter your name">
                    @error('name')
                        <span class ="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <input class="form-control" name="description" type="text" placeholder="Enter description address">
                    @error('description')
                        <span class ="text-danger"> {{ $message }}</span>
                    @enderror
                    <div class="form-group">
                       <label>Product Image</label>
                    <input class="form-control" name="image" type="file" placeholder="Enter your image">
    
                  @error('image')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                  </div>
                </div>
                <select name="category_id">
                  <option value=""> insert your Category</option>
                  @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                      {{-- يمكنك هنا عمل loop لعرض المستويات الفرعية كما شرحنا سابقاً --}}
                  @endforeach
               </select>
                <div class="form-group">
                  <input class="form-control" name="price" id="subject" type="number" placeholder="Enter Price">
                  @error('price')
                        <span class ="text-danger"> {{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
          
            <div class="form-group text-center text-md-right mt-3">
              <button type="submit" class="button button--active button-contactForm">Send Product</button>
            @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
	<!-- ================ contact section end ================= -->


