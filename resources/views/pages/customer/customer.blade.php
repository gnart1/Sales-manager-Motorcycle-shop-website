@extends('layouts.app', ['activePage' => 'customer', 'titlePage' => __('Icons')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Customer</h4>
        <p class="card-category">Here is a customer</p>
      </div>
      <div class="card-body">
        @if (session('status'))
        <div class="row">
          <div class="col-sm-12">
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
              </button>
              <span>{{ session('status') }}</span>
            </div>
          </div>
        </div>
      @endif
        <a class="link" href="{{ url('/customer/create-customer') }}">Thêm khách hàng</a><br>
        <div class="table-responsive">
          <table id="myTableCustomer" class="table">
            <thead class=" text-primary">
              
              <th>
                Name
              </th>
              <th>
                Phone
              </th>
              <th>
                Email
              </th>
              <th>
                DoB
              </th>
              <th>
                Address
              </th>
              <th>
                Action
              </th>
            
            </thead>
            <tbody>
              @foreach ($customers as $customer)
              <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->dob }}</td>
                    <td>{{ $customer->address }}</td> 
                    <td>
                      {{-- <a class="btn btn-primary active" href={{ url('/admin/edit-admin/'.$admin->id)}}>Sửa</a> --}}
                    
                      {{-- <a class="btn btn-danger active" href={{ url('/customer/delete-customer/'.$customer->phone)}}>Xóa</a> --}}
                    </td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready( function () {
    $('#myTableCustomer').DataTable();
} );
</script>
@endsection