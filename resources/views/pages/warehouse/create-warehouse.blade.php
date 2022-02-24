@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">WareHouse Create</h4>
              <p class="card-category"> Create here</p>
            </div>
    <div style="margin-top: 50px;">
        <form action="{{ url('warehouse/create-warehouse') }}" name="myForm"
            method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Nhập tên kho ...">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input name="address" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Nhập địa chỉ kho ...">
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
