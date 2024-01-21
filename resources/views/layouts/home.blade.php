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
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="{{ asset('js/js.js') }}" defer></script>

</head>
<body>
    <!--------------------------------head------------------------------->
    <header>

        <div class="logo">
        <a href="{{ url('/') }}">
        <svg viewBox="0 0 800 300">
            <symbol id="s-text">
                <text text-anchor="middle" x="50%" y="50%" dy=".35em">Shop HTT</text>
            </symbol>
            <use class="text" xlink:href="#s-text"></use>
            <use class="text" xlink:href="#s-text"></use>
            <use class="text" xlink:href="#s-text"></use>
            <use class="text" xlink:href="#s-text"></use>
        </svg>

    </a>
        </div>

        <div class="menu">
            <li><a href="">Áo</a>
                <ul class="sub-menu">
                    <li><a href="{{ route('User.show', ['id' => 1]) }}">Áo Polo</a></li>
                    <li><a href="{{ route('User.show', ['id' => 2]) }}">Áo Khoác</a></li>
                    <li><a href="{{ route('User.show', ['id' => 5]) }}">Áo Thun</a></li>
                </ul>
            </li>
            <li><a href="">QUẦN</a>
                <ul class="sub-menu">
                    <li><a href="{{ route('User.show', ['id' => 3]) }}">Quần Jean</a></li>
                    <li><a href="{{ route('User.show', ['id' => 4]) }}">Quần Tây</a></li>
                </ul>
            </li>
            <li><a  href="">BỘ SƯU TẬP</a>
                <ul class="sub-menu">
                    <li><a href="">Áo</a>
                        <ul>
                            <li><a href="{{ route('User.show', ['id' => 1]) }}">Áo Polo</a></li>
                            <li><a href="{{ route('User.show', ['id' => 2]) }}">Áo Khoác</a></li>
                            <li><a href="{{ route('User.show', ['id' => 5]) }}">Áo Thun</a></li>
                        </ul>
                    </li>

                    <li><a href="">Quần</a>
                        <ul>
                            <li><a href="{{ route('User.show', ['id' => 3]) }}">Quần Jean</a></li>
                            <li><a href="{{ route('User.show', ['id' => 4]) }}">Quần Tây</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            @auth
            @if(Auth::user()->is_admin)
                <li><a href="{{ route('dashboard') }}">Admin</a></li>
            @endif
            @endauth
        </div>
        <div class="others">
            <li><form action="{{ route('products.search') }}" method="GET">
                <input type="text" name="search" placeholder="Tìm kiếm...">
                <button class="timkiem" type="submit">Tìm kiếm</button>
            </form>
        </li>
            <li><a href="@auth {{ route('cart.index') }} @else {{ route('login') }} @endauth" class="ti-shopping-cart"></a>
            </li>
        </div>
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
                                    <a href="{{route('user.orders.index') }} ">Đơn Hàng</a>
                                    <a href="{{route('index.fa')}}">Danh Sách Yêu Thích</a>
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

    <!--------------------------------slide------------------------------->
    <section id="slider">
        <div class="slider-container">
            @foreach ( $slideshows as $slideshow )
                <img src="{{ $slideshow->image }}" alt="slide"> 
            @endforeach
        </div>
         <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
        </div>
    </section>
<br>
    <div id="myTable" class="khung-chua-san-pham">
        <!-- Phần sản phẩm nổi bật -->
        <div class="section">
        <p class="section-head">SẢN PHẨM NỔI BẬT</p>
        @foreach ($lst as $product)
            <div class="product-box">
                <!-- Hiển thị thông tin sản phẩm -->
                <a class="box" href="{{ route('products.show', ['product' => $product])}}">
                    <div class="hinh-sp">
                        <img src="{{ $product->image }}" class="hinh" alt="{{ $product->name }}">
                    </div>
                    <p class="ten-sp">{{ $product->name }}</p>
                    <p class="gia-tien">{{ number_format($product->price) }} <span style="font-size: 14px">đ</span></p>           
                    <script>
                        function redirectToLogin() {
                            window.location.href = "{{ route('login') }}";
                        }
                    </script>
                </a>
            </div>
        @endforeach

        <!-- Hiển thị nút chuyển trang -->
        </div>
        <div class="custom-pagination" style="margin-top: 20px;">
                @if ($lst->currentPage() > 1)
                    <a href="{{ $lst->previousPageUrl() }}">Previous</a>
                @endif

                @for ($i = 1; $i <= $lst->lastPage(); $i++)
                    <a href="{{ $lst->url($i) }}" class="{{ ($i == $lst->currentPage()) ? 'active' : '' }}">{{ $i }}</a>
                @endfor

                @if ($lst->currentPage() < $lst->lastPage())
                    <a href="{{ $lst->nextPageUrl() }}">Next</a>
                @endif
            </div>
</div>

<br>


<section class="contact-container">
    <p>Tải ứng dụng</p>
    <div class="app-google">
        <img src="{{ asset('img/ios-download2.png') }}">
        <img src="{{ asset('img/google-download.png') }}">
    </div>
    <p>Nhận bản tin</p>
    <input type="text" id="emailInput" placeholder="Nhập email của bạn..." onkeypress="handleKeyPress(event)">
    <div id="confirmationMessage" style="display: none;">Cảm ơn bạn đã đăng ký!</div>
</section>

<script>
    function handleKeyPress(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            showConfirmationMessage();
        }
    }

    function showConfirmationMessage() {
        var emailInput = document.getElementById("emailInput");
        var confirmationMessage = document.getElementById("confirmationMessage");

        // Check if the email input is not empty
        if (emailInput.value.trim() !== "") {
            // Hide the email input
            emailInput.style.display = "none";

            // Show the confirmation message
            confirmationMessage.style.display = "block";
        }
    }
</script>


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
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



    document.addEventListener('DOMContentLoaded', function () {
        const favoriteButtons = document.querySelectorAll('.favorite-btn');

        favoriteButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                const productId = button.getAttribute('data-product-id');
                toggleFavorite(productId);
            });
        });

        function toggleFavorite(productId) {
            // Gửi yêu cầu Ajax để thêm hoặc xóa sản phẩm yêu thích
            // Sử dụng productId để xác định sản phẩm cụ thể

            // Ở đây có thể sử dụng axios hoặc fetch để gửi yêu cầu Ajax
            // Ví dụ sử dụng axios:
            axios.post('/toggle-favorite', { productId: productId })
                .then(function (response) {
                    // Xử lý kết quả từ server, ví dụ cập nhật giao diện
                    const isFavorite = response.data.isFavorite;

                    if (isFavorite) {
                        // Nếu là sản phẩm yêu thích, thay đổi kiểu dáng nút
                        button.classList.add('favorited');
                    } else {
                        // Nếu không phải là sản phẩm yêu thích, xóa kiểu dáng nút
                        button.classList.remove('favorited');
                    }
                })
                .catch(function (error) {
                    console.error('Error toggling favorite', error);
                });
        }
    });
</script>
</html>
