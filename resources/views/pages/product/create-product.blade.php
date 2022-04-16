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
                        <div style="margin-top: 20px;padding: 30px">
                            <form action="{{ url('product/create-product') }}" name="myForm" onsubmit="return validate()" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label style="color: black;">Name</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm ...">
                                        <small id="error1" style="height: 5px;font-size: 14px" class="text-danger error"></small>    
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Description</label>
                                    <input name="description" type="text" class="form-control" id="description"
                                        aria-describedby="emailHelp" placeholder="Nhập mô tả ...">
                                        <small id="error2" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">type</label>
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
    <script>
        function validate() {
            var name = document.getElementById('name');
            var description = document.getElementById('description');
        if (name.value == "" ) {
            document.getElementById('error1').innerText = 'Vui lòng chọn tên!';
            return false;
        }else{
          document.getElementById('error1').innerText = '';
        }
        if (description.value == "" ) {
            document.getElementById('error2').innerText = 'Vui lòng nhập mô tả!';
            return false;
        }else{
          document.getElementById('error2').innerText = '';
        }
    }
      </script>
@endsection
