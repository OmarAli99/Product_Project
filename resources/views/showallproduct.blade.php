@extends('master')

	<!-- ================ contact section start ================= -->
@section('content')
@include('theme.hero',['title' => 'Add New Product'])
  <section class="section-margin--small section-margin">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Products</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary">you need insert new product ? </a>
    </div>

    <table class="table table-striped table-hover shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name_pro</th>
                <th>price_pro</th>
                <th>description_pro</th>
                <th>image_pro</th>
                <th>custom</th>
            </tr>
        </thead>
        <tbody>
              @if(session('successdel'))
              <div class ="alert alert-success">
                  {{ session('successdel') }}
              </div>
                @endif
            @forelse($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 2) }} $ </td>
                    <td>{{ $product->description }}</td>
                    <td>
                      <img src="{{ asset('storage/' . $product->image) }}" alt="product image" style="width: 80px; height: auto; border-radius: 5px;">
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-info">edit</a>
                   
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد؟')">delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">لا توجد منتجات مضافة بعد.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>
  </section>
@endsection
	<!-- ================ contact section end ================= -->


