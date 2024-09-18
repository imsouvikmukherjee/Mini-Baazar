@extends('user.layout.app')
{{-- @section('page_title', 'Car Wheels  | Dashboard') --}}
@section('front_container')

  
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Your Cart
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="image product-thumbnail"><img src="{{ asset('front_assets/imgs/shop/product-1-2.jpg')}}"
                                            alt="#"></td>
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a href="product-details.html">J.Crew Mercantile
                                                Women's Short-Sleeve</a></h5>
                                        <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy
                                            magndapibus.
                                        </p>
                                    </td>
                                    <td class="price" data-title="Price"><span>$65.00 </span></td>
                                    <td class="text-center" data-title="Stock">
                                        <div class="detail-qty border radius  m-auto">
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val">1</span>
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <span>$65.00 </span>
                                    </td>
                                    <td class="action" data-title="Remove"><a href="#" class="text-muted"><i
                                                class="fi-rs-trash"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="image"><img src="{{ asset('front_assets/imgs/shop/product-11-2.jpg')}}" alt="#"></td>
                                    <td class="product-des">
                                        <h5 class="product-name"><a href="product-details.html">Amazon Essentials
                                                Women's Tank</a></h5>
                                        <p class="font-xs">Sit at ipsum amet clita no est,<br> sed amet sadipscing
                                            et gubergren</p>
                                    </td>
                                    <td class="price" data-title="Price"><span>$75.00 </span></td>
                                    <td class="text-center" data-title="Stock">
                                        <div class="detail-qty border radius  m-auto">
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val">2</span>
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <span>$150.00 </span>
                                    </td>
                                    <td class="action" data-title="Remove"><a href="#" class="text-muted"><i
                                                class="fi-rs-trash"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="image"><img src="{{ asset('front_assets/imgs/shop/product-6-1.jpg')}}" alt="#"></td>
                                    <td class="product-des">
                                        <h5 class="product-name"><a href="product-details.html">Amazon Brand - Daily
                                                Ritual Women's Jersey </a></h5>
                                        <p class="font-xs">Erat amet et et amet diam et et.<br> Justo amet at dolore
                                        </p>
                                    </td>
                                    <td class="price" data-title="Price"><span>$62.00 </span></td>
                                    <td class="text-center" data-title="Stock">
                                        <div class="detail-qty border radius  m-auto">
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val">1</span>
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <span>$62.00 </span>
                                    </td>
                                    <td class="action" data-title="Remove"><a href="#" class="text-muted"><i
                                                class="fi-rs-trash"></i></a></td>
                                </tr>
                                <tr>
                                   
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-action text-end">
                      
                        <a class="btn "><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection
