<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="<?php echo base_url("assets/plugins/jQuery-file-upload/js/") ?>"></script>
</head>

<body>

<form enctype="multipart/form-data" method="post" action="<?php echo base_url('test/upload') ?>">

	<input name="userfile[]" type="file" multiple />
      
      <button>do</button>

</form>


</body>
</html>