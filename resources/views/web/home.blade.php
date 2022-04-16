<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <title>Trang chủ</title>

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
                            <li><a href="{{ url('/') }}" class="active">Trang chủ</a></li>
                            <li><a href="{{ url('/cars') }}">Xe máy</a></li>
                            <li><a href="{{ url('/baoDuong') }}">Bảo dưỡng</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="false">Phụ tùng</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('/accessary') }}">Phụ tùng chính hãng</a>
                                    <a class="dropdown-item" href="{{ url('/helmet') }}">Mũ bảo hiểm chính hãng</a>
                                    <a class="dropdown-item" href="{{ url('/caroil') }}">Dầu nhớt chính hãng</a>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="false">Giới thiệu</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('/about') }}">Về chúng tôi</a>
                                    <a class="dropdown-item" href="{{ url('/blog') }}">Blog</a>
                                    <a class="dropdown-item" href="{{ url('/team') }}">Team</a>
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

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/honda.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>Chất lượng hàng đầu</h6>
                <h2>Đại lý <em>Honda</em> uy tín!</h2>
                <div class="main-button">
                    <a href="{{ url('/contact') }}">Liên lạc</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Cars Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            {{-- @foreach ($show_product1 as $row)
            <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/{{$row->image}}"  alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <del>20.000.000đ </del> &nbsp; {{$row->price}}đ
                            </span>

                            <h4>{{$row->name}}</h4>

                            <p>
                                <i class="fa fa-dashboard"></i> 130 000km &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cube"></i>Model: {{$row->model}}  &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cog"></i>SL: {{$row->quantity}} &nbsp;&nbsp;&nbsp;
                            </p>

                            <ul class="social-icons">
                                <li><a href="{{ url('/car-details/'.$row->id)}}">+ View Car</a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div
                @endforeach> --}}
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>XE <em>NỔI BẬT</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($show_product_detail as $item)
                    <div class="col-lg-4">
                        <div class="trainer-item">
                            <div class="image-thumb" style="width:320px;height:225px; overflow: hidden;">
                                @if (count($item->image) > 0)
                                    <Img src="{{ asset('/assets/images/' . $item->image[0]->image) }}"
                                        width="100px" />
                                @endif
                            </div>
                            <div class="down-content">
                                <span>
                                    {{ number_format($item->price) }}<sup> vnd</sup>
                                </span>

                                <h4>{{ $item->nameProduct }}</h4>

                                <p>
                                    <i class="fa fa-dashboard"></i> 130 000km &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-cube"></i> {{ $item->model }} &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-cog"></i> Manual &nbsp;&nbsp;&nbsp;
                                </p>

                                <ul class="social-icons">
                                    <li><a href="{{  url('/car-details/' . $item->id) }}">+ View Car</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

            <br>

            <div class="main-button text-center">
                <a href="{{ url('/cars') }}">View Cars</a>
            </div>
        </div>
    </section>
    <!-- ***** Cars Ends ***** -->

    <section class="section section-bg" id="schedule"
        style="background-image: url(assets/images/about-fullscreen-1-1920x700.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                        <h2>Về chúng tôi</h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Niềm tin cơ bản</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-content text-center">
                        <p>Mối quan hệ giữa các thành viên Honda dựa trên sự tin cậy lẫn nhau. Lòng tin đó được tạo lập bởi sự nhận thức tôn trọng cá nhân, giúp đỡ những người gặp khó khăn, nhận sự giúp đỡ lúc khó khăn, chia sẻ kiến thức, đóng góp chân thành để hoàn thành trách nhiệm.</p>

                        <p>Nhận thức và tôn trọng những khác biệt cá nhân trong mỗi người và đối xử với nhau một cách công bằng. Công ty chúng tôi cam kết thực hiện theo nguyên tắc này và tạo cơ hội bình đẳng cho mỗi cá nhân. Cơ hội cho từng cá nhân không phụ thuộc vào chủng tộc, giới tính, tuổi tác, tôn giáo, nguồn gốc, quốc tịch, học vấn, địa vị kinh tế hay xã hội</p>
                        <p>Hãy suy nghĩ một cách sáng tạo và hành động theo sáng kiến ​​và đánh giá của chính bạn, đồng thời nhận thức rõ về trách nhiệm đối với kết quả của những hành động đó.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Blog Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Honda <em>Blog</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Các cuộc triển lãm xe máy lớn tại Việt Nam</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
                <div class="col-lg-4">
                    <ul>
                        <li><a href='#tabs-1'>Triển lãm xe máy Việt Nam 2015</a></li>
                        <li><a href='#tabs-2'>Triển lãm xe máy diễn ra vào tháng 4/2016.</a>
                        </li>
                        <li><a href='#tabs-3'>Honda công bố mẫu xe CBR mới tại triển lãm EICMA 2018</a></li>
                        <div class="main-rounded-button"><a href="{{ url('/blog') }}">Read More</a></div>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <section class='tabs-content'>
                        <article id='tabs-1'>
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/Q7GcDexk2dc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            <h4>Triển lãm xe máy Việt Nam 2015</h4>

                        <p><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i>  15 comments</p>
                        <p>Mở cửa từ ngày 7 - 10.4.2016, triển lãm mô tô, xe máy Việt Nam 2016 (Vietnam Motorcycle Show 2016) lần đầu tiên tổ chức tại Việt Nam đã chính thức khép lại. Được biết, sau 4 ngày diễn ra tại TP.HCM triển lãm đã thu hút 141.638 lượt khách tham quan.</p>
                        <p> Với 8 thương hiệu xe góp mặt trong đó có 5 thương hiệu sản xuất... </p>
                       
                            <div class="main-button">
                                <a href="{{ url('/blog') }}">Xem tiếp</a>
                            </div>
                        </article>
                        <article id='tabs-2'>
                            <img src="assets/images/trienlam1.jpg" alt="">
                        <h4>Triển lãm xe máy diễn ra vào tháng 4/2016.</h4>
                        <p><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i>  15 comments</p>
                        <p>Hiệp hội Các nhà sản xuất xe máy Việt Nam (VAMM) chính thức đưa ra thông báo về việc tổ chức Triển lãm mô tô, Xe máy Việt Nam 2016 (Vietnam Motorcycle Show 2016), với sự tham gia của 5 thành viên gồm Honda, Piaggio, Suzuki, SYM và Yamaha, cùng một số đơn vị nhập khẩu xe máy chính hãng và doanh nghiệp thuộc ngành công nghiệp phụ trợ.

                            Theo ban tổ chức, triển lãm được mở ra nhằm tạo lập một sân chơi chung cho ngành công nghiệp xe máy...</p>
                    
                            <div class="main-button">
                                <a href="{{ url('/blog') }}">Xem tiếp</a>
                            </div>
                        </article>
                        <article id='tabs-3'>
                            <img src="assets/images/tlcbr.jpg" alt="">
                        <h4>Honda công bố mẫu xe CBR mới tại triển lãm EICMA 2018</h4>
                        <p><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i>  15 comments</p>
                        <p>Vào năm 2018, Honda đã cho ra mắt các mẫu xe mới CB1000R, CB300R và CB125R với thiết kế mới mẻ, độc đáo mang tên “Neo Sports Café”, nay, Honda mang phong cách thiết kế này đến với phân khúc hạng trung. Ngôn ngữ thiết kế của phong cách này nằm ở thiết kế hiện đại và tối giản hoá, pha trộn với thiết kế lấy cảm hứng từ dòng Café Racer, tất cả gói gọn lại trong 1 hình dáng thiết kế dạng hình thang độc đáo, gọn gàng và bắt mắt. Khối động cơ 4 xy lanh thẳng hàng được phô diễn tối đa...</p>
                      
                            <div class="main-button">
                                <a href="{{ url('/blog-detail') }}">Xem tiếp</a>
                            </div>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action"
        style="background-image: url(assets/images/banner-honda.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Send us a <em>message</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula, sit amet dapibus
                            odio augue eget libero. Morbi tempus mauris a nisi luctus imperdiet.</p>
                        <div class="main-button">
                            <a href="{{ url('/contact') }}">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Testimonials Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
        </div>
    </section>
    <!-- ***** Testimonials Item End ***** -->

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
