<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>uubangr</title>
      <link rel="stylesheet" href="where.css">
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="css/style.css">
    	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="js/jquery/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="js/index.js"></script>
  </head>
  <body>
      <div class="topdetail">
      		<div class="columndetail" style="text-align: center;">
      			<!-- <img src="images/cqupt.jpg"> -->
      			<span  style="font-size: 36px;text-align:center;padding-right:65px;">悬赏帮</span>
      		</div>
      </div>
    <div style="height: 150px;"></div>
    <br>
<div class="info">
	账号：<?php echo $_COOKIE["user"]; ?><br>
  赏金：<?php echo "￥150"; ?><input type="button" value="提现申请" style="border-radius:15px;background-color:rgb(215, 197, 231)">
</div>
<center>
<div style="margin-top: 100px;"><a href="guanli.php">管理我的发布<img src="images/add.png"></a></div>
<!-- <div ><a href="guanli.php">我发布的<img src="images/delete.png"></a></div> -->
</center>
<div class='container bottom'>
	<div class='row clearfix'>
		<div class='col-xs-6 column' style='text-align: center;'>
			<a href='index.php'><img src='images/message.png'><br />
			<span>悬赏主页</span>
		</div>
		<div class='col-xs-6 column' style='text-align: center;'>
			<img src='images/user.png'><br/>
			<span>个人中心</span></a>
		</div>
	</div>
</div>
</body>
</html>
