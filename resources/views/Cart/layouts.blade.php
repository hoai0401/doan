<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Quần Áo</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css' )}}">
    <link rel="stylesheet" href="{{ asset('css/product-box.css' )}}">
    <link rel="stylesheet" href="{{ asset('css/section.css' )}}">
    <link rel="stylesheet" href="{{ asset('fonts/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/logo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-bJBEYRxpqUdZLJfYNt2yrTjJcMOh9vwlGgfcq2/oRPa7Rm81RcB2RQCIhU2f6a8a" crossorigin="anonymous">

</head>
<body>
    <!--------------------------------head------------------------------->
    <header>

        <div class="logo">
            <svg viewBox="0 0 800 300">
            <symbol id="s-text">
                <text text-anchor="middle" x="50%" y="50%"
                dy=".35em">Shop HTT</text>
            </symbol>
            <use class="text" xlink:href="#s-text"></use>
            <use class="text" xlink:href="#s-text"></use>
            <use class="text" xlink:href="#s-text"></use>
            <use class="text" xlink:href="#s-text"></use>
            </svg>
            <img src="{{ asset('img/logo-4.png') }}" alt="">
        </div>

        <div class="menu">
            <li><a href="">NỮ</a>
                <ul class="sub-menu">
                    <li><a href="">Hàng mới về</a></li>
                    <li><a href="">Áo</a>
                        <ul>
                            <li><a href="">Áo thun</a></li>
                            <li><a href="">Áo sơ mi</a></li>
                            <li><a href="">Áo khoác</a></li>
                        </ul>
                    </li>

                    <li><a href="">Quần</a>
                        <ul>
                            <li><a href="">Quần jeans</a></li>
                            <li><a href="">Quần dài</a></li>
                            <li><a href="">Quần lửng/short</a></li>
                        </ul>
                    </li>

                </ul>
            </li>

            <li><a href="">NAM</a>
                <ul class="sub-menu">
                    <li><a href="">Hàng mới về</a></li>
                    <li><a href="">Áo</a>
                        <ul>
                            <li><a href="">Áo thun</a></li>
                            <li><a href="">Áo sơ mi</a></li>
                            <li><a href="">Áo khoác</a></li>
                        </ul>
                    </li>

                    <li><a href="">Quần</a>
                        <ul>
                            <li><a href="">Quần jeans</a></li>
                            <li><a href="">Quần dài</a></li>
                            <li><a href="">Quần lửng/short</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a style="color: red;" href="">SALE</a>
                <ul class="sub-menu">
                    <li><a href="">Áo dạ lông</a></li>
                    <li><a href="">Nữ</a>
                        <ul>
                            <li><a href="">Sale 30%</a></li>
                            <li><a href="">Sale 50%</a></li>
                            <li><a style="color: red;" href="">Mua nhiều giảm sâu từ 199k</a></li>
                        </ul>
                    </li>

                    <li><a href="">Nam</a>
                        <ul>
                            <li><a href="">Sale 50%</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="">BỘ SƯU TẬP</a></li>
            <li><a href="">LIFESTYLE</a></li>
            <li><a href="">THÔNG TIN</a></li>
        </div>
            <div class="others">
            <li><input placeholder="&ensp; Tìm kiếm..." type="text"></li>
                    <li><a href="" class="ti-headphone"></a></li>
                    <li><a href="" class="ti-shopping-cart"></a></li>
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        @guest
                            <li><a href="{{ route('login') }}" class="ti-user">Đăng nhập</a></li>
                        @endguest
                        <!-- Hiển thị tên người dùng và biểu mẫu đăng xuất khi đã đăng nhập -->
                        @auth
                            <div class="user-dropdown">
                                <div class="user-info">
                                    <a class="nav-item" id="user-name">{{ Auth::user()->name }}</a>
                                </div>
                                <div class="dropdown-content">
                                    <a href="{{ route('users.index') }}">Thông tin tài khoản</a>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng Xuất</a>
                                </div>
                            </div>
                        @endauth
                    </div>

                    <!-- Thêm form đăng xuất -->
                    <form id="logout-form" method="post" action="{{ route('logout') }}" style="display: none;">
                        @csrf
                    </form>

    </div>

    </header>
    <section id="slider">
        <div class="slider-container">
            <img src="{{ asset('img/slide1.jpg') }}" alt="">
            <img src="{{ asset('img/slide2.jpg') }}" alt="">
        </div>
        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
        </div>
    </section>
<br>
<div class="khung-chua-san-pham">
                <!--Phần section 1-->
                <div class="section">
                    <!--Thanh tiêu đề-->
                    <p class="section-head">Thông tin giỏ hàng</p>
    @section('header')
    @show
    @yield('content')
    <br>
     <footer>
        <div class="footer-top">
            <li><a href=""></a>Liên hệ</li>
            <li><a href=""></a>Tuyển dụng</li>
            <li><a href=""></a>Giới thiệu</li>
            <li>
                <a href="" class="ti-facebook"></a>
                <a href="" class="ti-twitter"></a>
                <a href="" class="ti-youtube"></a>
            </li>
        </div>

        <div class="footer-bottom">
            ©Makima All rights reverved
        </div>
    </footer>
    </body>

<script>
    const imgPosition = document.querySelectorAll(".slider-container img")
    const imgContainer = document.querySelector(".slider-container")
    const dotItem = document.querySelectorAll(".dot")
    let imgSlider = imgPosition.length
    let index = 0
    // console.log(imgPosition)
    imgPosition.forEach(function(image, index){
        image.style.left = index*100 + "%"
        dotItem[index].addEventListener("click", function(){
            slider(index)
        })
    })
    function imgSlide(){
        index++;
        if(index >= imgSlider){
            index = 0
        }
        slider(index)

    }

    function slider(index){
        imgContainer.style.left = "-" +index*100+ "%"
        const dotActive = document.querySelector(".active")
        dotActive.classList.remove("active")
        dotItem[index].classList.add("active")
    }

    setInterval(imgSlide, 5000)
    document.querySelector('.user-panel').addEventListener('mouseover', function () {
        // Show the dropdown content
        document.querySelector('.dropdown-content').style.display = 'block';
    });

    document.querySelector('.user-panel').addEventListener('mouseout', function () {
        // Hide the dropdown content
        document.querySelector('.dropdown-content').style.display = 'none';
    });

</script>
</html>
