@extends('layouts.app', ['activePage' => 'order', 'titlePage' => __('Table List')])
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Order Edit</h4>
              <p class="card-category"> Edit here</p>
            </div>
            <div style="margin-top: 50px">
<form action="{{ url('order/edit-order/'.$order->id) }}" name="myForm" method="POST">
    @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input value="{{ $order->nameOr }}" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên kho ...">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">DateTime</label>
        <input value="{{ $order->datetime }}" name="datetime" type="datetime" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Type</label>
      {{-- <input value="{{ $order->type }}" name="type" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ..."> --}}
      <div style="width: 200px">
        <select class="custom-select" name="type" id="type">
            <option selected>Chọn loại</option>
            <option value="0" selected="{{ $order->type === 0 ? true : false}}">Nhập hàng</option>
            <option value="1" selected="{{ $order->type === 1 ? true : false}}">Xuất hàng</option>
            <option value="2" selected="{{ $order->type === 2 ? true : false}}">Bảo dưỡng</option>
        </select>
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Total amount</label>
    <input value="{{ $order->total_amount }}" name="total_amount" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Admin name</label>
  <input value="{{ $order->nameAdmin }}"  disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
</div>
    <div class="form-group">
      <label for="exampleInputEmail1">Customer name</label>
      <input value="{{ $order->phoneCustomer }}" name="phoneCustomer" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
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