@extends('template')
@section('content')
<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        @foreach($banners as $banner)
        <div class="hero__items set-bg" data-setbg="{{asset('uploads/banners/'.$banner->image)}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Summer Collection</h6>
                            <h2>{{ $banner->name }}</h2>
                            <p>{{ $banner->description}}</p>
                            <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- Hero Section End -->
<br></br>
  <!-- Banner Section Begin -->
  <section class="banner spad">
    <div class="container">
        <div class="row">
            @foreach ($categories->slice(0, 3) as $category)
            <div class="col-lg-4">
                <div class="banner__item banner__item--middle">
                    <div class="banner__item__pic">
                        <img src="{{asset('uploads/categories/'.$category->image)}}" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>{{ $category->name }}</h2>
                        <a href="{{ route('website.shopcategory',$category->id) }}">Shop now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Banner Section End -->

<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="section-title">
            <span>New Trends</span>
            <h2>Latest Products</h2>
        </div>
    </div>
</div>
</div>
<br>
<!-- Product Section Begin -->
<section class="product spad">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Best Sellers</li>
                    <li data-filter=".new-arrivals">New Arrivals</li>
                    <li data-filter=".hot-sales">Hot Sales</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">
            @foreach ($products->slice(0, 8) as $product)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{asset('uploads/products/'.$product->image)}}">

                        <ul class="product__hover">
                            <li><a href="#"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/icon/compare.png')}}" alt=""> <span>Compare</span></a></li>
                            <li><a href="{{ route('website.shop_detail',$product->id) }}"><img src="{{asset('assets/img/icon/search.png')}}" alt=""></a></li>
                        </ul>

                    </div>

                    <div class="product__item__text">
                        <h6>{{ $product->name }}</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>{{ $product->price }}</h5>

                    </div>

                </div>
            </div>
            @endforeach

        </div>
    </div>
    <br></br>

    <div class="row justify-content-center">
    <div class=" ">
    <a href="{{ route('website.shop') }}" class="primary-btn">View more <span class="arrow_right"></span></a>
    </div>
    </div>

</section>
<!-- Product Section End -->
@endsection

