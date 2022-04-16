@extends('layouts.app', ['activePage' => 'orderdetail', 'titlePage' => __('Notifications')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Order Detail</h4>
        <p class="card-category">Here is a order detail</p>
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
        <a class="link" href="{{ url('/orderdetail/create-order-detail') }}">Thêm hóa đơn chi tiết</a><br>
        <div class="table-responsive">
          <table id="myTableOrderDetail"  class="table">
            <thead class=" text-primary">
              <th>
                ID
              </th>
              <th>
                Order name 
              </th>
              <th>
                Product name 
              </th>
              <th>
                price
              </th>
              <th>
                Quantity
              </th> 
              <th>
                Type
              </th>
              <th>
                Total amount
              </th>
              {{-- <th>
                Action
              </th> --}}

                            </thead>
                            <tbody>
                                @foreach ($orderdetails as $orderdetail)
                                    <tr>

                                        <td>{{ $orderdetail->id }}</td>
                                        <td>{{ $orderdetail->nameOrder }}</td>
                                        <td>
                                            @foreach ($orderdetail->productInOrder as $item)
                                                <p>Tên: {{ $item->nameProduct }} | SL: {{ $item->quantity }} | Giá: {{$item->price}}</p>
                                            @endforeach
                                        </td>
                                        <td>
                                          <?php
                                          if ($orderdetail->typeOrder == 0) {
                                              echo 'Nhập hàng';
                                          } elseif ($orderdetail->typeOrder == 1) {
                                              echo 'Xuất hàng';
                                          } else {
                                              echo 'Bảo dưỡng';
                                          }
                                          ?>
                                        </td>
                                        <td>{{ $orderdetail->total_amount }}</td>
                                        {{-- <td>
                      <a class="btn btn-primary active" href={{ url('/product/edit-product/'.$product->id)}}>Sửa</a>
                    
                      <a class="btn btn-danger active" href={{ url('/product/delete-product/'.$product->id)}}>Xóa</a>
                    </td> --}}

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
        $(document).ready(function() {
            $('#myTableOrderDetail').DataTable({
              order: [
                    [0, 'desc']
                ],
            });
        });
    </script>
@endsection
