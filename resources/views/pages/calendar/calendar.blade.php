@extends('layouts.app', ['activePage' => 'calendar', 'titlePage' => __('Icons')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Phân công</h4>
        <p class="card-category">Here is a Phân công</p>
      </div>
      <div class="card-body">
        <a class="link" href="{{ url('/customer/create-customer') }}">Thêm khách hàng</a><br>
        <div class="table-responsive">
          <table class="table">
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
              @foreach ($calendar as $cal)
              <tr>
                    <td>{{ $cal->nameCustomer }}</td>
                    <td>{{ $cal->phoneCustomer }}</td>
                    <td>{{ $cal->email }}</td>
                    <td>{{ $cal->dob }}</td>
                    <td>{{ $cal->address }}</td> 
                    <td>
                    
                      {{-- <a class="btn btn-danger active" href={{ url('/customer/delete-customer/'.$cal->phone)}}>Xóa</a> --}}
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
@endsection