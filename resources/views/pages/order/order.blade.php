@extends('layouts.app', ['activePage' => 'order', 'titlePage' => __('Typography')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Order</h4>
        <p class="card-category">Here is a order</p>
      </div>
      <div class="card-body">
        <a class="link" href="{{ url('/order/create-order') }}">Thêm hóa đơn</a><br>
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>
                ID
              </th>
              <th>
                Name
              </th>
              <th>
               DateTime
              </th>
              <th>
                Type
              </th>
              <th>
                Total amount
              </th>
              <th>
                Admin
              </th>
              <th>
                Phone customer
              </th>
              <th>
                Customer
              </th>
              <th>
                Action
              </th>
            
            </thead>
            <tbody>
              @foreach ($orders as $order)
              <tr>

                    <td>{{ $order->id }}</td>
                    <td>{{ $order->nameOr }}</td>
                    <td>{{ $order->datetime }}</td>
                    <td>{{ $order->type }}</td>
                    <td>{{ $order->total_amount }}</td>
                    <td>{{ $order->nameAdmin }}</td>
                    <td>{{ $order->phoneCustomer }}</td>
                    <td>{{ $order->nameCustomer }}</td>
                    <td>
                      <a class="btn btn-primary active" href={{ url('/order/edit-order/'.$order->id)}}>Sửa</a>
                    
                      <a class="btn btn-danger active" href={{ url('/order/delete-order/'.$order->id)}}>Xóa</a>
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