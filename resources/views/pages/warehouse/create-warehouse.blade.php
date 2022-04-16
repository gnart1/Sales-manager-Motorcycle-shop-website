@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
                        <div style="margin-top: 20px;padding: 30px">
                            <form action="{{ url('warehouse/create-warehouse') }}" name="myForm" onsubmit="return validate()"  method="POST">
                                @csrf
                                <div class="form-group">
                                    <label style="color: black;">Name</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        aria-describedby="emailHelp" placeholder="Nhập tên kho ...">
                                     <small id="error1" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Address</label>
                                    <input name="address" type="text" class="form-control" id="address"
                                        aria-describedby="emailHelp" placeholder="Nhập địa chỉ kho ..." >
                                    <small id="error2" style="height: 5px;font-size: 14px" class="text-danger error"></small>
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
        if (name.value == "" ) {
            document.getElementById('error1').innerText = 'Vui lòng nhập tên!';
            return false;
        }else{
            document.getElementById('error1').innerText = '';
        }
        if (address.value == "" ) {
            document.getElementById('error2').innerText = 'Vui lòng nhập địa chỉ!';
            return false;
        }
    }
    </script>
  @endsection
