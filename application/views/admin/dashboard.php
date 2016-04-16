<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Client Connect Admin</title>

    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="assets/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="assets/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="assets/admin/css/animate.css" rel="stylesheet">
    <link href="assets/admin/css/style.css" rel="stylesheet">
    <link href="assets/admin/css/my_style.css" rel="stylesheet">

    <!-- Mainly scripts -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
		var sobj = { 'fn': {} , 'var': {} };
	</script>
    <!-- Admin script -->
    <script src="assets/admin/js/script.js"></script>


</head>
<body class="">

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu sidebar-menu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image"  src="assets/admin/images/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">MidhunLal</strong>
                             </span> <span class="text-muted text-xs block">Admin<b class="caret"></b></span> </span> 
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="process/profile" class="ajax-link">Profile</a></li>
                            <li><a href="process/password_reset" class="ajax-link">Password Reset</a></li>
                            <li class="divider"></li>
                            <li><a href="dashboard/signout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        CC
                    </div>
                </li>
                <li>
                    <a href="process/dashboard" class="ajax-link"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li>
                    <a href="process/users" class="ajax-link"><i class="fa fa-users"></i> <span class="nav-label">Users</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="graph_flot.html">Flot Charts</a></li>
                        <li><a href="graph_morris.html">Morris.js Charts</a></li>
                        <li><a href="graph_rickshaw.html">Rickshaw Charts</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to Client Connect</span>
                </li>
                <li>
                    <a href="dashboard/signout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div id="top-holder"></div>
            <div id="content-id">
            	
            </div>

            <div class="footer">
                <div>
                    <strong>Copyright</strong> <a href="http://qzion.com" target="_blank">Qzion Technologies</a> &copy; 2016-2017
                </div>
            </div>

        </div>
        </div>

    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="assets/plugins/flot/jquery.flot.spline.js"></script>
    <script src="assets/plugins/flot/jquery.flot.resize.js"></script>
    <script src="assets/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="assets/plugins/peity/jquery.peity.min.js"></script>
    <script src="assets/admin/js/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="assets/admin/js/inspinia.js"></script>
    <script src="assets/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="assets/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="assets/admin/js/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="assets/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="assets/plugins/toastr/toastr.min.js"></script>

</body>

</html>
