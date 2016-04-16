    <div class="page-title-img">
        <img class="img-full" alt="page title img" src="assets/images/headers/meat.png">
        <div class="page-title">
            <div class="container">
                <h1>MEAT</h1>
                <p>Fresh meat in the town.</p>
            </div><!-- .container -->
        </div>
    </div><!-- .page-title-img -->
    
    <section class="section-gray">
        <div class="container">
            <div class="border-lines-container">
                <h5 class="border-lines" id="menu-vegeterian">All Meat Items</h5>
            </div>
            <div class="row">
                <?php if(count($items)>0) { 
                        foreach ($items as $item){ if($item['type']=="MEAT"){?>
                        <div class="col-md-4 product-preview-container">
                            <div class="product-preview-big product-trigger item-btn" data-org="<?php echo $item['name'] ?>"  data-name="<?php echo $item['displayName'] ?>" data-size="<?php echo $item['sizeSpecification'] ?>" data-price="<?php echo $item['sellingPrice'] ?>" data-img="<?php echo $item['pic'] ?>"> 
                                <a><img alt="product photo" src="http://butler.ind-cloud.everdata.com/cart/api/product/image/large?name=<?php echo $item['name'] ?>"></a>
                                <div class="product-content">
                                    <div class="product-content-inner">
                                        <h4 class="product-title"><a><?php echo $item['displayName'] ?></a></h4>
                                        <p><?php echo $item['sizeSpecification'] ?></p>
                                        <p><?php if($item['bookingOnly']) echo"Only Booking";  ?></p>
                                        <span> &#8377; <strike><?php echo $item['marketPrice'] ?></strike></span>
                                        <div class="product-price">
                                            &#8377; <span><?php echo $item['sellingPrice'] ?></span>
                                        </div>
                                    </div>
                                </div><!-- .product-content -->
                            </div><!-- .product-preview-big -->
                        </div><!-- .col-md-4 --> 
                <?php }}}?>
            	               
            </div><!-- .row -->
        </div><!-- .container -->
    </section>