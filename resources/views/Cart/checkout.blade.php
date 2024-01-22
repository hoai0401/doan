@extends('Cart.layouts')

@section('content')

<div class="bg0 p-t-130 p-b-85">
    @csrf
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thông tin cá nhân</h4>
                            {{-- @dd($userData) --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên</label>
                                <input type="text" class="form-control" disabled value="{{ $userData[0]->name }}"placeholder="Nhập họ và tên">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" disabled value="{{ $userData[0]->email }}"placeholder="Nhập địa chỉ email">
                            </div>
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">SĐT</label>
                                <input type="text" class="form-control" disabled value="{{ $userData[0]->phone }}"placeholder="Nhập số điện thoại">
                            </div>
                            <div class="mb-3">
                                <label for="apartment_number" class="form-label">Địa chỉ</label>
                                <input type="text" placeholder="Nhập địa chỉ nhà" disabled value="{{ $userData[0]->Address}}">
                            </div>
                        </div>
                    </div>
                </div>
                @php $sumPriceCart = 0; @endphp 
                @foreach ($cartProducts as $product)
                    @php 
                        $sumPriceCart = $sumPriceCart + $product->price * $product->quantity
                    @endphp
                @endforeach
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thông tin đơn hàng</h4>
                            <div class="mb-3">
                                <div class="info__order-box">
                                    <span>Tổng tiền của sản phẩm: </span>
                                    <span>{{ $sumPriceCart }}</span>
                                </div>
                                <div><label >Giá trị giảm giá: {{intval(session('discount_percentage'))}}%</label></div>
                            </div>
                            @php 
                                $pricediscount = 0;
                            @endphp
                            @foreach ($cartProducts as $product)
                        @endforeach
                        @if (session('discount_percentage') != 0)
                            @php
                                $pricediscount = $sumPriceCart * session('discount_percentage') / 100;
                            @endphp
                        @else
                            @php
                                session()->forget('voucher');
                            @endphp
                        @endif
                            <form id="voucher" action="{{ route('applycoupon') }}" method="POST">
                                @csrf
                                <div class="flex-w flex-m m-r-20 m-tb-5">
                                    <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                        name="coupon" placeholder="Coupon Code">
                                </div>
                            </form>
                            <a href="{{ route('applycoupon') }}" onclick="event.preventDefault(); document.getElementById('voucher').submit();"
                            class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5"
                            >Chọn Mã Giảm</a>
                            <div class="mb-3">
                                <div style="color: red; font-weight: bold" class="info__order-box">
                                    <span>Tổng tiền: </span>
                                    <span >{{ $sumPriceCart-$pricediscount }}</span>
                                </div>
                            <div class="text-center">
                                @if ($sumPriceCart !== null && $sumPriceCart > 0)
                                <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                                    <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">
                                    </div>
                                </div>
                                <br>
                                    <a href="{{ route('order') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                        Đặt hàng
                                    </a>
                                @else
                                <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                                    <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">
                                    </div>
                                </div>
                                    <p style="color: red; font-weight: bold;">Hãy thêm sản phẩm vào giỏ hàng</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection