@extends('layouts.app', ['activePage' => 'product', 'titlePage' => __('Table List')])
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Product Edit</h4>
              <p class="card-category"> Edit here</p>
            </div>
            <div style="margin-top: 50px">
<form action="{{ url('product/edit-product/'.$product->id) }}" name="myForm"  onsubmit="return validateFormMajor()" method="POST">
    @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input value="{{ $product->name }}" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên kho ...">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Address</label>
        <input value="{{ $product->description }}" name="description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Type</label>
      <input value="{{ $product->type }}" name="type" type="nummber" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
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