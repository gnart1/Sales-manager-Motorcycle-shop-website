@extends('layouts.app', ['activePage' => 'admin', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Admin Create</h4>
              <p class="card-category"> Create here</p>
            </div>
    <div style="margin-top: 50px;">
        <form action="{{ url('admin/create-admin') }}" name="myForm" 
            method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Nhập học tên ...">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input name="phone" type="number" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Nhập số điện thoại ...">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Address</label>
              <input name="address" type="text" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Nhập email ...">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Position</label>
          <input name="position" type="text" class="form-control" id="exampleInputEmail1"
              aria-describedby="emailHelp" placeholder="Nhập chức vụ ...">
      </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Role</label>
              <input name="role" type="text" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Nhập role ...">
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
