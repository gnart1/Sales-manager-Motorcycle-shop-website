@extends('layouts.app', ['activePage' => 'productdetail', 'titlePage' => __('Table List')])

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
                            <form action="{{ url('productdetail/create-product-detail') }}" name="myForm" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label style="color: black;">Name</label>
                                    <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm ...">
                                </div>
                                {{-- <div class="form-group">
              <label style="color: black;">Image</label>
              <input name="image" type="image" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp">
            </div> --}}
                                <div class="form-group">
                                    <label style="color: black;">Color</label>
                                    <input name="color" type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Nhập màu sắc ...">
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Description</label>
                                    <input name="description" type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Nhập mô tả ...">
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">type</label>
                                    <div style="width: 200px">
                                        <select class="custom-select" name="type" id="type">
                                            <option selected>Chọn loại</option>
                                            <option value="0">Xe</option>
                                            <option value="1">Phụ kiện/Phụ tùng</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Price</label>
                                    <input name="price" type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Nhập giá tiền ...">
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Model</label>
                                    <input name="model" type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Nhập mẫu xe ...">
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Quantity</label>
                                    <input name="quantity" type="number" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Nhập số lượng ...">
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Warehouse</label>
                                    <input name="idWarehouse" type="text" class="form-control" id="idWarehouse"
                                        aria-describedby="emailHelp" onclick="myFunction()"
                                        placeholder="Tên kho ..." autocomplete="off">
                                        <div class="dropdown">
                                            <div id="myDropdown" class="dropdown-content">
                                                <input type="text" placeholder="Search.." id="myInput"
                                                    onkeyup="filterFunction()">
                                                @forelse ($warehouses as $itemType)
                                                <a id='{{ $itemType->id }}' style="cursor: pointer;" onclick="choose({{ $itemType->id }})">{{ $itemType->name }}</a>
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Supplier</label>
                                    <input name="idSupplier" type="text" class="form-control" id="idSupplier"
                                        aria-describedby="emailHelp" onclick="myFunction2()"
                                        placeholder="Tên nhà cung cấp ..." autocomplete="off">
                                        <div class="dropdown2">
                                            <div id="myDropdown2" class="dropdown-content2">
                                                <input type="text" placeholder="Search.." id="myInput2"
                                                    onkeyup="filterFunction2()">
                                                @forelse ($suppliers as $itemType)
                                                <a id='{{ $itemType->id }}' style="cursor: pointer;" onclick="choose2({{ $itemType->id }})">{{ $itemType->name }}</a>
                                                @empty
                                                @endforelse
                                            </div>
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
    <style>
        #myInput {
            box-sizing: border-box;
            background-image: url('searchicon.png');
            background-position: 14px 12px;
            background-repeat: no-repeat;
            font-size: 16px;
            padding: 14px 20px 12px 45px;
            border: none;
            border-bottom: 1px solid #ddd;
        }
        #myInput2 {
            box-sizing: border-box;
            background-image: url('searchicon.png');
            background-position: 14px 12px;
            background-repeat: no-repeat;
            font-size: 16px;
            padding: 14px 20px 12px 45px;
            border: none;
            border-bottom: 1px solid #ddd;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f6f6f6;
            min-width: 230px;
            overflow: auto;
            border: 1px solid #ddd;
            z-index: 1;
        }
        .dropdown-content2 {
            display: none;
            position: absolute;
            background-color: #f6f6f6;
            min-width: 230px;
            overflow: auto;
            border: 1px solid #ddd;
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content2 a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown a:hover {
            background-color: #ddd;
        }
        .dropdown2 a:hover {
            background-color: #ddd;
        }
        .show {
            display: block;
        }

    </style>
    <script>
        function myFunction() {
            // document.getElementById("myDropdown").classList.toggle("show");
            $('#myDropdown').show();
        }
        function myFunction2() {
            // document.getElementById("myDropdown").classList.toggle("show");
            $('#myDropdown2').show();
        }
        function choose(phone) {
            $('#myDropdown').hide();
            $('#idWarehouse').val(`0${phone}`);
        }
        function choose2(phone) {
            $('#myDropdown2').hide();
            $('#idSupplier').val(`0${phone}`);
        }
        window.addEventListener('click', function(e) {
            if (e.target.id !== 'myInput' && e.target.id !== 'idWarehouse') {
                $('#myDropdown').hide();
            }
            if (e.target.id !== 'myInput2' && e.target.id !== 'idSupplier') {
                $('#myDropdown2').hide();
            }
        });
        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div
                = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i <
                a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        function filterFunction2() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput2");
            filter = input.value.toUpperCase();
            div
                = document.getElementById("myDropdown2");
            a = div.getElementsByTagName("a");
            for (i = 0; i <
                a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
    </script>
@endsection
