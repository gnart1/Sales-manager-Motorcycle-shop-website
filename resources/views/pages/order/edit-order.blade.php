@extends('layouts.app', ['activePage' => 'order', 'titlePage' => __('Table List')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Order Edit</h4>
                            <p class="card-category"> Edit here</p>
                        </div>
                        <div style="margin-top: 20px;padding: 30px">
                            <form action="{{ url('order/edit-order/' . $order->id) }}" name="myForm" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input value="{{ $order->nameOr }}" name="name" type="text" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên kho ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">DateTime</label>
                                    <input value="{{ $order->datetime }}" name="datetime" type="datetime"
                                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Nhập địa chỉ ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Type</label>
                                    {{-- <input value="{{ $order->type }}" name="type" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ..."> --}}
                                    <div style="width: 200px">
                                        <select class="custom-select" value="{{ $order->type }}" name="type" id="type">
                                            <option selected>Chọn loại</option>
                                            <option value="0" {{ $order->type === 0 ? 'selected' : '' }}>Nhập hàng</option>
                                            <option value="1" {{ $order->type === 1 ? 'selected' : '' }}>Xuất hàng</option>
                                            <option value="2" {{ $order->type === 2 ? 'selected' : '' }}>Bảo dưỡng</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total amount</label>
                                    <input value="{{ $order->total_amount }}" name="total_amount" type="text"
                                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Nhập địa chỉ ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Admin name</label>
                                    <input value="{{ $order->nameAdmin }}" disabled type="text" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer name</label>
                                    <input value="{{ $order->phoneCustomer }}" name="phoneCustomer" type="text"
                                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Nhập địa chỉ ...">
                                </div>
                                <div class="form-group">
                                  <label style="color: black;">Phone Customer</label>
                                  <input name="phoneCustomer" type="tel" class="form-control"
                                      id="phoneNumber" aria-describedby="emailHelp" value="{{ $order->phoneCustomer }}"
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
      $(window).on('click', function (e) {
        if (e.target == $('#myDropdown')) {
          $('#myDropdown').hide();
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
  </script>
@endsection
