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
        {{-- <a class="link" href="{{ url('/customer/create-customer') }}">Thêm khách hàng</a><br> --}}
        <div class="table-responsive">
          <table id="myTableCalendar" class="table">
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
                Lịch hẹn
              </th>
              <th>
                Address
              </th>
              <th>
                type
              </th>
              <th>
                Phân công
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
                    <td>{{ $cal->calendar }}</td>
                    <td>{{ $cal->address }}</td> 
                    <td>{{ $cal->type == 0 ? 'Mua xe' : 'Bảo dưỡng' }}</td>
                    <td>{{ $cal->nameAdmin ?? null }}</td>  
                    <td>
                      <a class="btn btn-primary active" href={{ url('/calendar/phanCong/'.$cal->id.'/'.$cal->type)}}>Phân công</a>
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
    $('#myTableCalendar').DataTable();
} );
</script>
@endsection