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
            <div style="margin-top: 20px;padding: 30px">
              <form action="{{ url('orderdetail/create-order-detail') }}" name="myForm" method="POST">
                  @csrf
                  <div class="form-group">
                      <label style="color: black;">Name</label>
                      <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                          aria-describedby="emailHelp" placeholder="Nhập tên hóa đơn ...">
                  </div>
                  <div class="form-group">
                      <label style="color: black;">Datetime</label>
                      <input name="datetime" type="date" class="form-control" id="exampleInputEmail1"
                          aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                      <label style="color: black;">type</label>
                      {{-- <input name="type" type="nummber" class="form-control" id="exampleInputEmail1"
                          aria-describedby="emailHelp" placeholder="Nhập thể loại ..."> --}}
                          <div style="width: 200px">
                              <select class="custom-select" name="type" id="type">
                                  <option selected>Chọn loại</option>
                                  <option value="0">Nhập hàng</option>
                                  <option value="1">Xuất hàng</option>
                                  <option value="2">Bảo dưỡng</option>
                              </select>
                          </div>
                  </div>
                  <div class="form-group">
                      <label style="color: black;">Total amount</label>
                      <input name="total_amount" type="number" class="form-control" id="exampleInputEmail1"
                          aria-describedby="emailHelp" placeholder="Tổng tiền ...">
                  </div>
                  <div class="form-group">
                    <label style="color: black;">Product</label>
                    <input name="idProductDetail" type="number" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="id ...">
                </div>
                  <div class="form-group">
                      <label style="color: black;">Phone Customer</label>
                      <input name="phoneCustomer" type="tel" class="form-control"
                          id="phoneNumber" aria-describedby="emailHelp" 
                          onclick="myFunction()"
                          placeholder="Tên khách hàng ...">
                          <div class="dropdown">
                              <div id="myDropdown" class="dropdown-content">
                                  <input type="text" placeholder="Search.." id="myInput"
                                      onkeyup="filterFunction()">
                                  @forelse ($customers as $itemType)
                                  <a id='{{ $itemType->phone }}' class="aa" onclick="choose({{ $itemType->phone }})">{{ $itemType->phone }}</a>
                                  @empty
                                  @endforelse
                              </div>
                          </div>
                  </div>
                  <div class="form-group">
                    <label style="color: black;">Quantity</label>
                    <input name="quantity" type="nummber" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Nhập số lượng ...">
                </div>
                  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
    {{-- <div style="margin-top: 50px;">
        <form action="{{ url('order-detail/create-order-detail') }}" name="myForm"
            method="POST">
            @csrf
            <div  class="form-group">
                <label for="exampleInputEmail1">Order name</label>
                <input name="nameOrder" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Nhập tên hóa đơn ...">
            </div>
            <div  class="form-group">
              <label for="exampleInputEmail1">Product name</label>
              <input name="nameProduct" type="text" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm ...">
          </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Price</label>
              <input name="price" type="text" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Nhập giá ..." >
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Quantity</label>
                <input name="quantity" type="nummber" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Nhập số lượng ...">
            </div>
            <div class="form-group">
              <label style="color: black;">type</label>
                  <div style="width: 200px">
                      <select class="custom-select" name="type" id="type">
                          <option selected>Chọn loại</option>
                          <option value="0">Nhập hàng</option>
                          <option value="1">Xuất hàng</option>
                          <option value="2">Bảo dưỡng</option>
                      </select>
                  </div>
          </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Total amount</label>
              <input name="total_amount" type="nummber" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Tổng tiền ...">
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div> --}}
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

  .dropdown-content {
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

  .dropdown a:hover {
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
  function choose(phone) {
      $('#myDropdown').hide();
      $('#phoneNumber').val(`0${phone}`);
  }
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
</script>
@endsection
