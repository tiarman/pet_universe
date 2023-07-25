@extends('layouts.site')
@section('stylesheet')

@endsection

@section('content')



<!-- Breadcrumb Area Start -->
<div class="section breadcrumb-area bg-bright">
    <div class="container">
        <div class="row">
            <div class="text-center col-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="breadcrumb-title">Wishlist</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Wishlist Section Start -->
<div class="section section-margin">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="wishlist-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-stock">Stock Status</th>
                                <th class="pro-cart">Add to Cart</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pro-thumbnail"><a href="single-product.html"><img class="fit-image" src="assets/images/products/small-product/6.png" alt="Product" /></a></td>
                                <td class="pro-title"><a href="single-product.html">Learn About Fish Farming</a></td>
                                <td class="pro-price"><span>$95.00</span></td>
                                <td class="pro-stock"><span>In Stock</span></td>
                                <td class="pro-cart"><a href="cart.html" class="btn btn-primary btn-hover-dark">Add to Cart</a></td>
                                <td class="pro-remove"><a href="#/"><i class="ti-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td class="pro-thumbnail"><a href="single-product.html"><img class="fit-image" src="assets/images/products/small-product/5.png" alt="Product" /></a></td>
                                <td class="pro-title"><a href="single-product.html">Basic Birds Food</a></td>
                                <td class="pro-price"><span>$75.00</span></td>
                                <td class="pro-stock"><span>In Stock</span></td>
                                <td class="pro-cart"><a href="cart.html" class="btn btn-primary btn-hover-dark">Add to Cart</a></td>
                                <td class="pro-remove"><a href="#/"><i class="ti-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td class="pro-thumbnail"><a href="single-product.html"><img class="fit-image" src="assets/images/products/small-product/3.png" alt="Product" /></a></td>
                                <td class="pro-title"><a href="single-product.html">Dog Trainning Center</a></td>
                                <td class="pro-price"><span>$95.00</span></td>
                                <td class="pro-stock"><span>In Stock</span></td>
                                <td class="pro-cart"><a href="cart.html" class="btn btn-primary btn-hover-dark">Add to Cart</a></td>
                                <td class="pro-remove"><a href="#/"><i class="ti-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td class="pro-thumbnail"><a href="single-product.html"><img class="fit-image" src="assets/images/products/small-product/4.png" alt="Product" /></a></td>
                                <td class="pro-title"><a href="single-product.html">Animal Rescue Center</a></td>
                                <td class="pro-price"><span>$30.00</span></td>
                                <td class="pro-stock"><span>Stock Out</span></td>
                                <td class="pro-cart"><a href="cart.html" class="btn btn-primary btn-hover-dark disabled">Add to Cart</a></td>
                                <td class="pro-remove"><a href="#/"><i class="ti-trash"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Wishlist Section End -->



@endsection

@section('script')
@endsection