@extends('layouts.app', ['activePage' => 'supplier', 'titlePage' => __('Table List')])
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Supplier Edit</h4>
              <p class="card-category"> Edit here</p>
            </div>
            <div style="margin-top: 50px">
<form action="{{ url('supplier/edit-supplier/'.$supplier->id) }}" name="myForm" method="POST">
    @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input value="{{ $supplier->name }}" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên nhà cung cấp ...">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Address</label>
        <input value="{{ $supplier->address }}" name="address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input value="{{ $supplier->email }}" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập email ...">
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