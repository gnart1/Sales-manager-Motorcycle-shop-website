@extends('layouts.app', ['activePage' => 'admin', 'titlePage' => __('Table List')])
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Admin Edit</h4>
              <p class="card-category"> Edit here</p>
            </div>
            <div style="margin-top: 50px">
<form action="{{ url('admin/edit-admin/'.$admin->id) }}" name="myForm"  method="POST">
    @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input value="{{ $admin->name }}" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên kho ...">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Phone</label>
      <input value="{{ $admin->phone }}" name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
  </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Address</label>
        <input value="{{ $admin->address }}" name="address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input value="{{ $admin->email }}" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Position</label>
    <input value="{{ $admin->position }}" name="position" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
</div>

    <div class="form-group">
      <label for="exampleInputEmail1">Role</label>
      <input value="{{ $admin->role }}" name="role" type="nummber" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
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