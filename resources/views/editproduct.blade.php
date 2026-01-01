@extends('master')

@section('content')
@include('theme.hero',['title' => 'Edit Product'])
<section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9">
              @if(session('successedit'))
              <div class ="alert alert-success">
                  {{ session('successedit') }}
              </div>
                @endif

                <form action="{{ route('products.update', $product->id) }}" class="form-contact contact_form" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') @if(Auth::check())
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input class="form-control" name="name" type="text" value="{{ $product->name }}">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <input class="form-control" name="description" type="text" value="{{ $product->description }}">
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label>Product Image</label>
                                <input class="form-control" name="image" type="file">
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $product->image) }}" width="80px" class="img-thumbnail">
                                </div>
                                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label>Price</label>
                                <input class="form-control" name="price" type="number" value="{{ $product->price }}">
                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                  
                    <div class="form-group text-center text-md-right mt-3">
                      <button type="submit" class="button button--active button-contactForm">Update Product</button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</section>
@endsection