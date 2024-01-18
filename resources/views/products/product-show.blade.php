<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/product_show.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        .image-container {
            position: relative;
            width: 100%;
            max-width: 600px; /* Điều chỉnh kích thước container theo mong muốn */
            margin: 0 auto;
        }

        .hinh {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .thumbnails {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .thumbnail {
            width: 50px;
            height: 50px;
            margin: 0 5px;
            cursor: pointer;
        }

        .dots {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            display: flex;
            align-items: center;
            max-width: 100%; /* Thêm thuộc tính max-width để giữ ảnh nhỏ có thể xếp chồng */
        }
    </style>
</head>
<body>
    <div class="product-details">
        
        <div class="image-container" id="imageContainer">
            <img src="{{ $product->image }}" class="hinh" alt="{{ $product->name }}">
            @foreach($images as $index => $image)
                <img src="{{ asset('storage/' . $image->image_url) }}" class="hinh" alt="{{ $product->name }}" style="display: none;">
            @endforeach
            <div class="thumbnails" id="thumbnailsContainer"></div>
        </div>
        
        <h1>{{ $product->name }}</h1>
        <h2 class="Gia"> {{ number_format($product->price) }}đ</h2>
        <h2>Mô tả sản phẩm:</h2>
        <p>{{ $product->description }}</p>

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
        

        <?php
        $sizeid=1;
        $colorid=2
        ?>
            <div class="color-options">
                <label for="color">Màu sắc:</label>
                <select id="color" name="color">
                    <?php foreach ($colors as $color): ?>
                        <option value="<?= $color->id ?>">
                            <?= $color->name ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="size-options">
                <label for="size">Kích thước:</label>
                <select id="size" name="size">
                    <?php foreach ($sizes as $size): ?>
                        <option value="<?= $size->id ?>">
                            <?= $size->name ?>
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
        
        <!-- Quantity and Add to Cart form -->

        <!-- Add to cart form -->
        {{-- <form action="{{ route('cart/add', ['productid' => $product->id, 'sizeid' => $sizeid, 'colorid' => $colorid]) }}" method="get"> --}}
        {{-- <form action="{{ route('cart/add', ['productid' => $product->id, 'sizeid' => $sizeid, 'colorid' => $colorid]) }}" method="GET">
            @csrf
            <button type="submit" name="action" value="buynow">Mua ngay</button>
        </form> --}}
        <form action="{{ route('cartadd', ['productid' => $product->id, 'sizeid' => $sizeid, 'colorid' => $colorid]) }}" method="get">
            @csrf
            <button type="submit" name="action" value="buynow">Thêm giỏ hàng</button>
        </form>
    
     <!-- Comment section -->
     <div class="comment-section">
            <h2>Bình luận:</h2>

            <!-- Form comment mới -->
            @if(Auth::check())
                
                <form action="{{ route('comment.store', ['id' => $product->id]) }}" method="post">
                    @csrf
                    <textarea name="content" placeholder="Thêm bình luận"></textarea>
                    <button type="submit">Đăng Bài</button>
                </form>
            @else
                    
            @endif
           
           

            <li><a href="{{ route('comments.show', ['id' => $product->id]) }}">Danh sách comment</a></li>
     </div>
     
    
</div>
</body>

</html>
