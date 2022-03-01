@extends('layouts.app', ['activePage' => 'orderdetail', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Order detail Create</h4>
              <p class="card-category"> Create here</p>
            </div>
    <div style="margin-top: 50px;">
        <form action="{{ url('order-detail/create-order-detail') }}" name="myForm"
            method="POST">
            @csrf
            <div  class="form-group">
                <label for="exampleInputEmail1">Order name</label>
                <input name="nameOrder" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Nhập tên hóa đơn ...">
            </div>
            <div  class="form-group">
              <label for="exampleInputEmail1">Product name</label>
              <input name="nameProduct" type="text" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm ...">
          </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Price</label>
              <input name="price" type="text" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Nhập giá ..." >
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Quantity</label>
                <input name="quantity" type="nummber" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Nhập số lượng ...">
            </div>
            <div class="form-group">
              <label style="color: black;">type</label>
                  <div style="width: 200px">
                      <select class="custom-select" name="type" id="type">
                          <option selected>Chọn loại</option>
                          <option value="0">Nhập hàng</option>
                          <option value="1">Xuất hàng</option>
                          <option value="2">Bảo dưỡng</option>
                      </select>
                  </div>
          </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Total amount</label>
              <input name="total_amount" type="nummber" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Tổng tiền ...">
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
