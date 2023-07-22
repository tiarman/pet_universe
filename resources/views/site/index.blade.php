@extends('layouts.site')
@section('stylesheet')

@endsection

@section('content')


<!-- Hero/Intro Slider Start -->
<div class="section">
    <div class="hero-slider swiper-container">
        <div class="swiper-wrapper">

            <div class="hero-slide-item swiper-slide">
                <div class="hero-slide-bg">
                    <img src="{{asset('assets/site/images/slider/slider1-1.png')}}" alt="Slider Image" />
                </div>
                <div class="container">
                    <div class="hero-slide-content text-start">
                        <h5 class="sub-title">We keep pets for pleasure.</h5>
                        <h2 class="title m-0">Vitamins For all Pets</h2>
                        <p class="ms-0">We know your concerns when you are looking for a chewing treat for your dog.</p>
                        <a href="shop.html" class="btn btn-dark btn-hover-primary">Shop Now</a>
                    </div>
                </div>
            </div>

            <div class="hero-slide-item swiper-slide">
                <div class="hero-slide-bg">
                    <img src="{{asset('assets/site/images/slider/slider1-2.png')}}" alt="Slider Image" />
                </div>
                <div class="container">
                    <div class="hero-slide-content text-center text-md-end">
                        <h5 class="sub-title">We keep pets for pleasure.</h5>
                        <h2 class="title m-0">Vitamins For all Pets</h2>
                        <p>We know your concerns when you are looking for a chewing treat for your dog.</p>
                        <a href="shop.html" class="btn btn-dark btn-hover-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Swiper Pagination Start -->
        <div class="swiper-pagination d-lg-none"></div>
        <!-- Swiper Pagination End -->

        <!-- Swiper Navigation Start -->
        <div class="home-slider-prev swiper-button-prev main-slider-nav d-lg-flex d-none"><i class="icon-arrow-left"></i></div>
        <div class="home-slider-next swiper-button-next main-slider-nav d-lg-flex d-none"><i class="icon-arrow-right"></i></div>
        <!-- Swiper Navigation End -->
    </div>
</div>
<!-- Hero/Intro Slider End -->

<div class="section section-padding">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 mb-n6">

            <div class="col mb-6" data-aos="fade-up" data-aos-duration="1000">
                <!-- Single CTA Wrapper Start -->
                <div class="single-cta-wrapper">

                    <!-- CTA Icon Start -->
                    <div class="cta-icon">
                        <i class="ti-truck"></i>
                    </div>
                    <!-- CTA Icon End -->

                    <!-- CTA Content Start -->
                    <div class="cta-content">
                        <h4 class="title">Free Shipping</h4>
                        <p>Free shipping on all order</p>
                    </div>
                    <!-- CTA Content End -->

                </div>
                <!-- Single CTA Wrapper End -->
            </div>

            <div class="col mb-6" data-aos="fade-up" data-aos-duration="1100">
                <!-- Single CTA Wrapper Start -->
                <div class="single-cta-wrapper">

                    <!-- CTA Icon Start -->
                    <div class="cta-icon">
                        <i class="ti-headphone-alt"></i>
                    </div>
                    <!-- CTA Icon End -->

                    <!-- CTA Content Start -->
                    <div class="cta-content">
                        <h4 class="title">Online Support</h4>
                        <p>Online live support 24/7</p>
                    </div>
                    <!-- CTA Content End -->

                </div>
                <!-- Single CTA Wrapper End -->
            </div>

            <div class="col mb-6" data-aos="fade-up" data-aos-duration="1200">
                <!-- Single CTA Wrapper Start -->
                <div class="single-cta-wrapper">

                    <!-- CTA Icon Start -->
                    <div class="cta-icon">
                        <i class="ti-bar-chart"></i>
                    </div>
                    <!-- CTA Icon End -->

                    <!-- CTA Content Start -->
                    <div class="cta-content">
                        <h4 class="title">Money Return</h4>
                        <p>Back guarantee under 5 days</p>
                    </div>
                    <!-- CTA Content End -->

                </div>
                <!-- Single CTA Wrapper End -->
            </div>

        </div>
    </div>
</div>

