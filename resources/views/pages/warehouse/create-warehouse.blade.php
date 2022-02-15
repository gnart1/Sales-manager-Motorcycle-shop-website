@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
    <div style="margin-top: 100px">
        <form action="{{ url('warehouse/create-warehouse') }}" name="myForm" onsubmit="return validateFormMajor()"
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
@endsection
