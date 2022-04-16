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
                            <li><a href="{{ url('/') }}">Trang chủ</a></li>
                            <li><a href="{{ url('/cars') }}">Xe máy</a></li>
                            <li><a href="{{ url('/baoDuong') }}" class="active">Bảo dưỡng</a></li>
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

    <section class="section section-bg" id="call-to-action"
        style="background-image: url(assets/images/banner-honda.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>

                        <h2
                            style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
                            Hãy đến với đại lý <em>HonDa</em></h2>
                        <p>Chúng tôi sẽ bảo dưỡng chiếc xe của bạn như lúc mới mua</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="rowr">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Đặt lịch <em> bảo dưỡng</em></h2>
                        <img src="assets/images/line-dec.png" alt="waves">

                    </div>
                </div>

                <div class="col-lg-6 " style="margin: auto">
                    <form action="{{ url('/create-calendar') }}" name="myForm" method="POST">
                        @csrf

                        <div class="form-group">
                            <label style="color: black;">Họ và tên: </label>
                            <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Nhập họ tên ...">
                            {{-- <input name="id" type="text" value="{{ $idCars }}" class="form-control"
                              hidden aria-describedby="emailHelp" placeholder="Nhập họ tên ..."> --}}
                            <input name="type" type="text" value="1" class="form-control" hidden
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
                            <input name="calendar" type="datetime-local" class="form-control" id="dateTime"
                                aria-describedby="emailHelp" placeholder="Chọn ngày...">
                        </div>
                        <div style="width: 100%" class="text-center">
                            <button type="submit" id="submit" class="btn btn-primary">Đặt lịch</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Item End ***** -->

    <!-- ***** Contact Us Area Starts ***** -->
    {{-- <section class="section" id="contact-us" style="margin-top: 0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div id="map">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7194101709774!2d105.84541831476287!3d21.003881786011878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad0e7f459a33%3A0x2c115281ebff6f10!2zSOG7jWMgdmnhu4duIEPDtG5nIG5naOG7hyBCS0FDQUQ!5e0!3m2!1svi!2s!4v1645269774024!5m2!1svi!2s" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="contact-form section-bg" style="background-image: url(assets/images/contact-1-720x480.jpg)">
                        <form id="contact" action="" method="post">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Họ tên*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="phone" type="number" id="phone" pattern="[^ @]*@[^ @]*" placeholder="Số điện thoại*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="xe" type="text" id="xe" placeholder="Xe muốn mua*">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Send Message</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ***** Contact Us Area Ends ***** -->

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
    <script>
        const monthNames = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];
        const dayOfWeekNames = [
            'Chủ nhật', 'Thứ hai', 'Thứ ba',
            'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy',
        ];

        const formatDate = (date, patternStr) => {
            if (!patternStr) {
                patternStr = 'M/d/yyyy';
            }

            const day = date.getDate();
            const month = date.getMonth();
            const year = date.getFullYear();
            const hour = date.getHours();
            const minute = date.getMinutes();
            const second = date.getSeconds();
            const miliseconds = date.getMilliseconds();
            const h = hour % 12;
            const hh = twoDigitPad(h);
            const HH = twoDigitPad(hour);
            const mm = twoDigitPad(minute);
            const ss = twoDigitPad(second);
            const aaa = hour < 12 ? 'AM' : 'PM';
            const EEEE = dayOfWeekNames[date.getDay()];
            const EEE = EEEE.substr(0, 3);
            const dd = twoDigitPad(day);
            const M = month + 1;
            const MM = twoDigitPad(M);
            const MMMM = monthNames[month];
            const MMM = MMMM.substr(0, 3);
            const yyyy = year + '';
            const yy = yyyy.substr(2, 2);
            if (patternStr === 'customer') {
                return `ngày ${day} tháng ${month + 1} năm ${year}`;
            }
            // checks to see if month name will be used
            patternStr = patternStr
                .replace('hh', hh).replace('h', h)
                .replace('HH', HH).replace('H', hour)
                .replace('mm', mm).replace('m', minute)
                .replace('ss', ss).replace('s', second)
                .replace('S', miliseconds)
                .replace('dd', dd).replace('d', day)

                .replace('EEEE', EEEE).replace('EEE', EEE)
                .replace('yyyy', yyyy)
                .replace('yy', yy)
                .replace('aaa', aaa);
            if (patternStr.indexOf('MMM') > -1) {
                patternStr = patternStr
                    .replace('MMMM', MMMM)
                    .replace('MMM', MMM);
            } else {
                patternStr = patternStr
                    .replace('MM', MM)
                    .replace('M', M);
            }
            return patternStr;
        };

        const twoDigitPad = (num) => {
            return num < 10 ? '0' + num : num;
        };

        
        var dateTime = document.getElementById("dateTime").value;
        var now = new Date();
        var today = formatDate(now,'yyyy-MM-ddThh:mm');
        console.log(today);
        document.getElementById("dateTime").setAttribute('min', today);

        
    </script>
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
