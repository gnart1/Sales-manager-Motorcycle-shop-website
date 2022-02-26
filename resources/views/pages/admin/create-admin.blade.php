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
                            <form action="{{ url('admin/create-admin') }}" name="myForm" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label style="color: black;">Name</label>
                                    <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Nhập học tên ...">
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Phone</label>
                                    <input name="phone" type="number" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Nhập số điện thoại ...">
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Address</label>
                                    <input name="address" type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Email</label>
                                    <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Nhập email ...">
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Position</label>
                                    <input name="position" type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Nhập chức vụ ...">
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Role</label>
                                    <div style="width: 200px">
                                        <select class="custom-select" name="role" id="role">
                                            <option selected>Chọn quyền</option>
                                            <option value="0">Admin</option>
                                            <option value="1">SuperAdmin</option>
                                        </select>
                                    </div>

                                </div>
                                <button type="submit" id="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
