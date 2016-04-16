<section id="product">
        <div class="container">
            <div class="cart-content">
                <div class="cart-close product-trigger"><i class="fa fa-close"></i></div>
                <div class="border-lines-container">
                    <h1 class="no-top-margin border-lines" id="item-name"> </h1>
                        <div class="product-preview-small">
                            <div class="product-img" id="item-img"> </div>
                            <div class="product-content" id="item-content" >
                            <p id="item-size"> </p>
                            <p>Price per Kg: <span class="item-price" id="item-price"> </span></p>
                                Quantity in Kg:
                                <div class="product-pieces">
                                        <input type="hidden" value="" name="price" id="price">
                                        <input type="text" value="1" name="quantity" id="quantity-step">
                                        <div class="product-pieces-up"></div>
                                        <div class="product-pieces-down"></div>
                                </div>
                                Kg.
                                <p>Delivery Time:</p>

                                <div class="ui-controlgroup-controls ">
                                    <div class="ui-radio ui-mini" style="display: block;">
                                    <input type="radio" name="timing" id="now" value="on" checked="checked" data-cacheval="false">
                                    <label id="lNow" for="now" class="ui-btn ui-corner-all ui-btn-inherit ui-first-child ui-btn-active ui-radio-on">Right now</label>
                                    </div>
                                    <div class="ui-radio ui-mini">
                                    <input type="radio" name="timing" id="later" value="off" data-cacheval="true">
                                    <label id="lLater" for="later" class="ui-btn ui-corner-all ui-btn-inherit ui-last-child ui-radio-off">Tomorrow morning</label>
                                    </div>
                                </div>

                                <div id="tip" class="alert-box alert-success notice" style="display: block;">
                                    <strong>Tip:</strong><em> Book fish for tomorrow and get <b>5%</b> discount.</em>
                                </div>
                                <div id="dBox" class="alert-box alert-success discount" style="display:none;">
                                    <div class="col-sm-8"><em>You will have 5% discount:</em></div>
                                    <div class="col-sm-4">
                                            <input id="dPrice" readonly="true" type="text">
                                    </div>                       
                                </div>
                                <div class="item-amount" id="item-amount">
                                    Amount: &#8377; <span><input type="text" name="amount" id="amountText" readonly="true" value=""></span>
                                </div>
                                <button class="button-yellow button-text-low button-long button-low scroll-to" id="button-cart">ADD TO CART</button>
                            </div><!-- .product-content -->
                        </div><!-- .product-preview-small -->
                </div>
            </div>
        </div>
    </section>

    <section id="cart">
        <div class="container">
            <div class="cart-content" >
                <div class="cart-close cart-trigger"><i class="fa fa-close"></i></div>
                <div class="border-lines-container">
                    <h1 class="no-top-margin border-lines">Cart</h1>
                </div>
                <div id="cart-container">
                  
                </div>
                <div id="cart-controls">
                    <hr>
                    <p class="text-right text-bigger">Total: <span id="cart-total"></span></p>
                    <div class="row text-xs-center">
                        <div class="col-sm-6">
                            <label><b>Your Phone No:</b></label>
                            <input type="text" name="mobile" placeholder="Enter your Mobile Number" required id="mob-no" class="col-sm-6">
                        </div>
                        <div class="col-sm-6 text-right text-xs-center">
                            <div class="margin-15"></div>
                            <a class="button-yellow button-text-low button-long button-low odr-btn">Place Order</a>
                        </div>
                    </div>
                </div>
            </div><!-- .cart-content -->
        </div><!-- .container -->
    </section><!-- #cart -->
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 responsive-column">                    
                    <h2 class="footer-heading">Our Address</h2>
                    <address>
                        Fishcart Head Office<br>
                        #5, Netaji Nagar Colony, Kotooli<br>
                        Calicut, Kerala
                        <div class="margin-20"></div>
                        Phone: +91 9605 657736<br>
                        Email: asilgulsar@gmail.com
                    </address>
                </div><!-- .col-md-4 -->
                <div class="col-md-4 text-center responsive-column">
                    <div class="margin-40 visible-lg visible-md"></div>
                    <img src="assets/images/logo.png">
                    <p class="logo-footer-text">FISHCART</p>
                    <p class="logo-footer-detail">Online Fish Delivery Website</p>
                    <a class="scroll-to button-yellow button-heavy">MAKE YOUR ORDER NOW!</a>
                </div><!-- .col-md-4 -->
                <div class="col-md-4 responsive-column">
                    <h2 class="footer-heading">Working Hours</h2>
                    <div class="opening-hours-wrapper">
                        <div class="row">
                            <div class="col-xs-6">
                                <em>Monday - Friday</em>
                            </div>
                            <div class="col-xs-6 text-right">
                                <em>09:00 - 23:00h</em>
                            </div>
                        </div>
                        <div class="margin-5"></div>
                        <div class="row">
                            <div class="col-xs-6">
                                <em>Saturday</em>
                            </div>
                            <div class="col-xs-6 text-right">
                                <em>09:00 - 16:00h</em>
                            </div>
                        </div>
                        <div class="margin-5"></div>
                        <div class="row">
                            <div class="col-xs-6">
                                <em>Sunday</em>
                            </div>
                            <div class="col-xs-6 text-right">
                                <em>12:00 - 18:00h</em>
                            </div>
                        </div>
                    </div>
                </div><!-- .col-md-4 -->
            </div><!-- .row -->
        </div><!-- .container -->
        <div class="site-info">
            <div class="container">
                <div class="row">
                    <div class="col-xs-8">
                        2016 All rights reserved. By Fishcart
                    </div>
                    <div class="col-xs-4 text-right footer-socials">
                        Powered By:
                        <a href="http://www.qzion.com" target="_blank">Qzion Technologies</a>
                    </div>
                </div>
            </div><!-- .container -->
            <div id="scroll-top"><i class="fa fa-angle-double-up"></i></div>
        </div><!-- .site-info -->
    </footer>

    <script type="text/javascript" src="assets/plugins/owl-carousel2/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/plugins/retina/retina.min.js"></script>
    <script type="text/javascript" src="assets/plugins/lightbox/js/lightbox.min.js"></script>
    <script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="assets/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.nav.min.js"></script>
</body>
</html>
