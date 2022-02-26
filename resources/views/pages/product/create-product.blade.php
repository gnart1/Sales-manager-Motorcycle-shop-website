@extends('layouts.app', ['activePage' => 'product', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Product Create</h4>
              <p class="card-category"> Create here</p>
            </div>
    <div style="margin-top: 50px;">
        <form action="{{ url('product/create-product') }}" name="myForm"
            method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm ...">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input name="description" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Nhập mô tả ...">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">type</label>
              {{-- <input name="type" type="nummber" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Nhập thể loại ..."> --}}
                  <div style="width: 200px">
                    <select class="custom-select" name="type" id="type">
                        <option selected>Chọn loại</option>
                        <option value="0">Xe</option>
                        <option value="1">Phụ tùng</option>
                    </select>
                </div>
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
