@extends('template')
@section('content')
   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                               $total=0;
                            @endphp
                            @foreach($cartproduct as $product)
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="{{ asset('uploads/products/'.$product->image) }} " width="100px" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>{{ $product->name }}</h6>
                                        <h5>Rs. {{ $product->price }}</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <input type="number" min="1" max="{{ $product->pQuantity }}"  class="form-control" value="{{ $product->quantity }}">
                                    </div>
                                </td>
                                <td class="cart__price">Rs. {{ $product->price * $product->quantity}}</td>
                                <td class="cart__close"><a href="{{ route('website.deletecartproduct',$product->id) }}"><i class="fa fa-close"></i></a></td>
                            </tr>
                            @php
                            $total+=($product->price * $product->quantity);
                        @endphp
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="#">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Apply</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>Rs. {{ $total }}</span></li>
                        <li>Total <span>Rs. {{ $total }}</span></li>
                    </ul>
                    <form action="{{ route('website.checkout') }}">
                        <p>FullName</p>
                   <input class="form-control " type="text" name="fullname" required >
                   <p>Email</p>
                   <input class="form-control mt-2" type="email" name="email" required >
                   <p>Phone</p>
                   <input class="form-control mt-2" type="text" name="phone" required>
                   <p>Address</p>
                   <input class="form-control mt-2" type="text" name="address" required>
                   <input class="form-control mt-2" type="hidden" value="{{ $total }}" name="bill" required>
                   <input class="primary-btn mt-2 btn-block" type="submit" name="checkout" value="Proceed to checkout">
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

@endsection
