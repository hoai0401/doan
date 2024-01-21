<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product-detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/logo.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
    <li><a href="">LIFESTYLE</a></li>
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
<br>

    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4">
            <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>

            <div class="card">
                <div class="container-fliud">
                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                    <div class="tab-pane active" id="pic-3">
                                    <img src="{{ $product->image }}" class="hinh" alt="{{ $product->name }}">
                                    </div>
                                </div>
                                <ul class="preview-thumbnail nav nav-tabs">
                                
                                <div class="tab-pane active" id="pic-3">
                                    <div class="image-container" id="imageContainer">
                                        @foreach($images as $index => $image)
                                            <img src="{{ asset('storage/' . $image->image_url) }}" class="hinh" alt="{{ $product->name }}" style="display: none;">
                                        @endforeach
                                        <div class="thumbnails" id="thumbnailsContainer"></div>
                                    </div>   
                                </div>  
                                                      
                                </ul>
                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title">{{ $product->name }}</h3>
                                <p class="product-description">{!! nl2br(e($product->description)) !!}</p>
                                <h4 class="price">Giá hiện tại: <span>{{ number_format($product->price) }}đ</span></h4>
                                <?php
                                $sizeid=1;
                                $colorid=2
                                ?>
                                <h5 class="sizes">sizes:
                                <select id="size" name="size">
                                    <?php foreach ($sizes as $size): ?>
                                        <option value="<?= $size->id ?>">
                                            <?= $size->name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                </h5>
                               
                                <div class="color-options">
                                    <label for="color">
                                        <h5>
                                            Màu sắc:
                                        </h5>
                                    </label>
                                    <select id="color" name="color">
                                        <?php foreach ($colors as $color): ?>
                                            <option value="<?= $color->id ?>">
                                                <?= $color->name ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                
                                <input type="hidden" id="colorid" name="colorid" value="<?= $colorid ?>">
                                    <input type="hidden" id="sizeid" name="sizeid" value="<?= $sizeid ?>">
                                    
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            var colorDropdown = document.getElementById('color');
                                            var sizeDropdown = document.getElementById('size');
                                    
                                            var coloridInput = document.getElementById('colorid');
                                            var sizeidInput = document.getElementById('sizeid');
                                    
                                            colorDropdown.addEventListener('change', function () {
                                                coloridInput.value = colorDropdown.value;
                                            });
                                    
                                            sizeDropdown.addEventListener('change', function () {
                                                sizeidInput.value = sizeDropdown.value;
                                            });
                                        });
                                    </script>
                                
                                <div class="action">
                                <form action="{{ route('cartadd', ['productid' => $product->id, 'sizeid' => $sizeid, 'colorid' => $colorid]) }}" method="get">
                                    @csrf
                                    <button type="submit" name="action" value="buynow">Thêm giỏ hàng</button>
                                </form>
                                <form action="{{ route('favor.add', $product->id) }}" method="post">
                                    @csrf
                                    <button type="submit">Thêm vào yêu thích</button>
                                </form>
                                </div>
                                <div class="comment-section">
                                <h2>Bình luận:</h2>

                                <!-- Form comment mới -->
                                @if(Auth::check())
                                    
                                    <form action="{{ route('comment.store', ['id' => $product->id]) }}" method="post">
                                        @csrf
                                        <textarea name="content" placeholder="Thêm bình luận"></textarea><br>
                                    <button>đăng</button>
                                    </form>
                                @else
                                        
                                @endif
                                <li><a href="{{ route('comments.show', ['id' => $product->id]) }}">Danh sách comment</a></li>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
            
        </div>
        <!-- End block content -->
        <script>
            $(document).ready(function () {
                var currentIndex = 0;
                var images = $('.hinh');
                var thumbnailsContainer = $('#thumbnailsContainer');

                // Ẩn nút chuyển ảnh khi chỉ có một ảnh
                if (images.length <= 1) {
                    thumbnailsContainer.hide();
                }

                // Tạo ảnh nhỏ tương ứng với số lượng ảnh
                for (var i = 0; i < images.length; i++) {
                    var thumbnail = $('<img class="thumbnail">');
                    thumbnail.attr('src', images.eq(i).attr('src'));
                    thumbnail.attr('alt', images.eq(i).attr('alt'));
                    thumbnailsContainer.append(thumbnail);

                    // Xử lý sự kiện khi ảnh nhỏ được nhấn
                    thumbnail.on('click', function () {
                        currentIndex = $(this).index();
                        showImage(currentIndex);
                    });
                }
                
                // Hiển thị ảnh đầu tiên và làm cho ảnh nhỏ tương ứng trở thành active
                showImage(currentIndex);
                
                // Hàm hiển thị ảnh và ảnh nhỏ tương ứng
                function showImage(index) {
                    images.hide();
                    images.eq(index).show();
                    $('.thumbnail').removeClass('active');
                    $('.thumbnail').eq(index).addClass('active');
                }
            });
        </script>
    </main>

    
    
</body>

</html>