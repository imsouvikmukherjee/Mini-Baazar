@extends('user.layout.app')
{{-- @section('page_title', 'Car Wheels  | Dashboard') --}}
@section('front_container')

 <!-- CSS for CAPTCHA -->
 <style>
    .captcha_section {
        margin-top: 20px;
        text-align: center;
    }

    .captcha_box {
        display: flex;
        /* justify-content: center; */
        align-items: center;
        margin-bottom: 10px;
    }

    .captcha_text {
        background-color: #f1f1f1;
        padding: 10px;
        font-size: 18px;
        font-weight: bold;
        letter-spacing: 3px;
        margin-right: 10px;
    }

    #captcha_input {
        width: 200px;
        /* margin: 0 auto; */
    }

    #captcha_btn{
        margin-left: 10px;
    }
</style>
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-sm-15">
                    <div class="toggle_info">
                        <span><i class="fi-rs-user mr-10"></i><span class="text-muted">Already have an
                                account?</span> <a href="#loginform" data-bs-toggle="collapse" class="collapsed"
                                aria-expanded="false">Click here to login</a></span>
                    </div>
                    <div class="panel-collapse collapse login_form" id="loginform">
                        <div class="panel-body">
                            <p class="mb-30 font-sm">If you have shopped with us before, please enter your details
                                below. If you are a new customer, please proceed to the Billing &amp; Shipping
                                section.</p>
                            <form method="post">
                                <div class="form-group">
                                    <input type="text" name="email" placeholder="Username Or Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox"
                                                id="remember" value="">
                                            <label class="form-check-label" for="remember"><span>Remember
                                                    me</span></label>
                                        </div>
                                    </div>
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-md" name="login">Log in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="toggle_info">
                        <span><i class="fi-rs-label mr-10"></i><span class="text-muted">Have a coupon?</span> <a
                                href="#coupon" data-bs-toggle="collapse" class="collapsed"
                                aria-expanded="false">Click here to enter your code</a></span>
                    </div>
                    <div class="panel-collapse collapse coupon_form " id="coupon">
                        <div class="panel-body">
                            <p class="mb-30 font-sm">If you have a coupon code, please apply it below.</p>
                            <form method="post">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Coupon Code...">
                                </div>
                                <div class="form-group">
                                    <button class="btn  btn-md" name="login">Apply Coupon</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="divider mt-50 mb-50"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-25">
                        <h4>Billing Details</h4>
                    </div>
                    <form method="post">
                        <div class="form-group">
                            <input type="text" required="" name="fname" placeholder="First name *">
                        </div>
                        <div class="form-group">
                            <input type="text" required="" name="lname" placeholder="Last name *">
                        </div>
                        <div class="form-group">
                            <input required="" type="text" name="cname" placeholder="Company Name">
                        </div>
                        <div class="form-group">
                            <div class="custom_select">
                                <select class="form-control select-active">
                                   
                                    <option value="WF">Wallis and Futuna</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="WS">Western Samoa</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="billing_address" required="" placeholder="Address *">
                        </div>
                        <div class="form-group">
                            <input type="text" name="billing_address2" required="" placeholder="Address line2">
                        </div>
                        <div class="form-group">
                            <input required="" type="text" name="city" placeholder="City / Town *">
                        </div>
                        <div class="form-group">
                            <input required="" type="text" name="state" placeholder="State / County *">
                        </div>
                        <div class="form-group">
                            <input required="" type="text" name="zipcode" placeholder="Postcode / ZIP *">
                        </div>
                        <div class="form-group">
                            <input required="" type="text" name="phone" placeholder="Phone *">
                        </div>
                        <div class="form-group">
                            <input required="" type="text" name="email" placeholder="Email address *">
                        </div>
                       
                        <div id="collapsePassword" class="form-group create-account collapse in">
                            <input required="" type="password" placeholder="Password" name="password">
                        </div>
                        <div class="ship_detail">
                            <div class="form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                            id="differentaddress">
                                        <label class="form-check-label label_info" data-bs-toggle="collapse"
                                            data-target="#collapseAddress" href="#collapseAddress"
                                            aria-controls="collapseAddress" for="differentaddress"><span>Ship to a
                                                different address?</span></label>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseAddress" class="different_address collapse in">
                                <div class="form-group">
                                    <input type="text" required="" name="fname" placeholder="First name *">
                                </div>
                                <div class="form-group">
                                    <input type="text" required="" name="lname" placeholder="Last name *">
                                </div>
                                <div class="form-group">
                                    <input required="" type="text" name="cname" placeholder="Company Name">
                                </div>
                                <div class="form-group">
                                    <div class="custom_select">
                                        <select class="form-control select-active">
                                           
                                            <option value="WF">Wallis and Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="WS">Western Samoa</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="billing_address" required="" placeholder="Address *">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="billing_address2" required=""
                                        placeholder="Address line2">
                                </div>
                                <div class="form-group">
                                    <input required="" type="text" name="city" placeholder="City / Town *">
                                </div>
                                <div class="form-group">
                                    <input required="" type="text" name="state" placeholder="State / County *">
                                </div>
                                <div class="form-group">
                                    <input required="" type="text" name="zipcode" placeholder="Postcode / ZIP *">
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="order_review">
                        <div class="mb-20">
                            <h4>Your Orders</h4>
                        </div>
                        <div class="table-responsive order_table text-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="image product-thumbnail">
                                            <img src="{{ asset('front_assets/imgs/shop/product-1-1.jpg')}}" alt="#">
                                        </td>
                                        <td>
                                            <h5><a href="product-details.html">Yidarton Women Summer Blue</a></h5>
                                            <span class="product-qty">x 2</span>
                                        </td>
                                        <td>$180.00</td>
                                    </tr>
                                    <tr>
                                        <td class="image product-thumbnail">
                                            <img src="{{ asset('front_assets/imgs/shop/product-2-1.jpg')}}" alt="#">
                                        </td>
                                        <td>
                                            <h5><a href="product-details.html">LDB MOON Women Summe</a></h5> <span class="product-qty">x 1</span>
                                        </td>
                                        <td>$65.00</td>
                                    </tr>
                                    <tr>
                                        <td class="image product-thumbnail">
                                            <img src="{{ asset('front_assets/imgs/shop/product-3-1.jpg')}}" alt="#">
                                        </td>
                                        <td>
                                            <h5><a href="product-details.html">Women's Short Sleeve Loose</a></h5>
                                            <span class="product-qty">x 1</span>
                                        </td>
                                        <td>$35.00</td>
                                    </tr>
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal" colspan="2">$280.00</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td colspan="2"><em>Free Shipping</em></td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">$280.00</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                        <div class="payment_method">
                            <div class="mb-25">
                                <h5>Payment</h5>
                            </div>
                            <div class="payment_option">
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3">
                                    <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#cashOnDelivery" aria-controls="cashOnDelivery">Cash On Delivery</label>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4">
                                    <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#cardPayment" aria-controls="cardPayment">Card Payment</label>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios5">
                                    <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Paypal</label>
                                </div>
                            </div>
                        </div>
                
                        <!-- CAPTCHA Section -->

                        
                        <div class="captcha_section">
                
                            <div class="captcha_box">
                                <span id="captcha_text" class="captcha_text"></span>
                                <input type="text" id="captcha_input" class="form-control" placeholder="Enter Captcha" required>
                                <button type="button" id="captcha_btn" onclick="generateCaptcha()" class="btn btn-sm" style="bg-color: #a8069d;">Refresh</button>
                            </div>
                           
                        </div>
                
                        <a href="#" class="btn btn-fill-out btn-block mt-30">Place Order</a>
                    </div>
                </div>
                
               
                
              
                
            </div>
        </div>
    </section>
</main>


  <!-- JavaScript to generate simple CAPTCHA -->
  <script>
    function generateCaptcha() {
        let captcha = Math.random().toString(36).substring(2, 7); // Generate random 5-character string
        document.getElementById('captcha_text').innerText = captcha;
    }

    // Call the generateCaptcha function to load initial captcha when page loads
    window.onload = generateCaptcha;
</script>
@endsection
