<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>PHPJabbers.com | Free Car Dealer Website Template</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    </head>
    
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
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Phụ tùng</a>
                              
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('/accessary') }}">Phụ tùng chính hãng</a>
                                    <a class="dropdown-item" href="{{ url('/helmet') }}">Mũ bảo hiểm chính hãng</a>
                                    <a class="dropdown-item" href="{{ url('/caroil') }}">Dầu nhớt chính hãng</a>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Giới thiệu</a>
                              
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

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Honda <em>Blog</em></h2>
                        <p>Các cuộc triển lãm xe máy lớn tại Việt Nam</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Blog Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <br>
            <br>
            <div class="row">
                <div class="col-lg-8">
                    <section class='tabs-content'>
                      <article>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/Q7GcDexk2dc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h4>Triển lãm xe máy Việt Nam 2015</h4>

                        <p><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i>  15 comments</p>
                        <p>Mở cửa từ ngày 7 - 10.4.2016, triển lãm mô tô, xe máy Việt Nam 2016 (Vietnam Motorcycle Show 2016) lần đầu tiên tổ chức tại Việt Nam đã chính thức khép lại. Được biết, sau 4 ngày diễn ra tại TP.HCM triển lãm đã thu hút 141.638 lượt khách tham quan.</p>
                        <p> Với 8 thương hiệu xe góp mặt trong đó có 5 thương hiệu sản xuất, lắp ráp trong nước cùng 3 thương hiệu mô tô phân khối lớn. Mặc dù triển lãm mô tô, xe máy Việt Nam 2016 do Hiệp hội các nhà sản xuất xe máy Việt Nam (VAMM) đứng ra tổ chức nhưng triển lãm lại chú trọng nhiều vào mô tô phân khối lớn nhằm thu hút khách tham quan. </p>
                       
                      </article>

                      <br>
                      <br>

                      <article>
                        <img src="assets/images/trienlam1.jpg" alt="">
                        <h4>Triển lãm xe máy diễn ra vào tháng 4/2016.</h4>
                        <p><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i>  15 comments</p>
                        <p>Hiệp hội Các nhà sản xuất xe máy Việt Nam (VAMM) chính thức đưa ra thông báo về việc tổ chức Triển lãm mô tô, Xe máy Việt Nam 2016 (Vietnam Motorcycle Show 2016), với sự tham gia của 5 thành viên gồm Honda, Piaggio, Suzuki, SYM và Yamaha, cùng một số đơn vị nhập khẩu xe máy chính hãng và doanh nghiệp thuộc ngành công nghiệp phụ trợ.

                            Theo ban tổ chức, triển lãm được mở ra nhằm tạo lập một sân chơi chung cho ngành công nghiệp xe máy và hướng tới mục tiêu thúc đẩy bán hàng. Triển lãm sẽ giới thiệu các mẫu xe từ phổ thông, cao cấp, đến các xe phân khối lớn của các hãng xe thành viên của hiệp hội xe máy Việt Nam, cũng như các thương hiệu xe nhập khẩu. 
                            
                            Các doanh nghiệp sản xuất phụ kiện phụ trợ xe máy,... đồng hành cùng triển lãm cũng có cơ hội tiếp cận người tiêu dùng trong những ngày diễn ra sự kiện.
                            
                            Triển lãm dự kiến tiếp đón khoảng 100.000 khách tham quan. Sự kiện sẽ diễn ra từ ngày 7-10/04/2016 tại Trung tâm hội chợ và triển lãm Sài Gòn (SECC).</p>
                    
                      </article>

                      <br>
                      <br>

                      <article>
                        <img src="assets/images/tlcbr.jpg" alt="">
                        <h4>Honda công bố mẫu xe CBR mới tại triển lãm EICMA 2018</h4>
                        <p><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i>  15 comments</p>
                        <p>Vào năm 2018, Honda đã cho ra mắt các mẫu xe mới CB1000R, CB300R và CB125R với thiết kế mới mẻ, độc đáo mang tên “Neo Sports Café”, nay, Honda mang phong cách thiết kế này đến với phân khúc hạng trung. Ngôn ngữ thiết kế của phong cách này nằm ở thiết kế hiện đại và tối giản hoá, pha trộn với thiết kế lấy cảm hứng từ dòng Café Racer, tất cả gói gọn lại trong 1 hình dáng thiết kế dạng hình thang độc đáo, gọn gàng và bắt mắt. Khối động cơ 4 xy lanh thẳng hàng được phô diễn tối đa, kèm cụm đèn tròn và bình xăng đặc trưng của gia đình “Neo Sports Café”.</p>
                       <p>Với vẻ ngoài cao cấp hơn, công nghệ xe cũng được nâng cấp cùng bộ giảm xóc trước ống lồng ngược Showa SFF, ngàm phanh 4 pít tông với chốt nằm song song bề mặt phanh đĩa, công nghệ kiểm soát lực xoắn HSTC, ly hợp chống trượt 2 chiều và những trang bị hiện đại khác.</p>
                      </article>
                    </section>
                </div>

                <div class="col-lg-4">
                    <h5 class="h5">Search</h5>
                    
                    <div class="contact-form">
                        <form id="search_form" name="gs" method="GET" action="#">
                          <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                        </form>
                    </div>

                    <h5 class="h5">Recent posts</h5>

                    <ul>
                        <li>
                            <p><a href="{{ url('/blog') }}">Triển lãm xe máy 2015</a></p>
                            <small><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10</small>
                        </li>

                        <li><br></li>

                        <li>
                            <p><a href="{{ url('/blog') }}">Triển lãm xe máy diễn ra vào tháng 4/2016.</a></p>
                            <small><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10</small>
                        </li>

                        <li><br></li>

                        <li>
                          <p><a href="{{ url('/blog') }}">Honda công bố mẫu xe CBR mới tại triển lãm EICMA 2018</a></p>

                          <small><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog End ***** -->

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