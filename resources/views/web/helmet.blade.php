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
                            <li><a href="{{ url('/') }}" class="active">Trang chủ</a></li>
                            <li><a href="{{ url('/cars') }}">Xe máy</a></li>
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
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Giới thiệu</a>
                              
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('/about') }}">Về chúng tôi</a>
                                    <a class="dropdown-item" href="{{ url('/blog') }}">Blog</a>
                                    <a class="dropdown-item" href="{{ url('/team') }}">Team</a>
                                    <a class="dropdown-item" href="{{ url('/testimonials') }}">Testimonials</a>
                                    <a class="dropdown-item" href="{{ url('/faq') }}">FAQ</a>
                                    <a class="dropdown-item" href="{{ url('/terms') }}">Terms</a>
                                </div>
                            </li>
                            <li><a href="{{ url('/contact') }}">Liên lạc</a></li> 
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
                        <h2>Our <em>Cars</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->


    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            

                <h3 style="color: red; margin-top:50px">MŨ BẢO HIỂM CHÍNH HÃNG HONDA</h3>
                <br>
                <div style="width: 850px"> 
                <div>
                <h5>HƯỚNG DẪN SỬ DỤNG MŨ BẢO HIỂM</h5>
                </div>
                <br>
                <p>Sử dụng mũ bảo hiểm đúng cũng là một yếu tố quan trọng để đảm bảo an toàn.<br>
                    -Không sử dụng mũ bị móp méo vì như vậy độ bền va đập và khả năng hấp thụ xung động của mũ đã bị giảm không đảm bảo an toàn.<br>
                    -Lựa chọn cỡ mũ hợp với đầu mình, đội chật quá thì khó chịu, rộng quá thì mũ dễ bị xoay qua xoay lại nguy hiểm khi lái xe.<br>
                    -Hãy kiểm tra kính chắn gió, lưỡi chai, quai và khoá một cách cẩn thận trước khi đội.<br>
                    -Siết chặt quai mũ bằng khoá ở dưới cằm , nếu quai lỏng gió sẽ thổi khi lái xe khiến mũ bị lật ra sau hoặc sụp xuống mắt gây nguy hiểm,<br>
                          thậm trí mũ sẽ văng ra khỏi đầu nếu tai nạn xảy ra.<br>
                    -Không đội mũ ngược về phía sau sẽ rất dễ văng ra khỏi đầu nếu xảy ra tai nạn.</p><br>
                    <img src="assets/images/m1.jpg" alt="">
                
                <br><br>
                    <div>
                    <strong> NHẬN DẠNG MŨ BẢO HIỂM</strong> <br>
                    </div>
                   <p>Với mong muốn “An toàn và Hạnh phúc“ cho khách hàng, Hệ thống xe máy Dung Vượng muốn tư vấn cung cấp
                      những thông tin cơ bản về việc lựa chọn và nhận dạng mũ bảo hiểm Honda như sau:<br>

                    -Trên mũ có dán tem dấu hợp chuẩn CS-TCVN 5756-2001.<br>
                    
                    -Mũ được làm bằng vật liệu tốt đủ cứng để có thể bảo vệ, có lớp sơn bền đẹp, quai và khoá chắc chắn, lớp lót trong đẹp làm bằng chất liệu tốt…<br>
                    
                    -Mũ được đóng gói theo tiêu chuẩn quy định, có hộp giấy bao gói, có ghi rõ nhà sản xuất hoặc nhà nhập khẩu và kèm theo hướng dẫn sử dụng rõ ràng.<br>
                    
                    -Chỉ có mũ chất lượng cao mới đảm bảo an toàn.<br>
                    
                    Sau khi đảm bảo chắc chắn loại mũ nào có chất lượng cao thì khách hàng mới nên cân nhắc hình thức và sự tiện dụng. Tuỳ theo sở thích của từng người
                     mà sự lựa chọn khác nhau, nhưng cũng nên chú ý tới tính thời trang tức sự đồng điệu về màu sắc của xe mà bạn đang sử dụng với màu và kiểu dáng của mũ,
                      hoặc tính đồng nhất về thương hiệu sản phẩm giữa xe và mũ như đi xe Honda đội mũ Honda chẳng hạn.</p><br>
                <img src="assets/images/m2.jpg" alt="" >
                <div>
                    <br>
               <strong>MŨ BẢO HIỂM NGƯỜI LỚN</strong>
                </div>
                <p>Không chỉ nổi tiếng trong lĩnh vực sản xuất xe gắn máy và ô tô, Honda còn được biết đến là một thương hiệu mũ bảo hiểm uy tín và chất lượng<br>

                    Mũ bảo hiểm người lớn có 3 kiểu dáng:<br>
                    
                    -Mũ cả đầu có cằm.<br>
                    
                    -Mũ 3/4 đầu có kính, phong cách thể thao.<br>
                    
                    -Mũ nửa đầu Vic, Matt,..<br><br>
                    
                    Ưu điểm của mũ bảo hiểm chính hãng Honda:<br>
                    
                    -Thiết kế siêu bảo vệ, bền đẹp<br>
                    
                    -Kiểu dáng trẻ trung, phối màu tinh tế.</p>
                <img src="assets/images/m3.jpg" alt=""> 
                <br>
                    <div>
                        <strong>MŨ BẢO HIỂM TRẺ EM</strong>
                         </div>
                    <p>Mũ bảo hiểm cho trẻ em của Honda, với công nghệ tiên tiến của Hoa Kỳ, là sự kết hợp hài hòa giữa chất lượng an toàn và kiểu dáng độc đáo.<br>

                        Đáp ứng những yêu cầu về an toàn và chất lượng khắt khe nhất của Việt Nam (QCVN2:2008/BKHCN), mũ được sản xuất từ vật liệu siêu nhẹ,
                         độ bền cao, phụ kiện có thể thay mới.<br>
                        
                        Mũ bảo hiểm cho trẻ em gồm 2 loại:<br><br>
                        
                        -Mũ Kiddy có kính với họa tiết xinh xắn, chắn gió bụi<br>
                        
                        -Mũ trẻ em nhỏ gọn nhưng chắc chắn
                        </p>  
                    <img src="assets/images/m4.jpg" alt=""> 
                   
                </div>
        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->

    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2020 Company Name
                        - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

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