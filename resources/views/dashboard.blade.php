@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">Sản phẩm</p>
              <h3 class="card-title">
                {{ $total_products }}
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">warning</i>
                <a href="#pablo">Get More Space...</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Hóa đơn</p>
              <h3 class="card-title">{{ $total_orders }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Last 24 Hours
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Fixed Issues</p>
              <h3 class="card-title">75</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i> Tracked from Github
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-twitter"></i>
              </div>
              <p class="card-category">Followers</p>
              <h3 class="card-title">+245</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> Just Updated
              </div>
            </div>
          </div>
        </div>
      </div>
     
      {{-- xe nhieu --}}
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <h3>5 loại xe được mua nhiều nhất</h3>
            <div class="card card-stats">
      
      <table class="table table-bordered border-dark align-items-center mb-0"  style="margin: auto; width:100%; border: 1px solid">
        <thead class="table-dark">
          <tr>
              <th>Xe</th>
              <th>Số lượng</th>
          </tr>
        </thead>
          <tbody>
          @for ($i = 0; $i < 5; $i++)
              <tr>
                  <td>{{$favourite_products[$i]->name}}</td>
                  <td style="text-align: center">{{$favourite_products[$i]->total}}</td>
              </tr>
          @endfor
            </tbody>
      </table>
    </div>
  </div>
  </div>      
      </div>
  <style>
        p.title_thongke{
          text-align: center;
          font-size: 20px;
          font-weight: bold;
        }
      </style>
      <div>
        <p class="title_thongke">Thống kê doanh thu bán xe</p>
      </div>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="card card-stats">
        
        <br>
        <form autocomplete="off" method="POST" enctype="multipart/form-data" >
          
            @csrf
            @method('PUT')
            <div style="float: left">
              <p>Từ ngày: <input name="from_date"  type="text" id="datepicker" class="form-control"></p>
              <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
            </div>  
            <div style="float: left">
              <p>Đến ngày: <input name="to_date"  type="text" id="datepicker2" class="form-control"></p>
            </div>
            <div style="float: left; width:150px" >
              <p>
              Lọc theo:
              <select  class="dashboard-filter form-control">
                <option value="">--Chọn--</option>
                <option value="7ngay">7 ngày qua</option>
                <option value="thangtruoc">Tháng trước</option>
                <option value="thangnay">Tháng này</option>  
                <option value="1nam">1 năm qua</option>
              </select>  
            </p>  
            </div>
        </form>
     
      
      {{-- chart --}}
      <div id="myfirstchart" style="height: 250px;"></div>
    </div>
  </div>
</div>
  </div>
      <script>


        $(document).ready(function(){

          chart30days();
      var chart =  new Morris.Bar({

  element: 'myfirstchart',
  lineColors: ['#819C79','#fc8710'],
  // '#FF6541','#A4ADD3','#766856'
  fointFillColors:['#ffffff'],
  pointStrokeColors: ['black'],
          fillOpacity:0.6,
          hideHover: 'auto',
          parseTime: false,

  xkey: 'period',
  ykeys: ['order','quantity'],
  labels: ['Tổng tiền','Số lượng']
});
  //filter 30 days
  function chart30days(){
    var _token = $('input[name="_token"]').val();
    $.ajax({
      url:"{{ url('/days-filter') }}",
              method:"GET",
              dataType:"JSON",
              data:{_token:_token},

              success:function(data){
                chart.setData(data);
              }
    });
  }

  // filter for date
  $('.dashboard-filter').change(function(){
    var dashboard_value = $(this).val();
    var _token = $('input[name="_token"]').val();
    $.ajax({
      url:"{{ url('/dashboard-filter') }}",
              method:"GET",
              dataType:"JSON",
              data:{dashboard_value:dashboard_value,_token:_token},

              success:function(data){
                chart.setData(data);
              }
    });
  });
  $("#btn-dashboard-filter").click(function(){
            // alert('ok');
            var _token = $('input[name="_token"]').val();
            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();
            $.ajax({
              url:"{{ url('/filter-by-date') }}",
              method:"GET",
              dataType:"JSON",
              data:{from_date:from_date, to_date:to_date,_token:_token},


              success:function(data){
                chart.setData(data);
              }
            });
          });
});

      </script>
      <script>
        $( function() {
          $( "#datepicker" ).datepicker({
            prevText:"Tháng trước",
            nextText:"Tháng sau",
            dateFormat:"yy-mm-dd",
            dayNamesMin:[ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
            duration:"slow"
          });

        } );

        $( function() {
          $( "#datepicker2" ).datepicker({
            prevText:"Tháng trước",
            nextText:"Tháng sau",
            dateFormat:"yy-mm-dd",
            dayNamesMin:["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ nhật"],
            duration:"slow"
          });
        });
        </script>
        <div class="content">
          <div class="container-fluid">
        <div class="row">
          <div class="card card-stats">
          <form>
          <table class="table table-bordered border-dark align-items-center mb-0"  style="margin: auto; width:100%; border: 1px solid">
            <thead class="table-dark">
              
              <tr>
                <th scope="col">Số xe đã bán tháng trước</th>
                <th scope="col">Tổng tháng trước</th>
                <th scope="col">Số xe đã bán tháng này</th>
                <th scope="col">Tổng tháng này</th>
                <th scope="col">Chênh lệch số lượng</th>
                <th scope="col">Chênh lệch doanh thu</th>
              </tr>
            </thead>
            <tbody>
            
              <tr>
                <td>{{$product_of_last_month_sum}}</td>
                <td>{{number_format($totalamount_of_last_month_sum)}} <sup> vnd</sup></td>
                <td>{{$product_of_month_sum}}</td>
                <td>{{number_format($totalamount_of_month_sum)}} <sup> vnd</sup></td>
                <td>{{$product_of_month_sum - $product_of_last_month_sum}}</td>
                <td>{{number_format($totalamount_of_month_sum - $totalamount_of_last_month_sum)}} <sup> vnd</sup></td>
              </tr>
            </tbody>
  
          </table>
        </form>
          </div> 
        </div>
      </div> 
    </div>
  
        {{-- doanh thu từ bảo dưỡng xe --}}
        <div>
          <p class="title_thongke">Thống kê doanh thu từ bảo dưỡng xe</p>
        </div>
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="card card-stats">
          
          <br>
          <form autocomplete="off" method="POST" enctype="multipart/form-data" >
            
              @csrf
              @method('PUT')
              <div style="float: left">
                <p>Từ ngày: <input name="from_date"  type="text" id="datepicker5" class="form-control"></p>
                <input type="button" id="btn-dashboard-filter2" class="btn btn-primary btn-sm" value="Lọc kết quả">
              </div>  
              <div style="float: left">
                <p>Đến ngày: <input name="to_date"  type="text" id="datepicker6" class="form-control"></p>
              </div>
              <div style="float: left">
                <p>
                Lọc theo:
                <select class="dashboard-filter2 form-control">
                  <option value="">--Chọn--</option>
                  <option value="7ngay">7 ngày qua</option>
                  <option value="thangtruoc">Tháng trước</option>
                  <option value="thangnay">Tháng này</option>  
                  <option value="1nam">1 năm qua</option>
                </select>  
              </p>  
              </div>
          </form>
        {{-- chart --}}
        
        <div id="mythirdchart" style="height: 250px;"></div>
      </div>
    </div>
  </div>
</div>

        <script>
          $(document).ready(function(){
            chart30days2();
        var chart =  new Morris.Bar({
  
    element: 'mythirdchart',
    lineColors: ['#819C79','#fc8710'],
    // '#FF6541','#A4ADD3','#766856'
    fointFillColors:['#ffffff'],
    pointStrokeColors: ['black'],
            fillOpacity:0.6,
            hideHover: 'auto',
            parseTime: false,
  
    xkey: 'period',
    ykeys: ['order','quantity'],
    labels: ['Tổng tiền','Số lượng']
  });

   //filter 30 days
   function chart30days2(){
    var _token = $('input[name="_token"]').val();
    $.ajax({
      url:"{{ url('/days-filter2') }}",
              method:"GET",
              dataType:"JSON",
              data:{_token:_token},

              success:function(data){
                chart.setData(data);
              }
    });
  }
  $('.dashboard-filter2').change(function(){
    var dashboard_value2 = $(this).val();
    var _token = $('input[name="_token"]').val();
    $.ajax({
      url:"{{ url('/dashboard-filter2') }}",
              method:"GET",
              dataType:"JSON",
              data:{dashboard_value2:dashboard_value2,_token:_token},

              success:function(data){
                chart.setData(data);
              }
    });
  });
  $("#btn-dashboard-filter2").click(function(){
              // alert('ok');
              var _token = $('input[name="_token"]').val();
              var from_date = $('#datepicker5').val();
              var to_date = $('#datepicker6').val();
              $.ajax({
                url:"{{ url('/filter-by-date2') }}",
                method:"GET",
                dataType:"JSON",
                data:{from_date:from_date, to_date:to_date,_token:_token},
  
  
                success:function(data){
                  chart.setData(data);
                }
              });
            });
  
});
        </script>
        <script>
          $( function() {
            $( "#datepicker5" ).datepicker({
              prevText:"Tháng trước",
              nextText:"Tháng sau",
              dateFormat:"yy-mm-dd",
              dayNamesMin:[ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
              duration:"slow"
            });
  
          } );
  
          $( function() {
            $( "#datepicker6" ).datepicker({
              prevText:"Tháng trước",
              nextText:"Tháng sau",
              dateFormat:"yy-mm-dd",
              dayNamesMin:["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ nhật"],
              duration:"slow"
            });
          } );
          </script>
           <div class="row">
            <div class="card card-stats">
            <form>
              <table class="table table-bordered border-dark align-items-center mb-0"  style="margin: auto; width:100%; border: 1px solid">
                <thead class="table-dark">
                  
                <tr>
                  <th scope="col">Số xe bảo dưỡng tháng trước</th>
                  <th scope="col">Tổng tiền tháng trước</th>
                  <th scope="col">Số xe bảo dưỡng tháng này</th>
                  <th scope="col">Tổng tiền tháng này</th>
                  <th scope="col">Chênh lệch số lượng</th>
                  <th scope="col">Chênh lệch doanh thu</th>
                </tr>
              </thead>
              <tbody>
              
                <tr>
                  <td>{{$maintenance_of_last_month_sum}}</td>
                  <td>{{number_format($totalamount_maintenance_of_last_month_sum)}} <sup> vnd</sup></td>
                  <td>{{$maintenance_of_month_sum}}</td>
                  <td>{{number_format($totalamount_maintenance_of_month_sum)}} <sup> vnd</sup></td>
                  <td>{{$maintenance_of_month_sum - $maintenance_of_last_month_sum}}</td>
                  <td>{{number_format($totalamount_maintenance_of_month_sum - $totalamount_maintenance_of_last_month_sum)}} <sup> vnd</sup></td>
                </tr>
              </tbody>
    
            </table>
          </form>
            </div>
          </div>
       {{-- nhập xe --}}

       <div>
        <p class="title_thongke">Thống kê nhập xe</p>
      </div>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="card card-stats">
        
        <br>
        <form autocomplete="off" method="POST" enctype="multipart/form-data" >
          
            @csrf
            @method('PUT')
            <div style="float: left">
              <p>Từ ngày: <input name="from_date"  type="text" id="datepicker3" class="form-control"></p>
              <input type="button" id="btn-dashboard-filter1" class="btn btn-primary btn-sm" value="Lọc kết quả">
            </div>  
            <div style="float: left">
              <p>Đến ngày: <input name="to_date"  type="text" id="datepicker4" class="form-control"></p>
            </div>
            <div style="float: left">
              <p>
              Lọc theo:
              <select class="dashboard-filter1 form-control">
                <option value="">--Chọn--</option>
                <option value="7ngay">7 ngày qua</option>
                <option value="thangtruoc">Tháng trước</option>
                <option value="thangnay">Tháng này</option>  
                <option value="1nam">1 năm qua</option>
              </select>  
            </p>  
            </div>
        </form>
      
     
      {{-- chart --}}
      <div id="mysecondchart" style="height: 250px;"></div>
    </div>
  </div>
</div>
</div>
      <script>
        $(document).ready(function(){
          chart30days1();
      var chart =  new Morris.Bar({

  element: 'mysecondchart',
  lineColors: ['#819C79','#fc8710'],
  // '#FF6541','#A4ADD3','#766856'
  fointFillColors:['#ffffff'],
  pointStrokeColors: ['black'],
          fillOpacity:0.6,
          hideHover: 'auto',
          parseTime: false,

  xkey: 'period',
  ykeys: ['order','quantity'],
  labels: ['Tổng tiền','Số lượng']
});

 //filter 30 days
 function chart30days1(){
    var _token = $('input[name="_token"]').val();
    $.ajax({
      url:"{{ url('/days-filter1') }}",
              method:"GET",
              dataType:"JSON",
              data:{_token:_token},

              success:function(data){
                chart.setData(data);
              }
    });
  }
$('.dashboard-filter1').change(function(){
    var dashboard_value1 = $(this).val();
    var _token = $('input[name="_token"]').val();
    $.ajax({
      url:"{{ url('/dashboard-filter1') }}",
              method:"GET",
              dataType:"JSON",
              data:{dashboard_value1:dashboard_value1,_token:_token},

              success:function(data){
                chart.setData(data);
              }
    });
  });
$("#btn-dashboard-filter1").click(function(){
            // alert('ok');
            var _token = $('input[name="_token"]').val();
            var from_date = $('#datepicker3').val();
            var to_date = $('#datepicker4').val();
            $.ajax({
              url:"{{ url('/filter-by-date1') }}",
              method:"GET",
              dataType:"JSON",
              data:{from_date:from_date, to_date:to_date,_token:_token},


              success:function(data){
                chart.setData(data);
              }
            });
          });
});

      </script>
      <script>
        $( function() {
          $( "#datepicker3" ).datepicker({
            prevText:"Tháng trước",
            nextText:"Tháng sau",
            dateFormat:"yy-mm-dd",
            dayNamesMin:[ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
            duration:"slow"
          });

        } );

        $( function() {
          $( "#datepicker4" ).datepicker({
            prevText:"Tháng trước",
            nextText:"Tháng sau",
            dateFormat:"yy-mm-dd",
            dayNamesMin:["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ nhật"],
            duration:"slow"
          });
        } );
        </script>
        
      <div class="row">
        <div class="card card-stats">
          <form>
            <table class="table table-bordered border-dark align-items-center mb-0"  style="margin: auto; width:100%; border: 1px solid">
              <thead class="table-dark">    
              <tr>
                <th scope="col">Số xe đã nhập tháng trước</th>
                <th scope="col">Tổng tiền tháng trước</th>
                <th scope="col">Số xe đã nhập tháng này</th>
                <th scope="col">Tổng tiền tháng này</th>
                <th scope="col">Chênh lệch số lượng</th>
                <th scope="col">Chênh lệch doanh thu</th>
              </tr>
            </thead>
            <tbody>
            
              <tr>
                <td>{{$import_of_last_month_sum}}</td>
                <td>{{number_format($totalamount_import_of_last_month_sum)}} <sup> vnd</sup></td>
                <td>{{$import_of_month_sum}}</td>
                <td>{{number_format($totalamount_import_of_month_sum)}} <sup> vnd</sup></td>
                <td>{{$import_of_month_sum - $import_of_last_month_sum}}</td>
                <td>{{number_format($totalamount_import_of_month_sum - $totalamount_import_of_last_month_sum)}} <sup> vnd</sup></td>
              </tr>
            </tbody>
  
          </table>
        </form>
        </div>
        </div>

        {{-- <div class="row">
          <div class="card card-stats">
            <form>
              <table class="table table-bordered border-dark align-items-center mb-0"  style="margin: auto; width:100%; border: 1px solid">
                <thead class="table-dark">    
                <tr>
                  <th scope="col">Tổng tiền bán xe</th>
                  <th scope="col">Tổng tiền bảo dưỡng</th>
                  <th scope="col">Tổng tiền nhập xe</th>
                  <th scope="col">Tồn kho</th>
                  <th scope="col">Tổng cộng</th>
                </tr>
              </thead>
              <tbody>
              
                <tr>
                  <td>{{number_format($totalamount_of_month_sum)}} <sup> vnd</sup></td>
                  <td>{{number_format($totalamount_maintenance_of_month_sum)}} <sup> vnd</sup></td>
                  <td>{{number_format($totalamount_import_of_month_sum)}} <sup> vnd</sup></td>
                  <td>{{$import_of_month_sum - $import_of_last_month_sum}}</td>
                  <td>{{number_format($totalamount_import_of_month_sum - $totalamount_import_of_last_month_sum)}} <sup> vnd</sup></td>
                </tr>
              </tbody>
    
            </table>
          </form>
          </div>
          </div> --}}
       
     
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush