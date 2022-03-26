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
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('material') }}/img/favicon.png">
    <title>Cars</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<style>
    .w-5 {
        display: none;
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
                            <li><a href="{{ url('/baoDuong') }}">Bảo dưỡng</a></li>
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
        style="background-image: url(assets/images/banner-honda.jpg)">
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
            <br>
            <br>
            <div class="contact-form">
                <form action="#" id="contact">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Used/New:</label>

                                <select>
                                    <option value="">All</option>
                                    <option value="new">New vehicle</option>
                                    <option value="used">Used vehicle</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Type:</label>
                                <form>
                                    @csrf
                                <select  name="type" id="type">
                                    <option value="{{Request::url()}}?type=none">--Loại --</option>
                                    <option value="{{Request::url()}}?type=ga">Xe tay ga</option>
                                    <option value="{{Request::url()}}?type=so">Xe số</option>
                                    <option value="{{Request::url()}}?type=con">Xe côn</option>
                                </select>
                            </form>
                            </div>
                        </div>

                     
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Model:</label>
                                <form>
                                    @csrf

                                    <select name="sort" id="sort">
                                        {{-- @foreach ($show_product as $item) --}}
                                        <option value="{{Request::url()}}?sort_by=none">---Model---</option>
                                        <option value="{{Request::url()}}?sort_by=CBR">CBR</option>
                                        <option value="{{Request::url()}}?sort_by=SH">SH</option>
                                        <option value="{{Request::url()}}?sort_by=Rebel">Rebel</option>
                                        <option value="{{Request::url()}}?sort_by=MSX">MSX</option>
                                        <option value="{{Request::url()}}?sort_by=Ware">Ware</option>
                                        <option value="{{Request::url()}}?sort_by=Vision">Vision</option>
                                        <option value="{{Request::url()}}?sort_by=Future">Future</option>
                                        <option value="{{Request::url()}}?sort_by=ABLADE">ABLADE</option>
                                        <option value="{{Request::url()}}?sort_by=Winner">Winner</option>
                                        <option value="{{Request::url()}}?sort_by=PCX">PCX</option>
                                    
                                        {{-- @endforeach --}}
                                    </select>
                                </form>
                            </div>
                        </div>
                        
                        <div >
                            <div >
                                <label>Price:</label>
                                 <div id="slider-range"></div>
                                
                                    <input type="text" id="amount" readonly style="border:0; color:#050505; font-weight:bold;">
                                    <input type="hidden" name="start_price" id="start_price" >
                                    <input type="hidden" name="end_price" id="end_price" >                                    
                            </div>
                            <input style="width: 100px" type="submit" name="filter_price" value="Lọc giá" class="btn btn-sm btn-default"  >
                        </div>

                        {{-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Mileage:</label>

                                <select>
                                    <option value="">-- All --</option>
                                    <option value="">-- All --</option>
                                    <option value="">-- All --</option>
                                    <option value="">-- All --</option>
                                </select>
                            </div>
                        </div>--}}

                        {{-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Engine size:</label>

                                <select>
                                    <option value="">-- All --</option>
                                    <option value="">-- All --</option>
                                    <option value="">-- All --</option>
                                    <option value="">-- All --</option>
                                </select>
                            </div>
                        </div>  --}}

                        {{--<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">  
                                 <p>
                                    <label for="amount">Target sales goal (Millions):</label>
                                    <input type="text" id="amount" readonly style="border:0; color:#050505; font-weight:bold;">
                                  </p>
                                   
                                  <div id="slider-range"></div> 
                        </div>--}}


                    </div>

                    {{-- <div class="col-sm-4 offset-sm-4">
                        <div class="main-button text-center">
                            <a href="#">Search</a>
                        </div>
                    </div>  --}}
                    

                    <br>
                    <br>
                </form>
            </div>
                <div class="row">
                    @foreach ($show_product as $row)
                    <div class="col-lg-4">
                        <div class="trainer-item">
                            <div class="image-thumb" style="width:320px;height:225px; overflow: hidden;">
                                
                                @forelse ($row->image  as $itemImg)
                                    <Img src="{{ asset('/assets/images/' . $itemImg->image) }}" width="100px" />
                                @empty
                                @endforelse
                            </div>
                            <div class="down-content">
                                <span>
                                    {{-- <del>20.000.000đ </del> --}} &nbsp; {{ number_format($row->price) }}<sup> vnd</sup>
                                </span>

                                <h4>{{ $row->nameProduct }}</h4>

                                <p>
                                    <i class="fa fa-dashboard"></i> 130 000km &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-cube"></i>Model: {{ $row->model }} &nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-cog"></i>SL: 
                                    @if($row->quantity < 1)
                                   <del style="color: red">Hết hàng </del>   
                                    
                                    @else
                                    {{ $row->quantity }} &nbsp;&nbsp;&nbsp;

                                    @endif
                                </p>

                                <ul class="social-icons">
                                    <li><a href="{{ url('/car-details/' . $row->id) }}">+ View Car</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                
                @endforeach
            </div>

                
                    {{-- <ul class="pagination pagination-lg justify-content-center">
                {{-- <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li> --}}
                {{-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
                
                {{-- <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li> 
              </ul> --}}
            </div>
            <nav>
              <div class="pagination pagination-lg justify-content-center" style="text-align: center">
                {!! $show_product->links() !!}
            </div>
                </nav>
        

        
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
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
           $('#sort').on('change', function(){
             var url = $(this).val();
             //window.alert(url);
            if(url){
                window.location = url;
            }
            return false;

           });

           $('#type').on('change', function(){
             var url = $(this).val();
             //window.alert(url);
            if(url){
                window.location = url;
            }
            return false;

           });
         });
     
      </script>
      <script type="text/javascript">
        $(document).ready(function(){
            
           $( "#slider-range" ).slider({
      orientation: "horizon",
      range: true,
        min:{{$min_price_range}},
        max:{{$max_price_range}},
      step: 1000000,
      values: [  {{$min_price}}, {{$max_price}} ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "đ" + ui.values[ 0 ] + " - đ" + ui.values[ 1 ] );
        $( "#start_price" ).val( ui.values[ 0 ]);
        $( "#end_price" ).val(ui.values[ 1 ]);
      }
    });
    $( "#amount" ).val( "đ" + $( "#slider-range" ).slider( "values", 0 ) +
      " - đ" + $( "#slider-range" ).slider( "values", 1 ) );
         });
     
      </script>
    

      
</body>

</html>
