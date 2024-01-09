<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm - Shop Quần Áo</title>
    <!-- Thêm các đường dẫn đến các file CSS hoặc thư viện khác nếu cần -->
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
        <img src="{{ asset('img/logo-4.png') }}" alt="">
    </a>
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
            <li><form action="{{ route('products.search') }}" method="GET">
                <input type="text" name="search" placeholder="Tìm kiếm...">
                <button type="submit">Tìm kiếm</button>
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
<div id="myTable" class="khung-chua-san-pham">
    <main>
        <h2>Kết quả tìm kiếm cho "{{ $searchTerm }}"</h2>

        @if(count($products) > 0)
            <div class="product-list">
                @foreach($products as $product)
                    <div class="product-box">
                        <a class="box" href="{{ route('products.show', ['product' => $product]) }}">
                            <div class="hinh-sp">
                                <img src="{{ $product->image }}" class="hinh" alt="{{ $product->name }}">
                            </div>
                            <p class="ten-sp">{{ $product->name }}</p>
                            <p class="gia-tien">{{ number_format($product->price) }} <span style="font-size: 14px">đ</span></p>

                            <div class="them-vao-gio-hang">
                                @auth
                                    <a class="them" href="{{ route('cart.add', ['id' => $product->id]) }}">Add <img class="icon-cart" src="{{ asset('img/icon-cart.png') }}"></a>
                                @else
                                    <a class="them" href="#" onclick="redirectToLogin()">Add <img class="icon-cart" src="{{ asset('img/icon-cart.png') }}"></a>
                                @endauth
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p>Không có kết quả tìm kiếm.</p>
        @endif
    </main>

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
    <br>


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

</html>
