@extends('admin.template')
@section('content')
  <!-- Bootstrap Table with Header - Light -->
  <div class="card">

    <h5 class="card-header d-flex justify-content-between">
        Orders

    </h5>

    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Customer</th>
            <th>email</th>
            <th>phone</th>
            <th>address</th>
            <th>Bill</th>
            <th>Order Status</th>


          </tr>

        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($order as $Order)


          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong> {{ $Order->id }} </strong></td>
            <td>{{ $Order->fullname }}</td>
            <td>{{ $Order->email }}</td>
            <td>{{ $Order->phone }}</td>
            <td>{{ $Order->address }}</td>
            <td>{{ $Order->bill }}</td>
            <td><span class="badge bg-label-danger me-1">{{ $Order->status }}</span></td>
            <td>

              
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!-- Bootstrap Table with Header - Light -->
@endsection
