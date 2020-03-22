<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CQUPT-lost&found</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript">
	function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires+"; path=/";//path=/是根路径
}
function clearCookie(name) {
    setCookie(name, "none", 1);
}

	</script>

</head>
<body>
<div class="container top">
	<div class="row clearfix">
		<div class="col-xs-12 column" style="text-align: center;">
			<img src="images/cqupt.jpg">
			<span style="text-align:center;padding-right:65px;">失物招领</span>
		</div>
	</div>
</div>
<div style="height: 150px;"></div>
<?php
	if($_COOKIE["user"]=="none")
	{
		require("exit_login_button.php");
	}
	else {
		require("person_i.php");
	}
	?>
