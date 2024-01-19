@extends('Cart.layouts')

@section('content')
<link rel="stylesheet" href="{{ asset('user_css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/product_show.css') }}">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<div>
    <table class="table">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Hình ảnh</th>
            </tr>
        </thead>
        <tbody>
            @php
            $totalAmount = 0;
            @endphp
            @if ($carts)
            @foreach($carts as $cart)
            <tr>
                <td>{{$cart->name}}</td>
                <td>{{ $cart->price }}</td>
                <td>
                    <button class="quantity-btn decrease" data-product-id="{{$cart->id}}">-</button>
                    <span class="quantity" data-product-id="{{$cart->id}}">{{$cart->quantity}}</span>
                    <button class="quantity-btn increase" data-product-id="{{$cart->id}}">+</button>
                </td>
                <td><img src="storage/{{$cart->image_url}}" alt="Image 1" style="max-width: 100px; max-height: 100px;"></td>
            </tr>
            @php
            $totalAmount+=$cart->price*$cart->quantity;
            @endphp
            @endforeach
            @endif
        </tbody>
    </table>
    <div>
        <h3 id="totalAmount">Tổng tiền: {{$totalAmount}}</h3>
    </div>
    <a href="{{route('checkout')}}">
        Check Out
    </a>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quantityButtons = document.querySelectorAll('.quantity-btn');

        quantityButtons.forEach(button => {
            button.addEventListener('click', function () {
                const productId = this.getAttribute('data-product-id');
                const action = this.classList.contains('increase') ? 'increase' : 'decrease';
                updateCartQuantity(productId, action);
            });
        });

        function updateCartQuantity(productId, action) {
            axios.post('/update-cart', {
                    productId: productId,
                    action: action
                })
                .then(function (response) {
                    // Cập nhật số lượng trong giao diện ngay lập tức
                    const quantitySpan = document.querySelector(`.quantity[data-product-id="${productId}"]`);
                    const newQuantity = response.data.quantity; // Sửa đổi ở đây
                    quantitySpan.textContent = newQuantity;

                    // Cập nhật tổng tiền
                    updateTotalAmount();
                })
                .catch(function (error) {
                    console.error('Error updating cart quantity', error);
                });
        }

        function updateTotalAmount() {
            // Lấy tất cả các số lượng và giá từ các sản phẩm
            const quantities = document.querySelectorAll('.quantity');
            const prices = document.querySelectorAll('.table td:nth-child(2)');

            // Tính toán tổng tiền mới
            let newTotalAmount = 0;
            for (let i = 0; i < quantities.length; i++) {
                newTotalAmount += parseFloat(prices[i].textContent) * parseInt(quantities[i].textContent);
            }

            // Cập nhật tổng tiền trong giao diện
            document.getElementById('totalAmount').textContent = `Tổng tiền: ${newTotalAmount}`;
        }
    });
</script>
@endsection