<!-- Product Section Start -->
<div class="section position-relative">
    <div class="container">

        <!-- Section Title & Tab Start -->
        <div class="row" data-aos="fade-up" data-aos-duration="1000">
            <!-- Tab Start -->
            <div class="col-12">
                <ul class="product-tab-nav nav justify-content-center mb-n3 pb-8 title-border-bottom">
                    <li class="nav-item mb-3"><a class="nav-link active" data-bs-toggle="tab" href="#tab-product-all">Bestseller</a></li>
                    <li class="nav-item mb-3"><a class="nav-link" data-bs-toggle="tab" href="#tab-product-featured">Featured</a></li>
                    <li class="nav-item mb-3"><a class="nav-link" data-bs-toggle="tab" href="#tab-product-featuredss">Todays Deals</a></li>
                </ul>
            </div>
            <!-- Tab End -->
        </div>
        <!-- Section Title & Tab End -->

        <!-- Products Tab Start -->
        <div class="row" data-aos="fade-up" data-aos-duration="1100">
            <div class="col-12">
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="tab-product-all">
                        <div class="row mb-n8">

                        




@foreach ($animals as $val)
    

                            <!-- Product Start -->
                            <div class="col-12 col-sm-6 col-lg-3 product-wrapper mb-8">
                                <div class="product">
                                    <form action="{{ route('shopping.carts.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf 
                    
                    
                                                    <input type="hidden" value="{{ $val->id }}" name="id">
                                                    <input type="hidden" value="{{ $val->name }}" name="name">
                    
                                    <!-- Thumb Start  -->
                                    <div class="thumb">
                                        <a href="single-product.html" class="image">
                                            <img class="fit-image" style="height: 270px; width: 270px;" src="{{asset($val->image)}}" alt="Product" />
                                        </a>
                                        <span class="badges">
                                        <span class="new">New</span>
                                        </span>
                                        <div class="action-wrapper">
                                            <a href="#/" id="{{ $val->id }}" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="ti-plus"></i></a>
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist"><i class="ti-heart"></i></a>
                                            <button type="submit" class="action cart" title="Cart"><i class="ti-shopping-cart"></i></button>
                                        </div>
                                    </div>
                                    <!-- Thumb End  -->

                                    <!-- Content Start  -->
                                    <div class="content">
                                        <h5 class="title"><a href="{{ route('animal_details', $val->name) }}">{{$val->name}}</a></h5>
                                        {{--  <span class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>  --}}
                                        <span class="price">
                                            @if ($val->discount_price == null)
                                            <span class="new">${{ $val->selling_price }}</span>
                                            @else
                                            <span class="new">${{ $val->discount_price }}</span>
                                            <span class="old">${{$val->selling_price}}</span>
                                            @endif

                                        </span>
                                    </div>
                                    <!-- Content End  -->
                                </div>
                            </div>
                            <!-- Product End -->
                        </form>

                            @endforeach




                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-product-featured">
                        <div class="row mb-n8">


@foreach ($animals as $val)
    
@if ($val->featured == 'yes')

                            <!-- Product Start -->
                            <div class="col-12 col-sm-6 col-lg-3 product-wrapper mb-8">
                                <div class="product">
                                    <!-- Thumb Start  -->
                                    <div class="thumb">
                                        <a href="single-product.html" class="image">
                                            <img class="fit-image" src="{{asset($val->image)}}" alt="Product" />
                                        </a>
                                        <span class="badges">
                                        <span class="new">New</span>
                                        </span>
                                        <div class="action-wrapper">
                                            <a href="#/" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="ti-plus"></i></a>
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist"><i class="ti-heart"></i></a>
                                            <a href="cart.html" class="action cart" title="Cart"><i class="ti-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                    <!-- Thumb End  -->

                                    <!-- Content Start  -->
                                    <div class="content">
                                        <h5 class="title"><a href="single-product.html">{{$val->name}}</a></h5>
                                        {{--  <span class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>  --}}
                                    <span class="price">
                                        @if ($val->discount_price == null)
                                        <span class="new">${{ $val->selling_price }}</span>
                                        @else
                                        <span class="new">${{ $val->discount_price }}</span>
                                        <span class="old">${{$val->selling_price}}</span>
                                        @endif

                                    </span>
                                    </div>
                                    <!-- Content End  -->
                                </div>
                            </div>
                            <!-- Product End -->
                            @endif
                            @endforeach


                        </div>
                    </div>





                    <div class="tab-pane fade" id="tab-product-featuredss">
                        <div class="row mb-n8">


@foreach ($animals as $val)
    
