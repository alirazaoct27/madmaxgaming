@extends('admin.template')
@section('content')
  <!-- Bootstrap Table with Header - Light -->
  <div class="card">

    <h5 class="card-header d-flex justify-content-between">
        Products
<a href="{{ route('admin.products.create') }}" class=" btn btn-primary">Add Product</a>
    </h5>

    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>

        </thead>
        <tbody class="table-border-bottom-0">

            @foreach ($products as $product)
            <tr>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $product->id }}</strong></td>
              <td><img width="80px" height="100px" src="{{asset('uploads/products/'.$product->image)}}"></td>
              <td>{{$product->name}}</td>
              <td>{{$product->category->name}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->quantity}}</td>
              @if ($product->status)
              <td><span class="badge bg-label-primary me-1">Active</span></td>
              @else
              <td><span class="badge bg-label-danger me-1">In Active</span></td>
              @endif
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('admin.products.edit', $product->id)}}"
                      ><i class="bx bx-edit-alt me-1"></i> Edit</a
                    >
                    <form action="{{route('admin.products.destroy', $product->id)}}" method="post">
                      @csrf
                      @method('delete')
                    <button class="dropdown-item" type="submit"><i class="bx bx-trash me-1"></i> Delete</button
                    >
                  </div>
                </div>
              </td>
            </tr>
            @endforeach

        </tbody>
      </table>
    </div>
  </div>
  <!-- Bootstrap Table with Header - Light -->
@endsection
