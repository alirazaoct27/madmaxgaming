@extends('admin.template')
@section('content')


<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Add Category</h5>
        <small class="text-muted float-end"></small>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route('admin.categories.store')}}" enctype="multipart/form-data">
        @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control"name="name" id="basic-default-name" placeholder="Category name" required/>
            </div>
          </div>
 <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="basic-default-name" placeholder="" name="image"/>
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
              ></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Status</label>
            <div class="col-sm-10">


                    <input class="form-check-input" type="radio" value="1" id="Active" name="status"/>
                    <label class="form-check-label" for="defaultCheck1"> Active </label>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="0" id="InActive" name="status" checked />
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
