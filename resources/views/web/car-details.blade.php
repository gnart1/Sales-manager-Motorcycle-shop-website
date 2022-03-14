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

    <title>Chi tiết sản phẩm</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

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
                            {{-- <li><a href="{{ url('/accessary') }}">Phụ tùng</a></li> --}}
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
    <section class="section section-bg" id="call-to-action"
        style="background-image: url({{ asset('assets/images/banner-honda.jpg') }})">
        <div class="container">



            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2><small><del>$12 999</del></small> {{ $show_product_detail[0]->price }}</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  @foreach($show_product_detail[0]->image  as $itemImg)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{$loop->index == 0 ? 'active' : ''}}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($show_product_detail[0]->image  as $itemImg)
                        <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}}">
                            <img class="d-block w-100 " height="450px" 
                                src="{{ asset('assets/images/' . $itemImg->image) }}" alt="First slide">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <br>
            <br>

            <div class="row" id="tabs">
                <div class="col-lg-4">
                    <ul>
                        <li><a href='#tabs-1'><i class="fa fa-cog"></i> Vehicle Specs</a></li>
                        <li><a href='#tabs-2'><i class="fa fa-info-circle"></i> Vehicle Description</a></li>
                        <li><a href='#tabs-3'><i class="fa fa-plus-circle"></i> Vehicle Extras</a></li>
                        <li><a href='#tabs-4'><i class="fa fa-phone"></i> Contact Details</a></li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <section class='tabs-content' style="width: 100%;">
                        <article id='tabs-1'>
                            <h3>{{ $show_product_detail[0]->nameProduct }}</h3>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Type</label>

                                    <p>Xe máy</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Description</label>

                                    <p>{{ $show_product_detail[0]->description }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label> Model</label>

                                    <p>{{ $show_product_detail[0]->model }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Color</label>

                                    <p>{{ $show_product_detail[0]->color }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Mileage</label>

                                    <p>5000 km</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Fuel</label>

                                    <p>Diesel</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Engine size</label>

                                    <p>1800 cc</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Power</label>

                                    <p>85 hp</p>
                                </div>


                                <div class="col-sm-6">
                                    <label>Gearbox</label>

                                    <p>Manual</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Price</label>

                                    <p>{{ $show_product_detail[0]->price }}</p>
                                </div>
                            </div>
                        </article>
                        <article id='tabs-2'>
                            <h4>Vehicle Description</h4>

                            <p>- Colour coded bumpers <br> - Tinted glass <br> - Immobiliser <br> - Central locking -
                                remote <br> - Passenger airbag <br> - Electric windows <br> - Rear head rests <br> -
                                Radio <br> - CD player <br> - Ideal first car <br> - Warranty <br> - High level brake
                                light <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum.</p>
                        </article>
                        <article id='tabs-3'>
                            <h4>Vehicle Extras</h4>

                            <div class="row">
                                <div class="col-sm-6">
                                    <p>ABS</p>
                                </div>
                                <div class="col-sm-6">
                                    <p>Leather seats</p>
                                </div>
                                <div class="col-sm-6">
                                    <p>Power Assisted Steering</p>
                                </div>
                                <div class="col-sm-6">
                                    <p>Electric heated seats</p>
                                </div>
                                <div class="col-sm-6">
                                    <p>New HU and AU</p>
                                </div>
                                <div class="col-sm-6">
                                    <p>Xenon headlights</p>
                                </div>
                            </div>
                        </article>
                        <article id='tabs-4'>
                            <div style="">
                                <form action="{{ url('customer/create-calendar') }}" name="myForm" method="POST">
                                    @csrf
    
                                    <div class="form-group">
                                        <label style="color: black;">Họ và tên: </label>
                                        <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Nhập họ tên ...">
                                            <input name="id" type="text" value="{{$idCars}}" class="form-control" hidden
                                            aria-describedby="emailHelp" placeholder="Nhập họ tên ...">
                                    </div>
                                    <div class="form-group">
                                        <label style="color: black;">Số điện thoại:</label>
                                        <input name="phone" type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Nhập số điện thoại ...">
                                    </div>
                                    <div class="form-group">
                                        <label style="color: black;">Email:</label>
                                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Nhập email ...">
                                    </div>
                                    <div class="form-group">
                                        <label style="color: black;">Ngày sinh:</label>
                                        <input name="dob" type="date" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Nhập ngày sinh ...">
                                    </div>
                                    <div class="form-group">
                                        <label style="color: black;">Địa chỉ:</label>
                                        <input name="address" type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Nhập địa chỉ ...">
                                    </div>
                                    <div class="form-group">
                                        <label style="color: black;">Ngày đến:</label>
                                        <input name="calendar" type="datetime-local" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Chọn ngày...">
                                    </div>
                                    <button type="submit" id="submit" class="btn btn-primary">Đặt lịch</button>
                                </form>
                            </div>
                        </article>
                    </section>
                </div>
            </div>

            {{-- @endforeach --}}
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
    <script src="{{ asset('assets/js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('assets/js/mixitup.js') }}"></script>
    <script src="{{ asset('assets/js/accordions.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