@if ($val->today_deal == 'yes')

                            <!-- Product Start -->
                            <div class="col-12 col-sm-6 col-lg-3 product-wrapper mb-8">
                                <div class="product">
                                    <!-- Thumb Start  -->
                                    <div class="thumb">
                                        <a href="single-product.html" class="image">
                                            <img class="fit-image" src="{{asset($val->image)}}" alt="Product" />
                                        </a>
                                        <span class="badges">
                                        <span class="new">New</span>
                                        </span>
                                        <div class="action-wrapper">
                                            <a href="#/" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="ti-plus"></i></a>
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist"><i class="ti-heart"></i></a>
                                            <a href="cart.html" class="action cart" title="Cart"><i class="ti-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                    <!-- Thumb End  -->

                                    <!-- Content Start  -->
                                    <div class="content">
                                        <h5 class="title"><a href="single-product.html">{{$val->name}}</a></h5>
                                        {{--  <span class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>  --}}
                                    <span class="price">
                                        @if ($val->discount_price == null)
                                        <span class="new">${{ $val->selling_price }}</span>
                                        @else
                                        <span class="new">${{ $val->discount_price }}</span>
                                        <span class="old">${{$val->selling_price}}</span>
                                        @endif

                                    </span>
                                    </div>
                                    <!-- Content End  -->
                                </div>
                            </div>
                            <!-- Product End -->
                            @endif
                            @endforeach


                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Products Tab End -->
    </div>
</div>
<!-- Product Section End -->

<!-- Banner Section Start -->
<div class="section section-margin">

    <div class="container">
        <!-- Banners Start -->
        <div class="row mb-n6">

            <!-- Banner Start -->
            <div class="col-md-6 col-12 mb-6" data-aos="fade-up" data-aos-duration="1000">
                <a href="shop.html" class="banner">
                    <img class="fit-image" src="{{asset('assets/site/images/banner/1.png')}}" alt="Banner Image" />
                </a>
            </div>
            <!-- Banner End -->

            <!-- Banner Start -->
            <div class="col-md-6 col-12 mb-6" data-aos="fade-up" data-aos-duration="1400">
                <a href="shop.html" class="banner">
                    <img class="fit-image" src="{{asset('assets/site/images/banner/2.png')}}" alt="Banner Image" />
                </a>
            </div>
            <!-- Banner End -->

        </div>
        <!-- Banners End -->
    </div>

</div>
<!-- Banner Section End -->

<!-- Product Deal Section Start -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Section Title Start -->
                <div class="section-title text-center">
                    <h2 class="title" data-aos="fade-up" data-aos-duration="1000">Deal Of The Week</h2>
                </div>
                <!-- Section Title End -->

                <!-- Latest Blog Carousel Start -->
                <div class="product-deal-carousel arrow-outside-container">
                    <div class="swiper-container">

                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <!-- Single Product Deal Start -->
                                <div class="single-deal-product row mb-n6">
                                    <!-- Deal Thumb Start -->
                                    <div class="deal-thumb col-md-6 mb-6" data-aos="fade-up" data-aos-duration="1200">
                                        <a href="single-product.html">
                                            <img class="fit-image" src="{{asset('assets/site/images/products/large-product/9.png')}}" alt="Product Image">
                                        </a>
                                    </div>
                                    <!-- Deal Thumb End -->
                                    <!-- Deal Content Start -->
                                    <div class="product-deal-content col-md-6 mb-6" data-aos="fade-up" data-aos-duration="1400">
                                        <h5 class="title mb-3"><a href="single-product.html">An Animal Album</a></h5>
                                        <span class="rating mb-3">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                        <span class="price">
                                                <span class="new">$80.50</span>
                                        <span class="old">$85.80</span>
                                        </span>
                                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                                        <div class="countdown-area">
                                            <div class="countdown-wrapper" data-countdown="2028/12/28"></div>
                                        </div>
                                        <a href="shop.html" class="btn btn-primary btn-hover-dark">Shop Now</a>
                                    </div>
                                    <!-- Deal Content End -->
                                </div>
                                <!-- Single Product Deal End -->
                            </div>

                            <div class="swiper-slide">
                                <!-- Single Product Deal Start -->
                                <div class="single-deal-product row mb-n6">
                                    <!-- Deal Thumb Start -->
                                    <div class="deal-thumb col-md-6 mb-6">
                                        <a href="single-product.html">
                                            <img class="fit-image" src="{{asset('assets/site/images/products/large-product/10.png')}}" alt="Product Image">
                                        </a>
                                    </div>
                                    <!-- Deal Thumb End -->
                                    <!-- Deal Content Start -->
                                    <div class="product-deal-content col-md-6 mb-6">
                                        <h5 class="title mb-3"><a href="single-product.html">Animal For Life</a></h5>
                                        <span class="rating mb-3">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                        <span class="price">
                                                <span class="new">$60.00</span>
                                        <span class="old">$66.00</span>
                                        </span>
                                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                                        <div class="countdown-area">
                                            <div class="countdown-wrapper" data-countdown="2028/12/28"></div>
                                        </div>
                                        <a href="shop.html" class="btn btn-primary btn-hover-dark">Shop Now</a>
                                    </div>
                                    <!-- Deal Content End -->
                                </div>
                                <!-- Single Product Deal End -->
                            </div>

                        </div>

                        <!-- Swiper Pagination Start -->
                        <div class="swiper-pagination d-none"></div>
                        <!-- Swiper Pagination End -->

                        <!-- Next Previous Button Start -->
                        <div class="swiper-deal-button-next swiper-button-next swiper-nav-button"><i class="ti-angle-right"></i></div>
                        <div class="swiper-deal-button-prev swiper-button-prev swiper-nav-button"><i class="ti-angle-left"></i></div>
                        <!-- Next Previous Button End -->
                    </div>
                </div>
                <!-- Latest Blog Carousel End -->

            </div>
        </div>
    </div>
</div>
<!-- Product Deal Section End -->

<!-- Testimonial Section Start -->
<div class="section bg-bright section-padding section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Testimonial Carousel Start -->
                <div class="testimonial-carousel">

                    <!-- Testimonial Gallery Top Start -->
                    <div class="swiper-container testimonial-gallery-top" data-aos="fade-up" data-aos-duration="1000">
                        <div class="swiper-wrapper">

                            <!-- Single Swiper Slide Start -->
                            <div class="swiper-slide">

                                <!-- Testimonial Content Start -->
                                <div class="testimonial-content text-center">
                                    <p>Lorem ipsum dolor sit amet, co adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita ullamco laboris nisi ut aliquip ex ea commodo</p>
                                </div>
                                <!-- Testimonial Content End -->

                            </div>
                            <!-- Single Swiper Slide End -->

                            <!-- Single Swiper Slide Start -->
                            <div class="swiper-slide">

                                <!-- Testimonial Content Start -->
                                <div class="testimonial-content text-center">
                                    <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
                                </div>
                                <!-- Testimonial Content End -->

                            </div>
                            <!-- Single Swiper Slide End -->
                        </div>

                    </div>
                    <!-- Testimonial Gallery Top End -->

                    <!-- Testimonial Gallery Thumb Start -->
                    <div class="swiper-container testimonial-gallery-thumbs" data-aos="fade-up" data-aos-duration="1500">
                        <div class="swiper-wrapper">

                            <!-- Single Swiper Slide Start -->
                            <div class="swiper-slide">
                                <!-- Testimonial Thumb Start -->
                                <div class="testimonial-thumb text-center">
                                    <img src="{{asset('assets/site/images/testimonial/1.png')}}" alt="Testimonial Image">
                                    <h3 class="thumb-title">Jonathon Jhon</h3>
                                    <h6 class="thumb-subtitle">Customer</h6>
                                </div>
                                <!-- Testimonial Thumb End -->
                            </div>
                            <!-- Single Swiper Slide End -->

                            <!-- Single Swiper Slide Start -->
                            <div class="swiper-slide">
                                <!-- Testimonial Thumb Start -->
                                <div class="testimonial-thumb text-center">
                                    <img src="{{asset('assets/site/images/testimonial/2.png')}}" alt="Testimonial Image">
                                    <h3 class="thumb-title">Cristal Jerry</h3>
                                    <h6 class="thumb-subtitle">Customer</h6>
                                </div>
                                <!-- Testimonial Thumb End -->
                            </div>
                            <!-- Single Swiper Slide End -->

                        </div>

                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                    <!-- Testimonial Gallery Thumb End -->

                </div>
                <!-- Testimonial Carousel End -->

            </div>
        </div>
    </div>
</div>
<!-- Testimonial Section End -->

