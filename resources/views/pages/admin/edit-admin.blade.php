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
                        <div style="margin-top: 20px;padding: 30px">
                            <form action="{{ url('admin/edit-admin/' . $admin->id) }}" name="myForm" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label style="color: black;">Name</label>
                                    <input value="{{ $admin->name }}" name="name" type="text" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên kho ...">
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Phone</label>
                                    <input value="{{ $admin->phone }}" name="phone" type="text" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Address</label>
                                    <input value="{{ $admin->address }}" name="address" type="text" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Email</label>
                                    <input value="{{ $admin->email }}" name="email" type="email" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
                                </div>
                                {{-- <div class="form-group">
                                    <label style="color: black;">Position</label>
                                    <input value="{{ $admin->position }}" name="position" type="text"
                                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Nhập địa chỉ ...">
                                </div> --}}
                                <div class="form-group">
                                    <label style="color: black;">Position</label>
                                    <div style="width: 250px">
                                      <select class="custom-select" name="position" id="position">
                                          <option selected>Chọn loại</option>
                                          <option value="0" {{ $admin->position === 0 ? 'selected' : '' }}>CEO</option>
                                          <option value="1" {{ $admin->position === 1 ? 'selected' : '' }}>Nhân viên bảo dưỡng</option>
                                          <option value="2" {{ $admin->position === 2 ? 'selected' : '' }}>Nhân viên tư vấn</option>
                                          <option value="3" {{ $admin->position === 3 ? 'selected' : '' }}>Quản lý</option>

                                      </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Role</label>
                                    <div style="width: 200px">
                                      <select class="custom-select" name="role" id="role">
                                          <option selected>Chọn loại</option>
                                          <option value="0" {{ $admin->role === 0 ? 'selected' : '' }}>Admin</option>
                                          <option value="1" {{ $admin->role === 1 ? 'selected' : '' }}>SuperAdmin</option>
                                          <option value="2" {{ $admin->role === 2 ? 'selected' : '' }}>Staff</option>

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
