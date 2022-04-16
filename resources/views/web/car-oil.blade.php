<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('material') }}/img/favicon.png">
    <title>Cars</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    </head>
    <style>
        p{
            font-size: 15px;
        }
    </style>
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ url('/') }}" class="logo">Đại lý <em> Honda</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="{{ url('/') }}" >Trang chủ</a></li>
                            <li><a href="{{ url('/cars') }}">Xe máy</a></li>
                            <li><a href="{{ url('/baoDuong') }}">Bảo dưỡng</a></li>
                            {{-- <li><a href="{{ url('/accessary') }}">Phụ tùng</a></li> --}}
                            <li class="dropdown">
                                <a class="dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Phụ tùng</a>
                              
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('/accessary') }}">Phụ tùng chính hãng</a>
                                    <a class="dropdown-item" href="{{ url('/helmet') }}">Mũ bảo hiểm chính hãng</a>
                                    <a class="dropdown-item" href="{{ url('/caroil') }}">Dầu nhớt chính hãng</a>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Giới thiệu</a>
                              
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('/about') }}">Về chúng tôi</a>
                                    <a class="dropdown-item" href="{{ url('/blog') }}">Blog</a>
                                    <a class="dropdown-item" href="{{ url('/team') }}">Team</a>
                                </div>
                            </li>
                            <li><a href="{{ url('/contact') }}">Liên hệ</a></li> 
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-honda.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
                            Dầu nhớt <em>chính hãng</em></h2>
                        <p>Dầu nhớt thứ không thể thiếu dành cho xe</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->


    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">

                <h3 style="color: red; margin-top:50px">DẦU NHỚT CHÍNH HÃNG</h3>
                <br><br>
                    <div>
                    <strong> DẦU NHỜN CHÍNH HIỆU HONDA: TỐI ƯU CÔNG SUẤT CHO ĐỘNG CƠ XE HONDA</strong> <br>
                    </div>
                    <div style="width: 850px">
                   <p> Honda luôn không ngừng nỗ lực nghiên cứu để tạo ra các sản phẩm chất lượng tốt, giá cả hợp lý với mục tiêu tạo Niềm vui
                     mua hàng cho khách hàng Honda.<br>
                    Sản phẩm Dầu nhớt Honda được phát triển chuyên biệt cho từng dòng xe: Xe số, xe ga, xe côn tay và xe thể thao nhằm tối ưu<br>
                     hiệu suất hoạt động của động cơ Honda.<br><br>
                    Thông số kỹ thuật của dầu nhớt Honda là SL MA/MB 10W-30 tuân thủ các tiêu chuẩn chất lượng nghiêm ngặt với đặc điểm nổi trội chính là độ nhớt 10W-30. Khác với các độ nhớt phổ biến trên thị trường như 10W-40, 20W-40, độ nhớt 10W-30 cho chất dầu lỏng hơn, dễ dàng bôi trơn nhanh toàn bộ các chi tiết sâu bên trong động cơ giúp xe khởi động dễ dàng trong mọi điều kiện nhiệt độ, đồng thời giúp xe Honda tiết kiệm nhiên liệu lên tới 8% so với sử dụng các độ nhớt khác, từ đó góp phần giảm khí thải, thân thiện hơn với môi trường.<br><br>
                    
                    Các sản phẩm dầu nhớt Honda chai bao gồm:<br><br>
                    
                    - Dầu tổng hợp cao cấp Honda Full Synthetic SL MA 10W-30: Đặc chế cho các dòng xe côn tay (Winner/ Winner X/ MSX/ Monkey) và thể thao Honda (CB/ CBR/ Rebel/ Goldwing)<br><br>    
                    
                    - Dầu nhờn xe số Honda SL MA 10W-30 đặc chế cho các dòng xe số Honda:<br>
                    
                    +Dung tích 800ml: Thay định kỳ cho các dòng xe số Honda.<br>
                    +Dung tích 1.2L: Thay đối với xe số sửa chữa nặng và rã máy.<br><br>
                    - Dầu nhờn xe ga Honda SL MA 10W-30 đặc chế cho các dòng xe số Honda:<br><br>
                    
                     +Dung tích 700ml: Thay định kỳ cho dòng xe Vision. Đây là dung tích hiếm gặp trên thị trường do các hãng dầu khác sản xuất đại trà mà không tập trung vào một dòng xe cụ thể.
                     +Dung tích 800ml: Thay định kỳ các cho dòng xe ga Honda khác (LEAD, Air Blade, PCX, SH mode, SH).
                     +Dung tích 1L: Thay đối với xe ga sửa chữa nặng và rã máy.</p>
                   
                <img src="assets/images/d1.jpg" alt="" >
                
                <p>Honda Việt Nam khuyến nghị khách hàng đi xe Honda nên lựa chọn dầu nhớt chính hiệu Honda tại các Cửa hàng bán xe máy và dịch vụ do<br> Honda ủy nhiệm (HEAD), cũng như các cửa hàng phụ tùng và bảo dưỡng xe máy chuyên nghiệp trên toàn quốc để tối ưu công suất và bảo vệ đông cơ xe máy Honda.</p>
                 </div>

        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->

    
    <!-- ***** Footer Start ***** -->
    @extends('web.footer') 

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

  </body>
</html>