
var cart={};
var total_price=0;
$(document).ready(function(e){

    cart.items=[];

    // Check browser support
    if (typeof(Storage) !== "undefined") {
        // Store
        tmp=localStorage.getItem('cart');
        console.log(tmp);
        if(!(tmp)){         
            localStorage.setItem("cart", JSON.stringify(cart));
        } else{
            cart=JSON.parse(tmp); 
        }
        build_main_cart();
        
    } else {
        $("#cart-holder").html('Sorry, your browser does not support Web Storage...');
    }

    $('#button-cart').on('click', function(e){

            var div = $(this).parent();
            var quantity = $(div).find('input[type=text][name=quantity]').val();
            var delivery = $("input[type='radio'][name='timing']:checked").val();

            var item = {};           
            item.orgName=$(div).attr('data-org');
            item.name = $(div).attr('data-name');
            item.size = $(div).attr('data-size');
            item.price = $(div).attr('data-price');
            item.img = $(div).attr('data-img');
            item.quantity = quantity;
            item.delivery = delivery;
            if(delivery=='on'){
                item.immediate = true; 
            }else{
                item.immediate = false; 
            }
            console.log(item);
            addToCart(item);
    });

    $('body').on('click','.cart-remove',function(e){

        var i = $(this).data('item-name');
        console.log(cart.items);
        cart.items.splice(i, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        build_main_cart();
        e.preventDefault();
    });

    $('body').on('click','.odr-btn',function(e){
        placeOrder();
        e.preventDefault();
    });

    $(document).on('click','.item-btn',function(e){
            e.preventDefault();

            var orgname= $(this).data('org');
            var name= $(this).data('name');
            var size= $(this).data('size');
            var price= $(this).data('price');
            var img= $(this).data('img');
            var booking= $(this).data('booking');
            if(booking==true){
                $("#now").parent().hide(true);
                $('#later').trigger("click").trigger("click");
            }else{
                $("#now").parent().show(true);
                $('#now').trigger("click").trigger("click");
            }
            $("#amountText").val(price);
            var discount = $("#amountText").val() * .95;
            discount = discount.toFixed(0);
            $("#dPrice").val(discount);

            $("#item-content").attr('data-org', orgname);
            $("#item-content").attr('data-name',name);
            $("#item-content").attr('data-size',size);
            $("#item-content").attr('data-price',price);
            $("#item-content").attr('data-img',img);
            $("#quantity-step").attr('data-item-price',price);
            $("#price").val(price);

            $("#item-name").html(name);
            $("#item-size").html("Size: "+size);
            $("#item-price").html("&#8377; "+price);
            $("#item-img").html("<img alt='product photo' src='http://butler.ind-cloud.everdata.com/cart/api/product/image/large?name="+orgname+"' width=500>");

    });

    $('body').on('click','.filter',function(e){

        var filter= $(this).data('type');
        $( "#filter li a" ).removeClass( "active" );
        $(this).addClass("active");

        $("#item-filter-name").html(filter);
        $url= "filter_products/fish/"+filter;
        post_data = { };

        $.post($url, post_data, function(response){

            if(response!='') {
                $("#item-container").empty();
                $.each( response, function( key, val ) {
                  var booking='';
                  var offer='';
                  if(val.bookingOnly==true){
                    booking="<p> Only Booking</p>";
                  }
                  if(val.marketPrice>val.sellingPrice){
                    offer="<span> &#8377; <strike>"+val.marketPrice+"</strike></span>";
                  }

                   output= '<div class="col-md-4 product-preview-container">'+
                            '<div class="product-preview-big product-trigger item-btn" data-name="'+val.displayName+'" data-org="'+val.name+'"  data-size="'+val.sizeSpecification+'" data-price="'+val.sellingPrice+'" data-img="'+val.pic+'" data-booking="'+val.bookingOnly+'">'+
                              '<a><img alt="product photo" src="http://butler.ind-cloud.everdata.com/cart/api/product/image/large?name='+val.name+'"></a>'+
                              '<div class="product-content">'+
                                '<div class="product-content-inner">'+
                                  '<h4 class="product-title"><a>'+val.displayName+'</a></h4>'+
                                  '<p>'+val.sizeSpecification+'</p>'+booking+offer+
                                  '<div class="product-price"> &#8377; <span>'+val.sellingPrice+'</span></div>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>';
                         $("#item-container").append(output);
                    });
            } else {
                output ='<div class="alert alert-danger alert-dismissable text-center" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>No more items to display.</div>';
                
            }
               
            }, 'json');
        e.preventDefault();
    });

    $(document).on('change','.quantity',function(e){
        e.preventDefault();
        // var i = $(this).data('item-id');
        // var quantity = $(this).val();
        // cart.items[i].quantity=quantity;
        // localStorage.setItem('cart', JSON.stringify(cart));
        // build_main_cart();
        // e.preventDefault();
        alert('hi');
    });


    // $('body').on('change','#quantity-step',function(e){

    //     var price = $(this).data('item-price');
    //     var quantity = $(this).val();
    //     console.log("ihi");
    //     $("#amountText").val(price*quantity);
        
    // });

    $('#cart_data').val(JSON.stringify(cart));
});

function onBodyLoaded() {

    $("input[name='timing']").bind("change", function (event, ui) {
        computeDiscount(event, ui);
    });

}
function computeAmount(count, price){
    var sub_amount=count*price;
    $("#amountText").val(sub_amount);
    
}
function computeDiscount(e, u) {
    var needDiscount = e.target.id == "later";
    if (needDiscount) {
        $("#dBox").show(true);
        $("#tip").hide(true);
        var discount = $("#amountText").val() * .95;
        discount = discount.toFixed(0);
        $("#dPrice").val(discount);
    } else {
        $("#dBox").hide(true);
        $("#tip").show(true);
    }
}

function addToCart(item) {

    // Retrieve the cart object from local storage
    if (localStorage && localStorage.getItem('cart')) {
        cart = JSON.parse(localStorage.getItem('cart'));            

        cart.items.push(item);
        localStorage.setItem('cart', JSON.stringify(cart));
        build_main_cart();
                
        $('.cart-close.product-trigger').click();
        $('body').animate({scrollTop:0}, '500');

    } 
}
function build_main_cart(){

    $('#cart-container').html("");
    $('#cart-item-count').html("0");
    var delivery="Right Now";
    discount="0%";

    var mob=getNumberFromBrowser();
    $('#mob-no').val(mob);
    
    if(cart.items && cart.items.length) {
        total_price=0;
        $.each(cart.items, function(index,item) {

            price=item.quantity*item.price;
            if(item.delivery=='off'){ 
                delivery="Tommorow";
                price=price* .95;
                discount="5%";
            }
            $('#cart-container').append(

                "<div class='product-preview-small'><div class='product-img'><img alt='product photo' src='http://butler.ind-cloud.everdata.com/cart/api/product/image/large?name="+item.orgName+"' width='200'></div>"+
                     "<div class='product-content'><div class='row'><div class='col-md-5'>"+
                     "<h4 class='product-title'>"+item.name+"</h4>"+
                     "<em>Delivery Time: "+delivery+"</em><br>"+
                     "<em>Discount: "+discount+"</em>"+
                     "<p>Price : &#8377; <b>" +item.price+"</b></p></div>"+
                     "<div class='col-md-4'>Quantity<div class='product-pieces'><input type='text' value='"+item.quantity+"' class='quantity'><div class='product-pieces-up'></div><div class='product-pieces-down'></div></div> Kg"+
                     "<button type='button' data-item-name='"+item.name+"' title='Remove' class='btn btn-danger btn-xs cart-remove pull-right'><i class='fa fa-times'></i></button></div><div class='col-md-3 product-price'> <b> &#8377; "+price+" </b></div>"+
                     "</div></div></div>"
            );

            total_price=total_price+price;

        });
        $('#cart-item-count').html(cart.items.length);       
        $('#cart-total').html(total_price);
        $('#cart-controls').show();

    }else{
        $('#cart-container').html('<p class="text-center message">Your shopping cart is empty!</p>');
        $('#cart-controls').hide();
    }
}

function placeOrder() {

    var no=$('input[type=text][name=mobile]').val();

    var phoneno = /^\d{10}$/;  
    if((no.match(phoneno))) {  
      saveNumberInBrowser(no);
      if(cart.items && cart.items.length) {
        $.each(cart.items, function(index,item) {

            var url = "http://butler.ind-cloud.everdata.com/cart/api/placeOrder?number=" + no + "&product=" + item.orgName + "&quantity=" + item.quantity + "&immediate=" + item.immediate;
            var appender = new Date().getTime();
            url+="&appender="+appender;
            $.ajax({
                type: 'POST',
                url: url,
                error: function (response) {
                    var status='failed';
                },
                success: function (response) {
                    var status='success';
                },
            });

        });
        if(status=='success'){
             orderResponse("Your Order placed successfully. Thank you for choosing Fishcart", false);
             localStorage.removeItem('cart');
             build_main_cart();
        }else{
             orderResponse("Not able to place the order.Please check the internet connection. You can contact us on 9605657736 if the issue persist", true);
        }
        $( ".cart-trigger" ).trigger( "click" );

      }else{
        alert("Your shopping cart is empty.");  
      }

    }else {
        $('input[type=text][name=mobile]').css('border-color','red'); 
        alert("Please Enter A valid Phone Number");  
    }
}
function orderResponse(response, isError) {
    $("#response").html(response);
    if (!isError) {
        //goes wrong with safar mobile sometimes
      document.getElementById("odr-btn").disabled = true;
    }
}
function saveNumberInBrowser(no) {
    if (typeof (Storage) !== "undefined") {
        localStorage.setItem("number", no);
    }
}
function getNumberFromBrowser() {
    if (typeof (Storage) !== "undefined") {
        return localStorage.getItem("number");
    } else {
        return "";
    }
}    
    
    

    



    
      