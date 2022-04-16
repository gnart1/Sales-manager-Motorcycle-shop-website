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
                        <div style="margin: auto;margin-top: 20px;display: flex;flex-direction: row;">
                            <div class="slide" id="addProduct">Thêm sản phẩm</div>
                            <div
                                style="width: 3px;height: 30px;background-color: gray;margin-left: 10px;margin-right: 10px">
                            </div>
                            <div class="slide" id="chooseProduct">Chọn từ sản phẩm</div>
                        </div>
                        <div style="margin-top: 0px;padding: 30px" id="formAddProduct">
                            <form action="{{ url('productdetail/create-product-detail') }}" name="myForm" onsubmit="return validate()" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label style="color: black;">Name</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm ...">
                                        <small id="error1" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                </div>
                                <div>
                                    <label style="color: black;">Image</label>
                                    <input required type="file" class="form-control" name="images[]"  multiple>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Color</label>
                                    <input name="color" type="text" class="form-control" id="color"
                                        aria-describedby="emailHelp" placeholder="Nhập màu sắc ...">
                                        <small id="error2" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Description</label>
                                    <input name="description" type="text" class="form-control" id="description"
                                        aria-describedby="emailHelp" placeholder="Nhập mô tả ...">
                                        <small id="error3" style="height: 5px;font-size: 14px" class="text-danger error"></small>
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
                                    <input name="price" type="text" class="form-control" id="price"
                                        aria-describedby="emailHelp" placeholder="Nhập giá tiền ...">
                                        <small id="error4" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Model</label>
                                    <input name="model" type="text" class="form-control" id="model"
                                        aria-describedby="emailHelp" placeholder="Nhập mẫu xe ...">
                                        <small id="error5" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Quantity</label>
                                    <input name="quantity" type="number" class="form-control" id="quantity"
                                        aria-describedby="emailHelp" placeholder="Nhập số lượng ...">
                                        <small id="error6" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Warehouse</label>
                                    <input name="idWarehouse" type="text" class="form-control" id="idWarehouse"
                                        aria-describedby="emailHelp" onclick="myFunction()" placeholder="Tên kho ..."
                                        autocomplete="off">
                                        <small id="error7" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                    <div class="dropdown">
                                        <div id="myDropdown" class="dropdown-content">
                                            <input type="text" placeholder="Search.." id="myInput"
                                                onkeyup="filterFunction()">
                                            @forelse ($warehouses as $itemType)
                                                <a id='{{ $itemType->id }}' style="cursor: pointer;"
                                                    onclick="choose({{ $itemType->id }})">{{ $itemType->name }}</a>
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
                                        <small id="error8" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                    <div class="dropdown2">
                                        <div id="myDropdown2" class="dropdown-content2">
                                            <input type="text" placeholder="Search.." id="myInput2"
                                                onkeyup="filterFunction2()">
                                            @forelse ($suppliers as $itemType)
                                                <a id='{{ $itemType->id }}' style="cursor: pointer;"
                                                    onclick="choose2({{ $itemType->id }})">{{ $itemType->name }}</a>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <script>
                            function validate() {
                                var name = document.getElementById('name');
                                var color = document.getElementById('color');
                                var description = document.getElementById('description');
                                var price = document.getElementById('price');
                                var model = document.getElementById('model');
                                var quantity = document.getElementById('quantity');
                                var idWarehouse = document.getElementById('idWarehouse');
                                var idSupplier = document.getElementById('idSupplier');
                            if (name.value == "" ) {
                                document.getElementById('error1').innerText = 'Vui lòng nhập tên!';
                                return false;
                            }else{
                              document.getElementById('error1').innerText = '';
                            }
                            if (color.value == "" ) {
                                document.getElementById('error2').innerText = 'Vui lòng nhập màu!';
                                return false;
                            }else{
                              document.getElementById('error2').innerText = '';
                            }
                            if (description.value == "" ) {
                                document.getElementById('error3').innerText = 'Vui lòng nhập mô tả!';
                                return false;
                            }else{
                              document.getElementById('error3').innerText = '';
                            }
                            if (price.value == "" ) {
                                document.getElementById('error4').innerText = 'Vui lòng nhập giá!';
                                return false;
                            }else{
                              document.getElementById('error4').innerText = '';
                            }
                            if (model.value == "" ) {
                                document.getElementById('error5').innerText = 'Vui lòng nhập hãng xe!';
                                return false;
                            }else{
                              document.getElementById('error5').innerText = '';
                            }
                            if (quantity.value == "" ) {
                                document.getElementById('error6').innerText = 'Vui lòng nhập số lượng!';
                                return false;
                            }else{
                              document.getElementById('error6').innerText = '';
                            }
                            if (idWarehouse.value == "" ) {
                                document.getElementById('error7').innerText = 'Vui lòng chọn kho!';
                                return false;
                            }else{
                              document.getElementById('error7').innerText = '';
                            }
                            if (idSupplier.value == "" ) {
                                document.getElementById('error8').innerText = 'Vui lòng chọn nhà cung cấp!';
                                return false;
                            }else{
                              document.getElementById('error8').innerText = '';
                            }
                          }
                          </script>
                        
                        <div style="padding: 30px" id="formChooseProduct">
                            
                            <form action="{{ url('productdetail/create-product-detail2') }}" name="myForm2" onsubmit="return validate1()" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label style="color: black;">Chọn sản phẩm</label>
                                    <input name="idProduct" type="text" class="form-control" id="idProduct"
                                        aria-describedby="emailHelp" onclick="myFunction3()" placeholder="chọn sản phẩm..."
                                        autocomplete="off">
                                        <small id="error1" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                    <div class="dropdown3">
                                        <div id="myDropdown3" class="dropdown-content3">
                                            <input type="text" placeholder="Search.." id="myInput3"
                                                onkeyup="filterFunction3()">
                                            @forelse ($product as $itemType)
                                                <a id='{{ $itemType->id }}' style="cursor: pointer;"
                                                    onclick="choose3({{ $itemType->id }})">{{ $itemType->name }}</a>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label style="color: black;">Image</label>
                                    <input required type="file" class="form-control" name="images[]"  multiple>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Color</label>
                                    <input name="color" type="text" class="form-control" id="color"
                                        aria-describedby="emailHelp" placeholder="Nhập màu sắc ...">
                                        <small id="error2" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Price</label>
                                    <input name="price" type="text" class="form-control" id="price"
                                        aria-describedby="emailHelp" placeholder="Nhập giá tiền ...">
                                        <small id="error3" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Model</label>
                                    <input name="model" type="text" class="form-control" id="model"
                                        aria-describedby="emailHelp" placeholder="Nhập mẫu xe ...">
                                        <small id="error4" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Quantity</label>
                                    <input name="quantity" type="number" class="form-control" id="quantity"
                                        aria-describedby="emailHelp" placeholder="Nhập số lượng ...">
                                        <small id="error5" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Warehouse</label>
                                    <input name="idWarehouse" type="text" class="form-control" id="idWarehouse2"
                                        aria-describedby="emailHelp" onclick="myFunction4()" placeholder="Tên kho ..."
                                        autocomplete="off">
                                        <small id="error6" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                    <div class="dropdown4">
                                        <div id="myDropdown4" class="dropdown-content4">
                                            <input type="text" placeholder="Search.." id="myInput4"
                                                onkeyup="filterFunction4()">
                                            @forelse ($warehouses as $itemType)
                                                <a id='{{ $itemType->id }}' style="cursor: pointer;"
                                                    onclick="choose4({{ $itemType->id }})">{{ $itemType->name }}</a>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Supplier</label>
                                    <input name="idSupplier" type="text" class="form-control" id="idSupplier2"
                                        aria-describedby="emailHelp" onclick="myFunction5()"
                                        placeholder="Tên nhà cung cấp ..." autocomplete="off">
                                        <small id="error7" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                                    <div class="dropdown5">
                                        <div id="myDropdown5" class="dropdown-content5">
                                            <input type="text" placeholder="Search.." id="myInput5"
                                                onkeyup="filterFunction5()">
                                            @forelse ($suppliers as $itemType)
                                                <a id='{{ $itemType->id }}' style="cursor: pointer;"
                                                    onclick="choose5({{ $itemType->id }})">{{ $itemType->name }}</a>
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

        #myInput3 {
            box-sizing: border-box;
            background-image: url('searchicon.png');
            background-position: 14px 12px;
            background-repeat: no-repeat;
            font-size: 16px;
            padding: 14px 20px 12px 45px;
            border: none;
            border-bottom: 1px solid #ddd;
        }

        #myInput4 {
            box-sizing: border-box;
            background-image: url('searchicon.png');
            background-position: 14px 12px;
            background-repeat: no-repeat;
            font-size: 16px;
            padding: 14px 20px 12px 45px;
            border: none;
            border-bottom: 1px solid #ddd;
        }

        #myInput5 {
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

        .dropdown-content3 {
            display: none;
            position: absolute;
            background-color: #f6f6f6;
            min-width: 230px;
            overflow: auto;
            border: 1px solid #ddd;
            z-index: 1;
        }

        .dropdown-content4 {
            display: none;
            position: absolute;
            background-color: #f6f6f6;
            min-width: 230px;
            overflow: auto;
            border: 1px solid #ddd;
            z-index: 1;
        }

        .dropdown-content5 {
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

        .dropdown-content3 a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content4 a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content5 a {
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

        .dropdown3 a:hover {
            background-color: #ddd;
        }

        .dropdown4 a:hover {
            background-color: #ddd;
        }

        .dropdown5 a:hover {
            background-color: #ddd;
        }

        .show {
            display: block;
        }

        .slide {
            cursor: pointer;
            width: 150px;
            text-align: center;
        }

        .borderB {
            border-bottom: 3px solid #b13bb6;
        }

    </style>
    <script>
        $('#chooseProduct').click(function() {
            $(this).addClass('borderB');
            $('#addProduct').removeClass('borderB');
            $('#formAddProduct').hide();
            $('#formChooseProduct').show();
        });

        $('#addProduct').click(function() {
            $(this).addClass('borderB');
            $('#chooseProduct').removeClass('borderB');
            $('#formChooseProduct').hide();
            $('#formAddProduct').show();
        });

        $(document).ready(function() {
            $('#addProduct').addClass('borderB');
            $('#formChooseProduct').hide();
        })

        function myFunction() {
            $('#myDropdown').show();
        }

        function myFunction2() {
            $('#myDropdown2').show();
        }

        function myFunction3() {
            $('#myDropdown3').show();
        }

        function myFunction4() {
            $('#myDropdown4').show();
        }

        function myFunction5() {
            $('#myDropdown5').show();
        }

        function choose(phone) {
            $('#myDropdown').hide();
            $('#idWarehouse').val(`${phone}`);
        }

        function choose2(phone) {
            $('#myDropdown2').hide();
            $('#idSupplier').val(`${phone}`);
        }

        function choose3(phone) {
            $('#myDropdown3').hide();
            $('#idProduct').val(`${phone}`);
        }

        function choose4(phone) {
            $('#myDropdown4').hide();
            $('#idWarehouse2').val(`${phone}`);
        }

        function choose5(phone) {
            $('#myDropdown5').hide();
            $('#idSupplier2').val(`${phone}`);
        }
        window.addEventListener('click', function(e) {
            if (e.target.id !== 'myInput' && e.target.id !== 'idWarehouse') {
                $('#myDropdown').hide();
            }
            if (e.target.id !== 'myInput2' && e.target.id !== 'idSupplier') {
                $('#myDropdown2').hide();
            }
            if (e.target.id !== 'myInput3' && e.target.id !== 'idProduct') {
                $('#myDropdown3').hide();
            }
            if (e.target.id !== 'myInput4' && e.target.id !== 'idWarehouse2') {
                $('#myDropdown4').hide();
            }
            if (e.target.id !== 'myInput5' && e.target.id !== 'idSupplier2') {
                $('#myDropdown5').hide();
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

        function filterFunction3() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput3");
            filter = input.value.toUpperCase();
            div
                = document.getElementById("myDropdown3");
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

        function filterFunction4() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput4");
            filter = input.value.toUpperCase();
            div
                = document.getElementById("myDropdown4");
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

        function filterFunction5() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput5");
            filter = input.value.toUpperCase();
            div
                = document.getElementById("myDropdown5");
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

        function validate1() {
            var name1 = document.getElementById('idproduct');
            var color1 = document.getElementById('color');
            var price1 = document.getElementById('price');
            var model1 = document.getElementById('model');
            var quantity1 = document.getElementById('quantity');
            var idWarehouse1 = document.getElementById('idWarehouse');
            var idSupplier1 = document.getElementById('idSupplier');
        if (name1.value == "" ) {
            document.getElementById('error1').innerText = 'Vui lòng chọn tên!';
            return false;
        }else{
          document.getElementById('error1').innerText = '';
        }
        if (color1.value == "" ) {
            document.getElementById('error2').innerText = 'Vui lòng nhập màu!';
            return false;
        }else{
          document.getElementById('error2').innerText = '';
        }
        if (price1.value == "" ) {
            document.getElementById('error3').innerText = 'Vui lòng nhập giá!';
            return false;
        }else{
          document.getElementById('error3').innerText = '';
        }
        if (model1.value == "" ) {
            document.getElementById('error4').innerText = 'Vui lòng nhập hãng xe!';
            return false;
        }else{
          document.getElementById('error4').innerText = '';
        }
        if (quantity1.value == "" ) {
            document.getElementById('error5').innerText = 'Vui lòng nhập số lượng!';
            return false;
        }else{
          document.getElementById('error5').innerText = '';
        }
        if (idWarehouse1.value == "" ) {
            document.getElementById('error6').innerText = 'Vui lòng chọn kho!';
            return false;
        }else{
          document.getElementById('error6').innerText = '';
        }
        if (idSupplier1.value == "" ) {
            document.getElementById('error7').innerText = 'Vui lòng chọn nhà cung cấp!';
            return false;
        }else{
          document.getElementById('error7').innerText = '';
        }
      }
    </script>
@endsection
