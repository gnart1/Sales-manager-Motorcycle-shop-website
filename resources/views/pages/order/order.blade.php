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
        <a class="link" href="{{ url('/order/create-order') }}">Thêm hóa đơn</a><br>
        <div class="table-responsive">
          <table id="myTableOrder" class="table">
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
                    <td><?php
                    if($order->type == 0)
                    {
                    echo "Nhập hàng";
                    }
                    else if ($order->type == 1)
                    {
                      echo 'Xuất hàng';
                    }else
                    {
                      echo 'Bảo dưỡng';
                    }
                    ?></td>
                    <td>{{ $order->nameAdmin }}</td>
                
                    <td>{{ $order->phoneCustomer ?? null}}</td>
                    <td>{{ $order->nameCustomer ?? null}}</td>
                    <td>
                      <a class="btn btn-primary active" href={{ url('/order/edit-order/'.$order->id.'/'.$order->type)}}>Sửa</a>
                    
                      {{-- <a class="btn btn-danger active" href={{ url('/order/delete-order/'.$order->id)}}>Xóa</a> --}}
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
    $('#myTableOrder').DataTable();
} );
</script>
@endsection