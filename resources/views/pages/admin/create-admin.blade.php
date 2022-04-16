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
                        <div style="margin-top: 20px;padding: 30px">
                            <form action="{{ url('admin/create-admin') }}" name="myForm" onsubmit="return validate()" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label style="color: black;">Name</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        aria-describedby="emailHelp" placeholder="Nhập họ tên ...">
                                        <small id="error1" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Phone</label>
                                    <input name="phone" type="number" class="form-control" id="phone"
                                        aria-describedby="emailHelp" placeholder="Nhập số điện thoại ...">
                                        <small id="error2" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Address</label>
                                    <input name="address" type="text" class="form-control" id="address"
                                        aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
                                        <small id="error3" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Email</label>
                                    <input name="email" type="email" class="form-control" id="email"
                                        aria-describedby="emailHelp" placeholder="Nhập email ...">
                                        <small id="error4" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Position</label>
                                    <div style="width: 250px">
                                        <select class="custom-select" name="position" id="position">
                                            <option selected>Chọn chức vụ</option>
                                            <option value="0">CEO</option>
                                            <option value="1">Nhân viên bảo dưỡng</option>
                                            <option value="2">Nhân viên tư vấn</option>
                                            <option value="3">Quản lý</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Role</label>
                                    <div style="width: 200px">
                                        <select class="custom-select" name="role" id="role">
                                            <option selected>Chọn quyền</option>
                                            <option value="0">Admin</option>
                                            <option value="1">SuperAdmin</option>
                                            <option value="2">Staff</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label style="color: black;">Status</label>
                                        <input name="status" type="text" class="form-control" id="status"
                                            aria-describedby="emailHelp" value="0" readonly>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Password</label>
                                    <input name="password" type="password" class="form-control" id="password"
                                         placeholder="Nhập mật khẩu ..." >
                                         <small id="error5" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                </div>
                                <button type="submit" id="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>
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
            var phone = document.getElementById('phone');
            var email = document.getElementById('email');
            var password = document.getElementById('password');
            var address = document.getElementById('address');
        if (name.value == "" ) {
            document.getElementById('error1').innerText = 'Vui lòng nhập tên!';
            return false;
        }else{
          document.getElementById('error1').innerText = '';
        }
        if (phone.value == "" ) {
            document.getElementById('error2').innerText = 'Vui lòng nhập số điện thoại!';
            return false;
        }else{
          document.getElementById('error2').innerText = '';
        }
        if (address.value == "" ) {
            document.getElementById('error3').innerText = 'Vui lòng nhập địa chỉ!';
            return false;
        }else{
          document.getElementById('error3').innerText = '';
        }
        if (email.value == "" ) {
            document.getElementById('error4').innerText = 'Vui lòng nhập email!';
            return false;
        }else{
          document.getElementById('error4').innerText = '';
        }
        if (password.value == "" ) {
            document.getElementById('error5').innerText = 'Vui lòng nhập mật khẩu!';
            return false;
        }else{
          document.getElementById('error5').innerText = '';
        }
        
    }

    </script>
@endsection