<!-- Blog Section Start -->
<div class="section section-margin-bottom">
    <div class="container">

        <div class="row" data-aos="fade-up" data-aos-duration="1000">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title">From Our Blog</h2>
                </div>
            </div>
        </div>

        <div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1 mb-n8">

            <div class="col mb-8" data-aos="fade-up" data-aos-duration="1000">
                <!-- Single Blog Start -->
                <div class="single-blog-wrapper">

                    <!-- Blog Thumb Start -->
                    <div class="blog-thumb thumb-effect">
                        <a class="image" href="blog-details.html">
                            <img class="fit-image" src="{{asset('assets/site/images/blog/medium-size/1.jpg')}}" alt="Blog Image">
                        </a>
                    </div>
                    <!-- Blog Thumb End -->

                    <!-- Blog Content Start -->
                    <div class="blog-content">
                        <div class="blog-meta">
                            <ul>
                                <li><span>By</span><a href="#/">Admin</a></li>
                                <li><span>27, Jan, 2021</span></li>
                            </ul>
                        </div>
                        <h2 class="blog-title"><a href="blog-details.html">How to take care of your fish</a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut...</p>
                        <a class="more-link" href="blog-details.html">Read More</a>
                    </div>
                    <!-- Blog Content End -->

                </div>
                <!-- Single Blog End -->
            </div>

            <div class="col mb-8" data-aos="fade-up" data-aos-duration="1300">
                <!-- Single Blog Start -->
                <div class="single-blog-wrapper">

                    <!-- Blog Thumb Start -->
                    <div class="blog-thumb thumb-effect">
                        <a class="image" href="blog-details.html">
                            <img class="fit-image" src="{{asset('assets/site/images/blog/medium-size/2.jpg')}}" alt="Blog Image">
                        </a>
                    </div>
                    <!-- Blog Thumb End -->

                    <!-- Blog Content Start -->
                    <div class="blog-content">
                        <div class="blog-meta">
                            <ul>
                                <li><span>By</span><a href="#/">Admin</a></li>
                                <li><span>12, Feb, 2021</span></li>
                            </ul>
                        </div>
                        <h2 class="blog-title"><a href="blog-details.html">Find the male and female fish</a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut...</p>
                        <a class="more-link" href="blog-details.html">Read More</a>
                    </div>
                    <!-- Blog Content End -->

                </div>
                <!-- Single Blog End -->
            </div>

            <div class="col mb-8" data-aos="fade-up" data-aos-duration="1600">
                <!-- Single Blog Start -->
                <div class="single-blog-wrapper">

                    <!-- Blog Thumb Start -->
                    <div class="blog-thumb thumb-effect">
                        <a class="image" href="blog-details.html">
                            <img class="fit-image" src="{{asset('assets/site/images/blog/medium-size/3.jpg')}}" alt="Blog Image">
                        </a>
                    </div>
                    <!-- Blog Thumb End -->

                    <!-- Blog Content Start -->
                    <div class="blog-content">
                        <div class="blog-meta">
                            <ul>
                                <li><span>By</span><a href="#/">Admin</a></li>
                                <li><span>20, March, 2021</span></li>
                            </ul>
                        </div>
                        <h2 class="blog-title"><a href="blog-details.html">Tips for taking care of dogs</a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut...</p>
                        <a class="more-link" href="blog-details.html">Read More</a>
                    </div>
                    <!-- Blog Content End -->

                </div>
                <!-- Single Blog End -->
            </div>

        </div>

    </div>
</div>
<!-- Blog Section End -->





<!-- Modal Start  -->
<div class="modalquickview modal fade" id="quick-view" tabindex="-1" aria-labelledby="quick-view" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="quickview_body">
            

            
        </div>
    </div>
</div>
<!-- Modal End  -->





@endsection

@section('script')
  <script type="text/javascript">
        //ajax request send for collect childcategory
        $(document).on('click', '.quickview', function() {
            console.log('clicked');
            var id = $(this).attr("id");
            {{--  alert(id);  --}}
            $.ajax({
                url: "{{ url('/quickview/') }}/" + id,
                type: 'get',
                success: function(data) {
                    $("#quickview_body").html(data);
                }
            });
        });
    </script>

    
    <script>
        $(document).ready(function() {
            $('#cart-form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();
                {{--  console.log('click', formData);  --}}

                $.ajax({
                    url: '{{ route('shopping.carts.store') }}',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Show SweetAlert Toast success notification
                        Swal.fire({
                            icon: 'success',
                            title: 'Congratulations!',
                            text: 'Cart added successfully',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });

                        // Reset the form
                        $('#cart-form')[0].reset();
                    },
                    error: function(xhr) {
                        // Show SweetAlert Toast error notification
                        Swal.fire({
                            icon: 'error',
                            title: xhr.responseJSON.error ? xhr.responseJSON.title :
                                'Error',
                            text: xhr.responseJSON.message,
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });
                    }
                });
            });
        });
    </script>
@endsection
