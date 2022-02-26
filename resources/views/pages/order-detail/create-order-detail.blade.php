@extends('layouts.app', ['activePage' => 'order', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Order Create</h4>
              <p class="card-category"> Create here</p>
            </div>
    <div style="margin-top: 50px;">
        <form action="{{ url('order/create-order') }}" name="myForm"
            method="POST">
            @csrf
            <div  class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Nhập tên hóa đơn ...">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Datetime</label>
                <input name="datetime" type="date" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" >
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">type</label>
              <input name="type" type="nummber" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Nhập thể loại ...">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Total amount</label>
              <input name="total_amount" type="nummber" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Tổng tiền ...">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Admin </label>
              <input name="idAdmin" type="text" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Tên admin ...">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Phone Customer</label>
              <input name="phoneCustomer" type="nummber" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Tên khách hàng ...">
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
