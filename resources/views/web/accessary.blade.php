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
                            <li><a href="{{ url('/') }}">Trang chủ</a></li>
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
                            Phụ tùng <em>chính hãng</em></h2>
                        <p>Phụ tùng thiết yếu giúp xe hoạt động trơn chu hơn </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->
    
   
    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            
                <h3 style="color: red; margin-top:50px">PHỤ TÙNG CHÍNH HÃNG</h3>
                <br><br>
                <div style="width: 850px">
                    <div>
                    <strong> VỆ SINH KIM PHUN BUỒNG ĐỐT</strong> <br>
                    </div>
                   <p> Sản phẩm dung dịch vệ sinh kim phun và buồng đốt xe máy sử dụng cho xe tay ga, xe số, xe côn tay với khả năng:<br>
                    
                    -Làm sạch hoàn hảo carbon đóng cặn tích tụ trong buồng đốt, đầu piston<br>
                    -Cải tiến hiệu năng của động cơ<br>
                    -Tiết kiệm nhiên liệu<br>
                    -Giảm tiếng ồn động cơ<br>
                    -Giúp bảo vệ toàn diện hệ thống đốt nhiên liệu của xe máy.<br>
                    Honda khuyến cáo bạn nên sử dụng sản phẩm cho xe máy của mình với mỗi 3000km để đạt hiệu quả tốt nhất.</p>
                <img src="assets/images/pt1.jpg" alt="" width="400px">
                <div>
               <strong>NHÔNG XÍCH </strong>
                </div>
                <p>Honda khuyến cáo xe chạy 1000 km bạn nên kiểm tra và bôi trơn định kì 1 lần đối với xích tải xe số để đảm bảo xe của bạn được vận hành an toàn.</p>
                <img src="assets/images/pt2.jpg" alt="" width="400px"> 
                
                    <div>
                        <strong>LỐP XE</strong>
                         </div>
                    <p>Trên thị trường có 2 loại lốp dành cho xe máy, bao gồm: lốp có săm thông thường và lốp không săm.
                    Đối với những dòng xe máy phổ thông giá rẻ, nhà sản xuất thường dùng loại lốp có săm do ưu thế về giá thành
                     và dễ dàng bơm vá khi xảy ra sự cố. Trong khi đó, lốp không săm hầu hết được trang bị cho các dòng xe tay ga
                     vì nó an toàn khi sử dụng và không bị xì hơi ngay cả khi cán đinh.<br>
                    
                    Về cơ bản, lốp xe máy có 6 tính chất: khả năng bám mặt đường thông thường; khả năng bám đường khi đường ướt; 
                    vận hành trên địa hình không bằng phẳng; độ gây ồn; độ bền và cấu trúc của lốp xe. Tuỳ từng loại xe máy mà nên
                     chọn loại lốp riêng thích hợp.<br>
                    
                    Nên chọn lốp xe chính hãng cho xe máy Honda để đảm bảo tiêu chuẩn an toàn.</p>  
                    <img src="assets/images/pt3.jpg" alt="" width="400px"> 
                    <div>
                   <strong>BUGI</strong><br>
                    </div>
                    <p>Honda khuyến cáo cứ 8000 km bạn nên thay thế định kì 1 lần để đảm bảo xe của bạnđược vận hành an toàn,
                         riêng với Airblade và PCX 2016, sau 12000 km bạn nên thay thế định kì 1 lần.</p>
                    <img src="assets/images/pt4.jpg" alt="" width="400px">
                    <div>
                        <strong> ẮC QUY </strong>
                    </div>
                   
                    <p>Honda khuyến cáo sau 2 năm bạn nên thay thế định kì 1 lần đối với ắc quy nước và sau 3 năm thay thế định kì 1 lần
                    đối với ắc quy khô để đảm bảo xe của bạn được vận hành an toàn.</p>
                    <img src="assets/images/pt5.jpg" alt="" width="400px">
                    <div>
                    <strong> DẦU NHỚT </strong><br>
                    </div>
                    <p>
                    Là loại chất lỏng rất quan trọng cho động cơ. Nhưng nhiều người khi sử dụng dầu nhớt cho động của mình nhưng vẫn
                    chưa năm rõ hết tác dụng và chức năng của dầu nhớt:<br>

                    Tác dụng bôi trơn giúp cho piston chuyển di lên xuống một cách nhẹ nhõm, êm ái trong lòng xi-lanh.<br>
                    -Tác dụng làm mát, tránh được tình trạng động cơ bị quá nhiệt hay cháy piston<br>
                    -Tác dụng làm kín:  khi động cơ vận hành, dầu nhớt như một lớp đệm mềm không định hình bịt kín khe hở giữa piston và thành xi-lanh để áp suất sinh ra trong quá trình đốt cháy nhiên liệu không bị thất thoát.<br>
                    -Tác dụng làm sạch: quá trình đốt cháy nhiên liệu dĩ nhiên sẽ sản sinh ra muội đọng lại trong động cơ, tác dụng tiếp theo của dầu nhớt chính là cuốn trôi và làm sạch những muội bám này.<br>
                    -Tác dụng chống gỉ: bề mặt của các chi tiết kim loại trong động cơ được bao bọc bằng một màng dầu mỏng có tác dụng hạn chế sự xúc tiếp với không khí, tránh được hiện tượng ôxy hóa dẫn đến han gỉ.<br>
                    </p>
                    <img src="assets/images/pt6.jpg" alt="" width="400px">
                    <div>
                    <strong> TẤM LỌC GIÓ</strong><br>
                     </div>
                     <p>
                    Honda khuyến cáo sau 16000 km bạn nên thay thế định kì 1 lần đối với tất cả các loại xe trừ Wave alpha (12000 km thay thế 1 lần) để đảm bảo xe bạn được vận hành an toàn.<br>
                     </p>
                    <img src="assets/images/pt7.jpg" alt="" width="400px">
                     <div>
                    <strong>NƯỚC LÀM MÁT </strong> <br>
                </div>
                    <p>
                    Honda khuyến cáo cứ 2 năm bạn nên thay thế định kì 1 lần để đảm bảo xe của bạn được vận hành an toàn,
                     riêng đối với xe Airblade và PCX 2016, cứ sau 3 năm thay thế định kì 1 lần đối với dung dịch làm mát.<br>
                    </p>
                     <img src="assets/images/pt8.jpg" alt="" width="400px">
                    <div>
                   <strong>MÁ PHANH </strong>  <br>
                </div>
                <p>
                    Honda khuyến cáo cứ 4000 km bạn nên kiểm tra định kì 1 lần đối với má phanh để đảm bảo xe máy
                     của bạn được vận hành an toàn, riêng đối với AirBlade và PCX 2016, xe chạy sau 6000 km nên
                      kiểm tra định kì 1 lần.
                    </p>
                      <img src="assets/images/pt9.jpg" alt="" width="400px">
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