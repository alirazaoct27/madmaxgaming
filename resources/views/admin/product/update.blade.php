@extends('admin.template')
@section('content')


<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Add Product</h5>
        <small class="text-muted float-end"></small>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route('admin.products.update', $product->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-body">
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label>Product Name</label>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" id="first-name" value="{{$product->name }}" class="form-control" name="name"
                            placeholder="Name">
                    </div>
                    <div class="col-md-2">
                        <label>Product Price</label>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" id="first-name" value="{{ $product->price }}" class="form-control" name="price"
                            placeholder="Price">
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-md-2">
                        <label>Product Quantity</label>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" id="first-name" value="{{ $product->quantity }}" class="form-control" name="quantity"
                            placeholder="Quantity">
                    </div>
                    <div class="col-md-2">
                        <label>Product Category</label>
                    </div>
                    <div class="col-md-4 form-group">
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="basic-default-name" name="image"/>
                    </div>
                  </div>


          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Description</label>
            <div class="col-sm-10">
              <textarea
                id="basic-default-message"
                class="form-control"
                placeholder="Description"
                aria-label="Hi, Do you have a moment to talk Joe?"
                aria-describedby="basic-icon-default-message2"
                required
                name="description"
              >{{ $product->description }}</textarea>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Status</label>
            <div class="col-sm-10">


                    <input class="form-check-input" type="radio"  {{$product->status ? 'checked': ''}} value="1" id="Active" name="status"/>
                    <label class="form-check-label" for="defaultCheck1"> Active </label>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="0" {{$product->status ? '' : 'checked'}} id="InActive" name="status"  />
                    <label class="form-check-label" for="defaultCheck3"> In Active </label>
                  </div>

            </div>
          </div>


<div class="my-4">
          <div class="row justify-content-end">
            <div class="col-sm-2">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  @endsection
