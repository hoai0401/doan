<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/product_show.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body>

    <div class="product-details">
        <div class="hinh-sp">
            <img src="{{ $product->image }}" class="hinh" alt="{{ $product->name }}">
        </div>
        <h1>{{ $product->name }}</h1>
        <h2 class="Gia"> {{ number_format($product->price) }}đ</h2>
        <h2>Mô tả sản phẩm:</h2>
        <p>{{ $product->description }}</p>


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
