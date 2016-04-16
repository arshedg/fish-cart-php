<!DOCTYPE html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" xml:lang="en-gb" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <base href="<?php echo base_url() ?>" />
    <!--[if lt IE 9]> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Aleš Trunda alestrunda.cz">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fishcart | Home</title>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->    
    <!-- Icon-Font -->
    <!-- Bootstrap core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">   
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!--[if IE 7]>
        <link rel="stylesheet" href="assets/font-awesome/font-awesome/css/font-awesome-ie7.min.css" type="text/css">
    <![endif]-->
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Vollkorn:400,700,400italic,700italic%7CPlayfair+Display:400,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="assets/plugins/owl-carousel2/assets/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/plugins/flexslider/flexslider.css" type="text/css">
    <link rel="stylesheet" href="assets/plugins/lightbox/css/lightbox.css" type="text/css">
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
    <link rel="stylesheet" href="assets/css/white.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!-- Mainly scripts -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/custom.js"></script>
    <script src="assets/js/my_script.js"></script>
    <script type="text/javascript">
        var sobj = { 'fn': {} , 'var': {} };
    </script>
    <script>
        $("body").ready(onBodyLoaded);

        jQuery(document).ready(function() {
            var type='<?php echo "#".$type; ?>';
            $( "li" ).removeClass( "active" );
            $(type).attr("class", "active");
        
        });
    </script>
    <script type="text/javascript" src="assets/js/modernizr-custom.min.js"></script>
</head>

<body>
    <div id="page-loader" class="bg-pattern bg-white">
        <div class="page-loader-content">
            <div class="page-loader-text"><img src="assets/images/load.gif"></div>
        </div>
    </div><!-- #page-loader -->
    
    <div id="screen-cover"></div>
    
    <header class="page-header page-header-normal">
        <div class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <em><span class="text-uppercase">For any queries</span> Please Call: 
                        <span style="color:#f4cd03">+91 9605 657736</span> </em>
                    </div>
                    <div class="col-xs-6 text-right">
                        Welcome Guest, <a >Email</a> : <a>asilgulsar@gmail.com</a>
                    </div>
                </div>
            </div>
        </div><!-- .page-top -->
        <div id="main-navigation-container">
            <div id="main-navigation-inner">
                <div class="container">
                    <div class="relative-container clearfix">
                        <div id="main-navigation-button"><i class="fa fa-reorder"></i></div>
                        <a href="home">
                        <div class="pull-left">
                            <div class="centered-columns">
                                <div class="centered-column">
                                    <img class="page-logo" alt="fishcart-logo" src="assets/images/logo.png">
                                </div>
                                <div class="centered-column hidden-xs">
                                    <h1 class="site-name">FISHCART</h1>
                                    <h4 class="site-name-info">Online Fish Delivery.</h4>
                                </div>
                            </div>
                        </div>
                        </a>
                        <nav id="main-navigation">
                            <ul id="one-page-nav">
                                <li id="fish"><a href="fish">Fish</a></li>
                                <li id="chicken"><a href="chicken">Chicken</a></li>
                                <li id="mutton"><a href="mutton">Mutton</a></li>
                                <li id="beef"><a href="beef">Beef</a></li>
                                <li id="about"><a href="about">About Us</a></li>
                                <li id="contact"><a href="contact">Contact</a></li>
                                <li>
                                    <div class="menu-item has-small-label cart-trigger"><i class="fa fa-shopping-cart"></i><span class="small-label"><span  id="cart-item-count"></span></span></div>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- .relative-container -->
                </div><!-- .container -->
            </div><!-- #main-navigation-inner -->
        </div><!-- #main-navigation-container -->
        <div id="main-navigation-placeholder"></div>
    </header>
    
