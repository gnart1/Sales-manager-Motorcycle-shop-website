<style>

    footer{
         position: relative;
         width: 100%;
         height: auto;
         padding: 50px 100px;
         background: #111;
         display: flex;
         justify-content: space-between;
         flex-wrap: wrap;
     }
    footer .container{
         display: flex;
         justify-content: space-between;
         flex-wrap: wrap;
         flex-direction: row;
     }
     footer .container .noi-dung{
         margin-right: 30px;
     }
    footer  .container .noi-dung.about{
         width:40%;
     }
     footer .container .noi-dung.about h2{
         position: relative;
         color: #fff;
         font-weight: 500;
         margin-bottom: 15px;
     }
     footer .container .noi-dung.about h2:before{
         content: '';
         position: absolute;
         bottom: -5px;
         left: 0;
         width: 50px;
         height: 2px;
         background: #f00;
     }
    footer .container .noi-dung.about p{
         color: #999;
     }
     /*Thiết Lập Cho Thành Phần Icon Mạng Xã Hội*/
     .social-icon{
         margin-top: 20px;
         display: flex;
     }
    .social-icon li {
         list-style: none;
     }
     .social-icon li a{
         display: inline-block;
         width: 40px;
         height: 40px;
         background: #222;
         display: flex;
         justify-content: center;
         align-items: center;
         margin-right: 10px;
         text-decoration: none;
         border-radius: 4px;
     }
    .social-icon li a:hover{
         background: #f00;
     }
    .social-icon li a .fa{
         color: #fff;
         font-size: 20px;
     }
    .links h2{
         position: relative;
         color: #fff;
         font-weight: 500;
         margin-bottom: 15px;
     }
     .contact h2{
         position: relative;
         color: #fff;
         font-weight: 500;
         margin-bottom: 15px;
     }
    .contact h2::before{
         content: '';
         position: absolute;
         bottom: -5px;
         left: 0;
         width: 50px;
         height: 2px;
         background: #f00;
     }
    .contact{
         width: calc(35% - 60px);
         margin-right: 0 !important;
     }
    .contact .info{
         position: relative;
     }
     .contact .info li{
         display: flex;
         margin-bottom: 16px;
     }
     .contact .info li span:nth-child(1) {
         color: #fff;
         font-size: 20px;
         margin-right: 10px;
     }
    .contact .info li span{
         color: #999;
     }
    .contact .info li a{
         color: #999;
         text-decoration: none;
     }
     @media  (max-width: 768px){
         footer{
             padding: 40px;
                  }
         footer .container{
             flex-direction: column;
         }
         footer .container .noi-dung{
             margin-right: 0;
             margin-bottom: 40px;
         }
         footer .container, .noi-dung.about, .links, .contact{
             width: 100%;
         }
     }
        </style>
         <footer>
            
         <div class="container">
            <!--Bắt Đầu Nội Dung Giới Thiệu-->
            <div class="noi-dung about">
                <h2>Về Chúng Tôi</h2>
                <p>Hiểu rõ xe máy là phương tiện đi lại quan trọng và chủ yếu tại Việt Nam, Honda Việt Nam luôn nỗ lực hết mình cung cấp cho khách hàng những sản phẩm xe máy có chất lượng cao nhất với giá cả hợp lý được sản xuất từ những nhà máy thân thiện với môi trường.</p>
                <ul class="social-icon">
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
            <!--Kết Thúc Nội Dung Giới Thiệu-->
            <!--Bắt Đầu Nội Dung Đường Dẫn-->
            <div class="noi-dung links">
                <h2>Đường Dẫn</h2>
                <ul>
                    <li><a href="{{ url('/') }}">Trang Chủ</a></li>
                    <li><a href="{{ url('/about') }}">Về Chúng Tôi</a></li>
                    <li><a href="{{ url('/cars') }}">Xe máy</a></li>
                    <li><a href="{{ url('/baoDuong') }}">Bảo dưỡng</a></li>
                    <li><a href="{{ url('/contact') }}">Thông Tin Liên Lạc</a></li>
                </ul>
            </div>
            <!--Kết Thúc Nội Dung Đường Dẫn-->
            <!--Bắt Đâu Nội Dung Liên Hệ-->
            <div class="noi-dung contact">
                <h2>Thông Tin Liên Hệ</h2>
                <ul class="info">
                    <li>
                        <span><i class="fa fa-map-marker"></i></span>
                        <span>
                            17 Tạ Quang Bửu<br /> Bách Khoa, Hai Bà Trưng, Hà Nội

                        </span>
                    </li>
                    <li>
                        <span><i class="fa fa-phone"></i></span>
                        <p><a href="#">+84 123 456 789</a>
                            <br />
                            <a href="#">+84 987 654 321</a></p>
                    </li>
                    <li>
                        <span><i class="fa fa-envelope"></i></span>
                        <p><a href="#">DailyHonda@gmail.com</a></p>
                   </li>
                    {{-- <li>
                        <form class="form">
                            <input type="email" class="form__field" placeholder="Đăng Ký Subscribe Email" />
                            <button type="button" class="btn btn--primary  uppercase">Gửi</button>
                        </form>
                    </li> --}}
                </ul>
            </div>
            <!--Kết Thúc Nội Dung Liên Hệ-->
        </div>
         </footer>