@extends('layouts.app', ['activePage' => 'orderdetail', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Order detail Create</h4>
                            <p class="card-category"> Create here</p>
                        </div>
                        <div style="margin: auto;margin-top: 20px;display: flex;flex-direction: row;">
                            <div class="slide" id="addProduct">Thêm hóa đơn</div>
                            <div
                                style="width: 3px;height: 30px;background-color: gray;margin-left: 10px;margin-right: 10px">
                            </div>
                            <div class="slide" id="chooseProduct">Chọn từ hóa đơn</div>
                            <div
                                style="width: 3px;height: 30px;background-color: gray;margin-left: 10px;margin-right: 10px">
                            </div>
                            <div class="slide" id="baoDuong">Hóa đơn bảo dưỡng</div>
                        </div>
                        <div style="padding: 30px" id="formAddProduct">
                            <form action="{{ url('orderdetail/create-order-detail') }}" id="FormAddProduct"
                                onsubmit="return validate()" name="myForm" method="POST">
                                @csrf
                                <div>
                                    <div class="form-group">
                                        <label style="color: black;">Name</label>
                                        <input name="name" type="text" class="form-control" id="name"
                                            aria-describedby="emailHelp" placeholder="Nhập tên hóa đơn ..."
                                            onblur="validate()">
                                    </div>
                                    <div class="form-group">
                                        <label style="color: black;">type</label>
                                        <div style="width: 200px">
                                            <select class="custom-select" name="type" id="type" onblur="validate()">
                                                <option selected>Chọn loại</option>
                                                <option value="0">Nhập hàng</option>
                                                <option value="1">Xuất hàng</option>
                                                {{-- <option value="2">Bảo dưỡng</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div id='multiImg' name='multiImg'></div>

                                    <div class="form-group" id="inputP" style="margin-top: 20px">
                                        <label style="color: black;">Product</label>
                                        {{-- <input name="idProductDetail[]" type="text" class="form-control"
                                            id="idProductDetailValue" aria-describedby="emailHelp" placeholder="id ..."> --}}
                                        <input type="number" class="form-control idProductDetail" id="idProductDetail"
                                            aria-describedby="emailHelp" onclick="myFunction2()"
                                            placeholder="Tên sản phẩm ..." autocomplete="off" onblur="validate()">
                                        <div class="dropdown2">
                                            <div id="myDropdown2" class="dropdown-content2">
                                                <input type="text" placeholder="Search.." id="myInput2"
                                                    onkeyup="filterFunction2()">

                                                @forelse ($productDetail as $itemType)
                                                    <a id='item' style="cursor: pointer;"
                                                        onclick="choose2({{ $itemType->id }},'{{ $itemType->nameProduct }}')">{{ $itemType->id }}
                                                        |
                                                        {{ $itemType->nameProduct }}</a>
                                                    <input type="number" class="{{ $itemType->id }} form-control quantity"
                                                        id="quantity-{{ $itemType->id }}" aria-describedby="emailHelp"
                                                        placeholder="Nhập số lượng ..." />
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="Customer">
                                        <label style="color: black;">Phone Customer</label>
                                        <input name="phoneCustomer" type="tel" class="form-control" id="phoneNumber"
                                            aria-describedby="emailHelp" onclick="myFunction()"
                                            placeholder="Số điện thoại khách hàng ..." autocomplete="off"
                                            onblur="validate()">
                                        <div class="dropdown">
                                            <div id="myDropdown" class="dropdown-content">
                                                <input type="text" placeholder="Search.." id="myInput"
                                                    onkeyup="filterFunction()" autocomplete="off">
                                                @forelse ($customers as $itemType)
                                                    <a id='{{ $itemType->phone }}' style="cursor: pointer;"
                                                        onclick="choose({{ $itemType->phone }})">{{ $itemType->phone }}</a>
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="divWage" hidden>
                                        <label style="color: black;">Tiền công</label>
                                        <input name="wage" type="number" class="form-control" id="wage"
                                            aria-describedby="emailHelp" placeholder="Nhập tiền công ..." value="0"
                                            onblur="validate()">
                                    </div>
                                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                    </div>
                    <div style="padding: 30px" id="formChooseProduct">
                        <form action="{{ url('orderdetail/create-order-detail2') }}" name="myForm2" method="POST"
                            onsubmit="return validate2()">
                            @csrf
                            <div class="form-group">
                                <label style="color: black;">Hóa đơn</label>
                                <input name="idOrder" type="tel" class="form-control" id="idOrder"
                                    aria-describedby="emailHelp" onclick="myFunction3()" placeholder="Tên hóa đơn ..."
                                    autocomplete="off" onblur="validate2()">
                                <div class="dropdown3">
                                    <div id="myDropdown3" class="dropdown-content3">
                                        <input type="text" placeholder="Search.." id="myInput3" onkeyup="filterFunction3()">
                                        @forelse ($orders as $itemType)
                                            <a id='{{ $itemType->id }}' style="cursor: pointer;"
                                                onclick="choose3({{ $itemType->id }})">{{ $itemType->nameOr }}</a>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            {{-- <div id='multiImg' name='multiImg'> --}}
                            <div class="form-group">
                                <label style="color: black;">Product</label>
                                <input name="idProductDetail" type="number" class="form-control idProductDetail"
                                    id="idProductDetail2" aria-describedby="emailHelp" onclick="myFunction4()"
                                    placeholder="Tên sản phẩm ..." autocomplete="off" onblur="validate2()">
                                <div class="dropdown4">
                                    <div id="myDropdown4" class="dropdown-content4">
                                        <input type="text" placeholder="Search.." id="myInput4" onkeyup="filterFunction4()">
                                        @forelse ($productDetail as $itemType)
                                            <a id='{{ $itemType->id }}' style="cursor: pointer;"
                                                onclick="choose4({{ $itemType->id }})">{{ $itemType->nameProduct }}</a>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            {{-- </div> --}}
                            {{-- <div id='multiImg' name='multiImg'>
                                <div class="form-group row px-2">
                                    <div class='col'>
                                        <label for="exampleFormControlFile1">Chọn ảnh sản phẩm</label>
                                        <input type="file" class="form-control-file" id="img1"
                                            name="img1">
                                    </div>
                                    onchange="openPicAdd(this)"
                                    <img src="" alt="" srcset="" id='imageDemoAdd' class='col'
                                        style="width: auto;max-height: 100px">
                                </div>
                            </div> --}}
                            {{-- <div class="btn btn-success btn-sm" style='margin-top:-10px; margin-bottom: 20px' onclick="addMoreImage()">Add more</div>

                            <input type="hidden" id='CountImg' name='countImg' value="1">
                            <input type="hidden" value="1" id='Count' name='count'> --}}
                            {{-- <div class="form-group" id="Customer2">
                                <label style="color: black;">Phone Customer</label>
                                <input name="phoneCustomer" type="tel" class="form-control" id="phoneNumber2"
                                    aria-describedby="emailHelp" onclick="myFunction5()" placeholder="Số điện thoại ..."
                                    autocomplete="off" onblur="validate2()">
                                <div class="dropdown5">
                                    <div id="myDropdown5" class="dropdown-content5">
                                        <input type="text" placeholder="Search.." id="myInput5" onkeyup="filterFunction5()">
                                        @forelse ($customers as $itemType)
                                            <a id='{{ $itemType->phone }}' style="cursor: pointer;"
                                                onclick="choose5({{ $itemType->phone }})">{{ $itemType->phone }}</a>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div> --}}
                            <div class="form-group" id="divWage2">
                                <label style="color: black;">Tiền công</label>
                                <input name="wage" type="number" class="form-control" id="wage2"
                                    aria-describedby="emailHelp" placeholder="Nhập tiền công ..." onblur="validate()">
                            </div>
                            <div class="form-group">
                                <label style="color: black;">Quantity</label>
                                <input name="quantity" type="nummber" class="form-control quantity" id="quantity2"
                                    aria-describedby="emailHelp" placeholder="Nhập số lượng ..." onblur="validate2()">
                                <small id="error2" style="height: 5px;font-size: 16px" class="text-danger error"></small>

                            </div>
                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div style="padding: 30px" id="formBaoDuong">
                        <form action="{{ url('orderdetail/create-order-detail') }}" onsubmit="return validate()"
                            name="myForm" method="POST">
                            @csrf
                            <div>
                                <div class="form-group">
                                    <label style="color: black;">Name</label>
                                    <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Nhập tên hóa đơn ..." onblur="validate()">
                                </div>
                                {{-- <div class="form-group">
                                    <label style="color: black;">type</label>
                                    <div style="width: 200px">
                                        <select class="custom-select" name="type" id="type" onblur="validate()">
                                            <option selected>Chọn loại</option>
                                            <option value="0">Nhập hàng</option>
                                            <option value="1">Xuất hàng</option>
                                            <option value="2">Bảo dưỡng</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <input name="type" type="text" class="form-control" value="2" hidden>
                                {{-- <div class="form-group">
                                    <label style="color: black;">Product</label>
                                    <input name="idProductDetail" type="number" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="id ...">
                                    <input name="idProductDetail" type="number" class="form-control idProductDetail"
                                        id="idProductDetail3" aria-describedby="emailHelp" onclick="myFunction2()"
                                        placeholder="Tên sản phẩm ..." autocomplete="off" onblur="validate()">
                                    <div class="dropdown2">
                                        <div id="myDropdown2" class="dropdown-content2">
                                            <input type="text" placeholder="Search.." id="myInput2"
                                                onkeyup="filterFunction2()">
                                            @forelse ($productDetail as $itemType)
                                                <a id='{{ $itemType->id }}' style="cursor: pointer;"
                                                    onclick="choose2({{ $itemType->id }},{{ $itemType->nameProduct }})">{{ $itemType->id }}
                                                    |
                                                    {{ $itemType->nameProduct }}</a>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="form-group" id="Customer">
                                    <label style="color: black;">Phone Customer</label>
                                    <input name="phoneCustomer" type="tel" class="form-control" id="phoneNumber"
                                        aria-describedby="emailHelp" onclick="myFunction()"
                                        placeholder="Số điện thoại khách hàng ..." autocomplete="off" onblur="validate()">
                                    <div class="dropdown">
                                        <div id="myDropdown" class="dropdown-content">
                                            <input type="text" placeholder="Search.." id="myInput"
                                                onkeyup="filterFunction()" autocomplete="off">
                                            @forelse ($customers as $itemType)
                                                <a id='{{ $itemType->phone }}' style="cursor: pointer;"
                                                    onclick="choose({{ $itemType->phone }})">{{ $itemType->phone }}</a>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                    <div id="dropQuantity" class="dropdown-content" hidden>
                                        <input type="number" placeholder="Số lượng.." id="myQuantity">
                                    </div>
                                </div> --}}
                                <div class="form-group" id="divWage3">
                                    <label style="color: black;">Tiền công</label>
                                    <input name="wage" type="number" class="form-control" id="wage3"
                                        aria-describedby="emailHelp" placeholder="Nhập tiền công ..." value="0"
                                        onblur="validate()">
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Quantity</label>
                                    <input name="quantity" type="nummber" class="form-control quantity" id="quantity3"
                                        aria-describedby="emailHelp" placeholder="Nhập số lượng ..." onblur="validate()">
                                    <small id="error" style="height: 5px;font-size: 16px" class="text-danger error"></small>
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
        function validate() {
            if ($('#type').val() != 0) {
                $.get('/productdetail/getQuantity/' + $('#idProductDetail').val(), function(res) {
                    var checkQuantity = 0;
                    if (parseInt($('#quantity').val()) > res.quantity) {
                        document.getElementById('quantity').style.borderColor = '#fc403e';
                        document.getElementById('error').innerText = 'Vượt quá số lượng  ' + res.quantity +
                            ' ở trong kho!';
                        checkQuantity = 0;
                    } else {
                        document.getElementById('quantity').style.borderColor = '#43fa38';
                        document.getElementById('error').innerText = '';
                        checkQuantity = 1;
                    }

                    if (checkQuantity == 0) {
                        return false;
                    } else {
                        return true;
                    }
                });
            }
        }

        function validate2() {
            $.get('/productdetail/getTypeOrder/' + $('#idOrder').val(), function(res) {
                if (res.type != 0) {
                    $.get('/productdetail/getQuantity/' + $('#idProductDetail2').val(), function(res) {
                        var checkQuantity = 0;
                        if (parseInt($('#quantity2').val()) > res.quantity) {
                            document.getElementById('quantity2').style.borderColor = '#fc403e';
                            document.getElementById('error2').innerText = 'Vượt quá số lượng  ' + res
                                .quantity +
                                ' ở trong kho!';
                            checkQuantity = 0;
                        } else {
                            document.getElementById('quantity2').style.borderColor = '#43fa38';
                            document.getElementById('error2').innerText = '';
                            checkQuantity = 1;
                        }

                        if (checkQuantity == 0) {
                            return false;
                        } else {
                            return true;
                        }
                    });
                }
                if (res.type == 2) {
                    $('#divWage2').show();
                } else {
                    $('#divWage2').hide();
                }
                console.log(res.type);
            });

        }
        $('#type').click(function() {
            if ($('#type').val() == 0) {
                $('#Customer').hide();
            } else {
                $('#Customer').show();
            }
            // if ($('#type').val() == 2) {
            //     $('#divWage').show();
            // } else {
            //     $('#divWage').hide();
            // }
        })

        $('#chooseProduct').click(function() {
            $(this).addClass('borderB');
            $('#baoDuong').removeClass('borderB');
            $('#addProduct').removeClass('borderB');
            $('#formAddProduct').hide();
            $('#formBaoDuong').hide();
            $('#formChooseProduct').show();
        });

        $('#addProduct').click(function() {
            $(this).addClass('borderB');
            $('#baoDuong').removeClass('borderB');
            $('#chooseProduct').removeClass('borderB');
            $('#formChooseProduct').hide();
            $('#formBaoDuong').hide();
            $('#formAddProduct').show();
        });
        $('#baoDuong').click(function() {
            $(this).addClass('borderB');
            $('#chooseProduct').removeClass('borderB');
            $('#addProduct').removeClass('borderB');
            $('#formChooseProduct').hide();
            $('#formAddProduct').hide();
            $('#formBaoDuong').show();

        });
        $(document).ready(function() {
            $('#addProduct').addClass('borderB');
            $('#formChooseProduct').hide();
            $('#formBaoDuong').hide();
            $('#divWage2').hide();
            $('#inputQ').hide();

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
            $('#phoneNumber').val(`0${phone}`);
        }
        var array = [];
        var value = [];
        var checkQuantity = 0;

        function choose2(phone, name) {
            var quantity = $('#quantity-' + phone).val() == '' ? 1 : $('#quantity-' + phone).val();

            var checkF = array.find(x => x == phone);
            if (checkF == undefined) {
                array.push(phone);
                const newImage =
                    `<div class='divPick-${phone} newDiv' id-product="${phone}" quantity="${quantity}">
                    ${phone} | ${name} | sl: ${quantity} <a style='margin-left: 20px;cursor: pointer' class='${phone} delete'>xóa</a> <small id="error-${phone}" style="height: 5px;font-size: 14px" class="text-danger error"></small>
                </div>`;
                $("#multiImg").append(newImage)

            }

            $('.delete').click(function() {
                var id = $(this).attr('class').split(' ')[0];
                var aa = array.filter(x => x != id);
                array = aa;
                $('.divPick-' + id).remove();

            });
            if ($('#type').val() != 0) {
                $.get('/productdetail/getQuantity/' + phone, function(res) {

                    if (parseInt($('#quantity-' + phone).val()) > res.quantity) {
                        // document.getElementById('quantity-'+ phone).style.borderColor = '#fc403e';
                        document.getElementById('error-'+ phone).innerText = 'Vượt quá số lượng  ' + res.quantity +
                            ' ở trong kho!';
                        checkQuantity = 0;
                    } else {
                        // document.getElementById('quantity-'+ phone).style.borderColor = '#43fa38';
                        document.getElementById('error-'+ phone).innerText = '';
                        checkQuantity = 1;
                    }
                });
            }
        }

        $("#FormAddProduct").submit((e) => {
            e.preventDefault();

            if (checkQuantity == 0) {
                return false;
            } else {
                document.querySelectorAll(".newDiv").forEach(x => {
                    value.push({
                        id: x.getAttribute("id-product"),
                        quantity: x.getAttribute("quantity"),
                    });
                })
                var name = $("#name").val();
                var type = $("#type").val();
                var phoneNumber = $("#phoneNumber").val();
                var wage = $("#wage").val();
                $.ajax({
                    data: {
                        "_token": "{{ csrf_token() }}",
                        name: name,
                        type: type,
                        phoneNumber: phoneNumber,
                        wage: wage,
                        product: value,
                    },
                    url: '/orderdetail/create-order-detail',
                    type: 'POST',
                    success: function(response) {
                        window.location.href = '/orderdetail';
                    }
                })
            }


            console.log(checkQuantity);

        })

        function choose3(phone) {
            $('#myDropdown3').hide();
            $('#idOrder').val(`${phone}`);
        }

        function choose4(phone) {
            $('#myDropdown4').hide();
            $('#idProductDetail2').val(`${phone}`);
        }

        function choose5(phone) {
            $('#myDropdown5').hide();
            $('#phoneNumber2').val(`0${phone}`);
        }
        var id;
        $('.quantity').click(function() {
            id = $(this).attr('class').split(' ')[0];
        })
        window.addEventListener('click', function(e) {
            if (e.target.id !== 'myInput' && e.target.id !== 'phoneNumber') {
                $('#myDropdown').hide();
            }
            if (e.target.id !== 'myInput2' && e.target.id !== 'idProductDetail' && e.target.id !== 'quantity-' +
                id) {
                $('#myDropdown2').hide();
            }
            if (e.target.id !== 'myInput3' && e.target.id !== 'idOrder') {
                $('#myDropdown3').hide();
            }
            if (e.target.id !== 'myInput4' && e.target.id !== 'idProductDetail2') {
                $('#myDropdown4').hide();
            }
            if (e.target.id !== 'myInput5' && e.target.id !== 'phoneNumber2') {
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
            var input, filter, ul, li, a, i, quantity, j;
            input = document.getElementById("myInput2");
            filter = input.value.toUpperCase();
            div
                = document.getElementById("myDropdown2");
            a = div.getElementsByTagName("a");
            quantity = div.getElementsByTagName("input");
            var array = [];
            for (i = 0; i <
                a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                    array.push(a[i].textContent.split(' ')[0]);
                } else {
                    a[i].style.display = "none";
                }
                // if(a[i].textContent.split(' ')[0]){}

            }
            var result = [];
            for (i = 0; i <
                array.length; i++) {
                result.push(array[i].match(/\d+/g));
            }
            var arrayQ = [''];
            for (i = 1; i <
                quantity.length; i++) {
                arrayQ.push(quantity[i].id);
                $('#' + arrayQ[i]).show();
            }
            // for (i = 1; i <
            // arrayQ.length; i++) {
            //     // $('#' + quantity[i]).show();
            // }
            var filter = arrayQ.filter(x => {
                return !result.find(y => 'quantity-' + y == x)
            })
            for (i = 1; i <
                filter.length; i++) {
                $('#' + filter[i]).hide();
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
    </script>
@endsection
