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

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-honda.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Learn more <em>About Us</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <br>
            <br>
            <br>
            <div class="row" id="tabs">
              <div class="col-lg-4">
                <ul>
                  <li><a href='#tabs-1'><i class="fa fa-soccer-ball-o"></i> Honda Việt Nam</a></li>
                  <li><a href='#tabs-2'><i class="fa fa-briefcase"></i> Honda xe máy</a></a></li>
                  <li><a href='#tabs-3'><i class="fa fa-heart"></i> Niềm tin cơ bản</a></a></li>
                </ul>
              </div>
              <div class="col-lg-8">
                <section class='tabs-content'>
                  <article id='tabs-1'>
                    <img src="assets/images/about-image-1-940x460.jpg" alt="">
                    <h3 style="color: red">Honda Việt Nam</h3>
                    <p>
                    Được thành lập vào năm 1996, công ty Honda Việt Nam là liên doanh giữa Công ty Honda Motor (Nhật Bản), Công ty Asian Honda Motor (Thái Lan) và Tổng Công ty Máy Động Lực và Máy Nông nghiệp Việt Nam với 2 ngành sản phẩm chính: xe máy và xe ô tô. 25 năm có mặt tại Việt Nam, Honda Việt Nam đã không ngừng phát triển và trở thành một trong những công ty dẫn đầu trong lĩnh vực sản xuất xe gắn máy và nhà sản xuất ô tô uy tín tại thị trường Việt Nam.
                    Honda Việt Nam tự hào mang đến cho khách hàng những sản phẩm chất lượng cao, dịch vụ tận tâm và những đóng góp vì một xã hội giao thông lành mạnh. Với khẩu hiệu “Sức mạnh của những Ước mơ”, Honda mong muốn được chia sẻ và cùng mọi người thực hiện ước mơ thông qua việc tạo thêm ra nhiều niềm vui mới cho người dân và xã hội.</p>
                  </article>
                 
                  <article id='tabs-2'>
                    <img src="assets/images/about-image-2-940x460.jpg" alt="">
                    <h3 style="color: red">Honda xe máy</h4>
                    <p> Hiểu rõ xe máy là phương tiện đi lại quan trọng và chủ yếu tại Việt Nam, Honda Việt Nam luôn nỗ lực hết mình cung cấp cho khách hàng những sản phẩm xe máy có chất lượng cao nhất với giá cả hợp lý được sản xuất từ những nhà máy thân thiện với môi trường.
                      Kể từ khi Honda bước chân vào thị trường Việt Nam, công ty đã liên tục đầu tư xây dựng cơ sở hạ tầng sản xuất nhằm đáp ứng nhu cầu ngày càng tăng cao của thị trường – nơi xe máy là phương tiện chiếm gần 90% tại các thành phố lớn. Tính đến nay, Honda Việt Nam có 6 nhà máy sản xuất và lắp ráp xe máy và phụ tùng xe máy.</p>
                  </article>
                  <article id='tabs-3'>
                    <img src="assets/images/about-image-3-940x460.jpg" alt="">
                    <h3 style="color: red">Niềm tin cơ bản</h3>
                    <br>
                    <h5 style="color: red">Tôn trọng con người</h5>
                    <p>Mỗi con người sinh ra là một cá thể tự do, độc đáo, với khả năng tư duy, lập luận và sáng tạo và khả năng mơ ước. “Tôn trọng con người” đòi hỏi Honda khuyến khích và phát triển những đặc tính này trong công ty bằng việc tôn trọng những khác biệt cá nhân và tin tưởng lẫn nhau như những người cộng sự bình đẳng</p>
                    <br>
                    <h5 style="color: red">Lòng tin</h5>
                    <p>Mối quan hệ giữa các thành viên Honda dựa trên sự tin cậy lẫn nhau. Lòng tin đó được tạo lập bởi sự nhận thức tôn trọng cá nhân, giúp đỡ những người gặp khó khăn, nhận sự giúp đỡ lúc khó khăn, chia sẻ kiến thức, đóng góp chân thành để hoàn thành trách nhiệm.</p>
                    <h5 style="color: red">Bình đẳng</h5>
                    <p>Nhận thức và tôn trọng những khác biệt cá nhân trong mỗi người và đối xử với nhau một cách công bằng. Công ty chúng tôi cam kết thực hiện theo nguyên tắc này và tạo cơ hội bình đẳng cho mỗi cá nhân. Cơ hội cho từng cá nhân không phụ thuộc vào chủng tộc, giới tính, tuổi tác, tôn giáo, nguồn gốc, quốc tịch, học vấn, địa vị kinh tế hay xã hội</p>
                    <h5 style="color: red">Chủ động</h5>
                    <p>Hãy suy nghĩ một cách sáng tạo và hành động theo sáng kiến ​​và đánh giá của chính bạn, đồng thời nhận thức rõ về trách nhiệm đối với kết quả của những hành động đó.</p>
                  </article>
                </section>
              </div>
            </div>
        </div>
    </section>
    <!-- ***** Our Classes End ***** -->

    <!-- ***** Call to Action Start ***** -->
    {{-- <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-honda.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Send us a <em>message</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula, sit amet dapibus odio augue eget libero. Morbi tempus mauris a nisi luctus imperdiet.</p>
                        <div class="main-button">
                            <a href="{{ url('/contact') }}">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ***** Call to Action End ***** -->

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