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
<form action="{{ url('supplier/edit-supplier/'.$supplier->id) }}" name="myForm" onsubmit="return validate()"  method="POST">
    @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input value="{{ $supplier->name }}" name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Nhập tên nhà cung cấp ...">
    <small id="error1" style="height: 5px;font-size: 14px" class="text-danger error"></small>
  </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Address</label>
        <input value="{{ $supplier->address }}" name="address" type="text" class="form-control" id="address" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
        <small id="error2" style="height: 5px;font-size: 14px" class="text-danger error"></small>
      </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input value="{{ $supplier->email }}" name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Nhập email ...">
      <small id="error3" style="height: 5px;font-size: 14px" class="text-danger error"></small>
    </div>
  
    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
  function validate() {
      var name = document.getElementById('name');
      var address = document.getElementById('address');
      var email = document.getElementById('email');
  if (name.value == "" ) {
      document.getElementById('error1').innerText = 'Vui lòng nhập tên!';
      return false;
  }else{
    document.getElementById('error1').innerText = '';
  }
  if (address.value == "" ) {
      document.getElementById('error2').innerText = 'Vui lòng nhập địa chỉ!';
      return false;
  }else{
    document.getElementById('error2').innerText = '';
  }
  if (email.value == "" ) {
      document.getElementById('error3').innerText = 'Vui lòng nhập email!';
      return false;
  }else{
    document.getElementById('error3').innerText = '';
  }
}
</script>
@endsection