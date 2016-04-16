    <div class="page-title-img">
        <img class="img-full" alt="page title img" src="assets/images/headers/meat.png">
        <div class="page-title">
            <div class="container">
                <h1>Contact</h1>
                <p>Keep in Touch</p>
            </div><!-- .container -->
        </div>
    </div><!-- .page-title-img -->
    
    <section>
    	<div class="container">
            <h3 class="text-center text-uppercase">Find our store near you</h3>
            <div class="row">
                <iframe src="https://www.google.com/maps/d/embed?mid=z_Jro_HxBju4.kFPCXq4f3SFo" style="width:100%; height:400px;"></iframe>
            </div>
            <div class="row">
            	<div class="col-md-8">
                    <h3 class="text-uppercase">Say Hello!</h3>
                    <form id="form-contact" class="form-big" action="enquiry" method="post">                   
                        <div class="row">
                        	<div class="col-sm-6">
                        		<input type="text" name="u_name" placeholder="Your Name" required>
                        	</div>
                            <div class="col-sm-6">
                        		<input type="text" name="u_phone" placeholder="Your Phone" required>
                        	</div>
                       	</div>
                        <input type="email" name="u_email" placeholder="Your Email" required>
                        <textarea name="msg" placeholder="Your message" required></textarea>
                        <div id="contact-results"></div>
                        <div class="text-right">
                            <input class="button-yellow button-text-low button-long button-low btn-mail" type="submit" value="Submit">
                        </div>
                    </form>
                    <div class="margin-20"></div>
        		</div>
                <div class="col-md-4">
           			<h3 class="text-uppercase">Information</h3>
                    <address class="address-big">
                    	<p>
                            Fishcart Head Office<br>
                            #5, Netaji Nagar Colony, Kotooli<br>
                            Calicut, Kerala
                        </p>
                        <p>
                            Contact Person: Asil Gulsar<br>
                            Phone: +91 9605 657736<br>
                            Email: asilgulsar@gmail.com
                    	</p>
                    </address>
                </div>
           	</div>
        </div><!-- .container -->
  	</section>

    <!-- Script for menu active class and ajax contact -->
    <script>
        jQuery(document).ready(function() {
            
            $(".btn-mail").click(function(e){

                var proceed= true;
                $("#form-contact input[required], #form-contact textarea[required]").each(function(){
                    if(!$.trim($(this).val())) {
                        $(this).css('border-color','red');
                        proceed= false;
                    }
                });

                var email_reg =/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if(!email_reg.test($.trim($("#email").val()))) {
                    $("#email").css('border-color', 'red');
                    proceed= false;
                }

                $url= $("#form-contact").attr('action');

                if(proceed){
                    post_data = {
                        'u_name'  : $('input[name=u_name]').val(),
                        'u_mail' :$('input[name=u_email]').val(),
                        'u_phone' : $('input[name=u_phone]').val(),
                        'u_msg'    : $('textarea[name=msg]').val()
                    };

                    $("#form-contact #contact-results").html("<div class='loading'>Sending message : <img src='assets/images/loading.gif'></div>");

                    $.post($url, post_data, function(response){
                        if(response.type=='error') {
                            output ='<div class="alert alert-danger alert-dismissable text-center" role="alert">'+
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                    '<span aria-hidden="true">&times;</span>'+
                                    '</button>'+response.text+'</div>';
                        } else {
                            output ='<div class="alert alert-success alert-dismissable text-center" role="alert">'+
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                    '<span aria-hidden="true">&times;</span>'+
                                    '</button>'+response.text+'</div>';

                            $("#form-contact input[required], #form-contact textarea[required]").val('');
                            
                        }
                        $(".loading").remove();
                        $("#form-contact #contact-results").html(output);
                    }, 'json');
                }
                e.preventDefault();
            });

            $("#form-contact input[required], #form-contact textarea[required]").keyup(function(){
                $(this).css('border-color', '');
            });
        });
   </script>
   <!-- Script for menu active class and ajax contact end -->