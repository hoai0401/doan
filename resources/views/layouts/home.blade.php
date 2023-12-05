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
</head>
<body>
    <!--------------------------------head------------------------------->
    <header>
        <div class="logo">
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
            <li><a href="{{ route('login') }}" class="ti-user"></a></li>
            <li><a href="" class="ti-shopping-cart"></a></li>
        </div>

    </header>

    <!--------------------------------slide------------------------------->
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
    <!--khung chứa sản phẩm-->
			<div class="khung-chua-san-pham">
                <!--Phần section 1-->
                <div class="section">
                    <!--Thanh tiêu đề-->
                    <p class="section-head">SẢN PHẨM NỔI BẬT</p>
                    <!--End Thanh tiêu đề-->
                    <!--Hộp 1-->
                    <div class="product-box">
                        <a class="box" href="thong-tin-sp.html">
                            <div class="hinh-sp">
                                <div style="background-image: url(image/xiaomi-redmi-note-6-pro-32gb-blue-600x600.jpg)" class="hinh"></div>
                            </div>
                            <p class="ten-sp">Iphone XS</p>
                            <p class="gia-tien">20.000.000đ<span class="gia-cu">5.000.000đ</span></p>
                            <div class="them-vao-gio-hang"><a class="them" href="#">Add <img class="icon-cart" src="image/icon-cart.png"></a></div>
                        </a>
                    </div>
                    <!--end Hộp 1-->
                    <!--Hộp 2-->
                    <div class="product-box">
                        <a class="box" href="thong-tin-sp.html">
                            <div class="hinh-sp">
                                <div style="background-image: url(image/huawei-nova-3e-2-400x400.jpg)" class="hinh"></div>
                            </div>
                            <p class="ten-sp">Xiaomi Redmi Note 6 Pro </p>
                            <p class="gia-tien">2.000.000<span style="font-size: 14px">đ</span><span class="gia-cu">5.000.000<span style="font-size: 14px">đ</span></span></p>
                            <div class="them-vao-gio-hang"><a class="them" href="#">Add <img class="icon-cart" src="image/icon-cart.png"></a></div>
                        </a>
                    </div>
                    <!--end Hộp 2-->
                    <!--Hộp 3-->
                    <div class="product-box">
                        <a class="box" href="thong-tin-sp.html">
                            <div class="hinh-sp">
                                <div style="background-image: url(image/huawei-nova-3i-den-chipu-1-400x400.jpg)" class="hinh"></div>
                            </div>
                            <p class="ten-sp">Iphone XS</p>
                            <p class="gia-tien">2.000.000<span style="font-size: 14px">đ</span><span class="gia-cu">5.000.000<span style="font-size: 14px">đ</span></span></p>
                            <div class="them-vao-gio-hang"><a class="them" href="#">Add <img class="icon-cart" src="image/icon-cart.png"></a></div>
                        </a>
                    </div>
                    <!--end Hộp 3-->
                    <!--Hộp 4-->
                    <div class="product-box">
                        <a class="box" href="thong-tin-sp.html">
                            <div class="hinh-sp">
                                <div style="background-image: url(image/huawei-p20-pro-2-600x600-600x600-400x400.jpg)" class="hinh"></div>
                            </div>
                            <p class="ten-sp">Iphone XS</p>
                            <p class="gia-tien">2.000.000<span style="font-size: 14px">đ</span><span class="gia-cu">5.000.000<span style="font-size: 14px">đ</span></span></p>
                            <div class="them-vao-gio-hang"><a class="them" href="#">Add <img class="icon-cart" src="image/icon-cart.png"></a></div>
                        </a>
                    </div>
                    <!--end Hộp 4-->
                    <!--Hộp 5-->
                    <div class="product-box">
                        <a class="box" href="thong-tin-sp.html">
                            <div class="hinh-sp">
                                <div style="background-image: url(image/xiaomi-redmi-note-6-pro-32gb-blue-600x600.jpg)" class="hinh"></div>
                            </div>
                            <p class="ten-sp">Iphone XS</p>
                            <p class="gia-tien">2.000.000<span style="font-size: 14px">đ</span><span class="gia-cu">5.000.000<span style="font-size: 14px">đ</span></span></p>
                            <div class="them-vao-gio-hang"><a class="them" href="#">Add <img class="icon-cart" src="image/icon-cart.png"></a></div>
                        </a>
                    </div>
                    <!--end Hộp 5-->
                    <!--Hộp 6-->
                    <div class="product-box">
                        <a class="box" href="thong-tin-sp.html">
                            <div class="hinh-sp">
                                <div style="background-image: url(image/huawei-nova-3-2-400x400.jpg)" class="hinh"></div>
                            </div>
                            <p class="ten-sp">Iphone XS</p>
                            <p class="gia-tien">2.000.000<span style="font-size: 14px">đ</span><span class="gia-cu">5.000.000<span style="font-size: 14px">đ</span></span></p>
                            <div class="them-vao-gio-hang"><a class="them" href="#">Add <img class="icon-cart" src="image/icon-cart.png"></a></div>
                        </a>
                    </div>
                    <!--end Hộp 6-->
                    <!--Hộp 7-->
                    <div class="product-box">
                        <a class="box" href="thong-tin-sp.html">
                            <div class="hinh-sp">
                                <div style="background-image: url(image/huawei-nova-3-2-400x400.jpg)" class="hinh"></div>
                            </div>
                            <p class="ten-sp">Iphone XS</p>
                            <p class="gia-tien">2.000.000<span style="font-size: 14px">đ</span><span class="gia-cu">5.000.000<span style="font-size: 14px">đ</span></span></p>
                            <div class="them-vao-gio-hang"><a class="them" href="#">Add <img class="icon-cart" src="image/icon-cart.png"></a></div>
                        </a>
                    </div>
                    <!--end Hộp 7-->
                    <!--Hộp 8-->
                    <div class="product-box">
                        <a class="box" href="thong-tin-sp.html">
                            <div class="hinh-sp">
                                <div style="background-image: url(image/huawei-nova-3-2-400x400.jpg)" class="hinh"></div>
                            </div>
                            <p class="ten-sp">Iphone XS</p>
                            <p class="gia-tien">2.000.000<span style="font-size: 14px">đ</span><span class="gia-cu">5.000.000<span style="font-size: 14px">đ</span></span></p>
                            <div class="them-vao-gio-hang"><a class="them" href="#">Add <img class="icon-cart" src="image/icon-cart.png"></a></div>
                        </a>
                    </div>
                    <!--end Hộp 8-->

                </div>
                <!--end section 1-->
                <!--Phần section 2-->
                <div class="section">
                    <!--Thanh tiêu đề-->
                    <p class="section-head">SẢN PHẨM MỚI</p>
                    <!--End Thanh tiêu đề-->
                    <!--Hộp 1-->
                    <div class="product-box" id="sp001">
                        <a class="box" href="thong-tin-sp.html">
                            <div class="hinh-sp">
                                <div style="background-image: url(image/xiaomi-redmi-note-6-pro-32gb-blue-600x600.jpg)" class="hinh"></div>
                            </div>
                            <p class="ten-sp">Iphone XS</p>
                            <p class="gia-tien">2.000.000<span style="font-size: 14px">đ</span><span class="gia-cu">5.000.000<span style="font-size: 14px">đ</span></span></p>
                            <div class="them-vao-gio-hang"><a class="them" href="#">Add <img class="icon-cart" src="image/icon-cart.png"></a></div>
                        </a>
                    </div>
                    <!--end Hộp 1-->
                    <!--Hộp 2-->
                    <div class="product-box" id="sp002">
                        <a class="box" href="thong-tin-sp.html">
                            <div class="hinh-sp">
                                <div style="background-image: url(image/dell-inspiron-5570-m5i5238w-office365-dai-dien-450x300-400x400.jpg)" class="hinh"></div>
                            </div>
                            <p class="ten-sp">Xiaomi Redmi Note 6 Pro </p>
                            <p class="gia-tien">2.000.000<span style="font-size: 14px">đ</span><span class="gia-cu">5.000.000<span style="font-size: 14px">đ</span></span></p>
                            <div class="them-vao-gio-hang"><a class="them" href="#">Add <img class="icon-cart" src="image/icon-cart.png"></a></div>
                        </a>
                    </div>
                    <!--end Hộp 2-->
                    <!--Hộp 3-->
                    <div class="product-box" id="sp003">
                        <a class="box" href="thong-tin-sp.html">
                            <div class="hinh-sp">
                                <div style="background-image: url(image/huawei-nova-3i-den-chipu-1-400x400.jpg)" class="hinh"></div>
                            </div>
                            <p class="ten-sp">Iphone XS</p>
                            <p class="gia-tien">2.000.000<span style="font-size: 14px">đ</span><span class="gia-cu">5.000.000<span style="font-size: 14px">đ</span></span></p>
                            <div class="them-vao-gio-hang"><a class="them" href="#">Add <img class="icon-cart" src="image/icon-cart.png"></a></div>
                        </a>
                    </div>
                    <!--end Hộp 3-->
                    <!--Hộp 4-->
                    <div class="product-box" id="sp004">
                        <a class="box" href="thong-tin-sp.html">
                            <div class="hinh-sp">
                                <div style="background-image: url(image/huawei-p20-pro-2-600x600-600x600-400x400.jpg)" class="hinh"></div>
                            </div>
                            <p class="ten-sp">Iphone XS</p>
                            <p class="gia-tien">2.000.000<span style="font-size: 14px">đ</span><span class="gia-cu">5.000.000<span style="font-size: 14px">đ</span></span></p>
                            <div class="them-vao-gio-hang"><a class="them" href="#">Add <img class="icon-cart" src="image/icon-cart.png"></a></div>
                        </a>
                    </div>
                    <!--end Hộp 4-->
                    <!--Hộp 5-->
                    <div class="product-box" id="sp005">
                        <a class="box" href="thong-tin-sp.html">
                            <div class="hinh-sp">
                                <div style="background-image: url(image/xiaomi-redmi-note-6-pro-32gb-blue-600x600.jpg)" class="hinh"></div>
                            </div>
                            <p class="ten-sp">Iphone XS</p>
                            <p class="gia-tien">2.000.000<span style="font-size: 14px">đ</span><span class="gia-cu">5.000.000<span style="font-size: 14px">đ</span></span></p>
                            <div class="them-vao-gio-hang"><a class="them" href="#">Add <img class="icon-cart" src="image/icon-cart.png"></a></div>
                        </a>
                    </div>
                    <!--end Hộp 5-->
                    <!--Hộp 6-->
                    <div class="product-box" id="sp006">
                        <a class="box" href="thong-tin-sp.html">
                            <div class="hinh-sp">
                                <div style="background-image: url(image/huawei-nova-3-2-400x400.jpg)" class="hinh"></div>
                            </div>
                            <p class="ten-sp">Iphone XS</p>
                            <p class="gia-tien">2.000.000<span style="font-size: 14px">đ</span><span class="gia-cu">5.000.000<span style="font-size: 14px">đ</span></span></p>
                            <div class="them-vao-gio-hang"><a class="them" href="#">Add <img class="icon-cart" src="image/icon-cart.png"></a></div>
                        </a>
                    </div>
                    <!--end Hộp 6-->
                    <!--Hộp 7-->
                    <div class="product-box" id="sp007">
                        <a class="box" href="thong-tin-sp.html">
                            <div class="hinh-sp">
                                <div style="background-image: url(image/huawei-nova-3-2-400x400.jpg)" class="hinh"></div>
                            </div>
                            <p class="ten-sp">Iphone XS</p>
                            <p class="gia-tien">2.000.000<span style="font-size: 14px">đ</span><span class="gia-cu">5.000.000<span style="font-size: 14px">đ</span></span></p>
                            <div class="them-vao-gio-hang"><a class="them" href="#">Add <img class="icon-cart" src="image/icon-cart.png"></a></div>
                        </a>
                    </div>
                    <!--end Hộp 7-->
                    <!--Hộp 8-->
                    <div class="product-box" id="sp008">
                        <a class="box" href="thong-tin-sp.html">
                            <div class="hinh-sp">
                                <div style="background-image: url(image/huawei-nova-3-2-400x400.jpg)" class="hinh"></div>
                            </div>
                            <p class="ten-sp">Iphone XS</p>
                            <p class="gia-tien">2.000.000<span style="font-size: 14px">đ</span><span class="gia-cu">5.000.000<span style="font-size: 14px">đ</span></span></p>
                            <div class="them-vao-gio-hang"><a class="them" href="#">Add <img class="icon-cart" src="image/icon-cart.png"></a></div>
                        </a>
                    </div>
                    <!--end Hộp 8-->

                </div>
                <!--end section 2-->
              </div>
                <!--end khung chứa sản phẩm-->

    <!--------------------------------contact------------------------------->

    <section class="contact-container">
        <p>Tải ứng dụng</p>
        <div class="app-google">
            <img src="{{ asset('img/ios-download2.png') }}" >
            <img src="{{ asset('img/google-download.png') }}" >
        </div>
        <p>Nhận bản tin</p>
        <input type="text" placeholder="Nhập email của bạn...">
    </section>

    <!--------------------------------foot------------------------------->
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

</script>
</html>
