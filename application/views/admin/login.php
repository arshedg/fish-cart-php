<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url() ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Client Connect | Login</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="assets/admin/css/animate.css" rel="stylesheet">
    <link href="assets/admin/css/style.css" rel="stylesheet">
    <link href="assets/admin/css/my_style.css" rel="stylesheet">
</head>

<body class="gray-bg login-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">CC</h1>
            </div>
            <h3>Welcome to Client Connect</h3>
            <p>Login in. To see it in action.</p>
            <?php if(isset($error)) echo "<p>Error !</p>"; ?>
            <form class="m-t" role="form" action="<?php echo site_url('admin/login/submit'); ?>" method="POST" >
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Username" required name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required name="password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
            <p class="m-t"> <small>Client Connect Powered By: Qzion Technologies &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>