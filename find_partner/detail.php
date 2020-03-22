<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CQUPT-uubang</title>
  <link rel="stylesheet" href="where.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		.detail p
		{
			font-size: 40px;
			width: 80%;
			text-align: left;
		}
		.detail span
		{
			font-size: 40px;
			font-weight: bolder;
			margin-right: 20px;
		}
	</style>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
</head>
<body>
  <div class="topdetail">
  		<div class="columndetail" style="text-align: center;">
  			<!-- <img src="images/cqupt.jpg"> -->
  			<span  style="font-size: 40px;text-align:center;padding-right:65px;">找队友</span>
  		</div>
  </div>
<div style="height: 180px;"></div>
<div style="height: 50px; font-size: 40px;font-weight: bolder;padding-left: 30px;">详细信息</div>
<?php
require_once("link.php");
if (isset($_GET["id"])) {
	$link=create_connect("findlost");
	if(!$link)
	{
		echo "<script>alett('数据库连接失败');history.back();</script>";
	}
	else
	{
		$id=$_GET['id'];
		$sql="SELECT * FROM `findpartner` WHERE id=$id";
		$result=mysqli_query($link,$sql);
		if(!$result)
		{
			echo "没有查到相关内容";
		}
		else
		{
			while($rows=mysqli_fetch_assoc($result))
			{
				$sql2="SELECT * FROM `user_info` WHERE user='".$rows['senduser']."'";
				$result2=mysqli_query($link,$sql2);
				if(!$result2)
				{
					$url="cat.jpg";
				}
				else if(mysqli_num_rows($result2)>0){
					$rows2=mysqli_fetch_assoc($result2);

					$url=$rows2['picpath'];
				}
				else {
					$url="cat.jpg";
				}
			echo "<div class='container detail'>
					<div class='row clearfix'>
						<div class='col-xs-12 column'>
            <div>
							<img src='$url' id='min_img' style='width:500px;height:400px;'>
						</div>
							<div class='text' >
              <br>
                <p class='iteam'><span>&nbsp</span></p><br>
								<p class='iteam'><span>名    字: </span>".$rows['name']."</p>
								<p class='iteam'><span>性    别: </span>".$rows['sex']."</p>
								<p class='iteam'><span>专    业: </span>".$rows['major']."</p>
								<p class='iteam'><span>比赛类型: </span>".$rows['contest']."</p>
								<p class='iteam'><span>要    求: </span>".$rows['request']."</p>
								<p class='iteam'><span>个人长处: </span>".$rows['strength']."</p>
							</div>
						</div>
					</div>
				</div>
        <div class='godadd'>
           <a href='uubang://flyzhangyx/param?id=".$rows['senduser']."'>联系他/她！</a>
        </div>
        ";
			}
		}
	}
}
?>
<div class='container bottom'>
	<div class='row clearfix'>
		<div class='col-xs-6 column' style='text-align: center;'>
			<a href='index.php'><img src='images/message.png'><br />
			<span>找队友</span>
		</div>
		<div class='col-xs-6 column' style='text-align: center;'>
			<a href='me.php'><img src='images/user.png'><br/>
			<span>个人中心</span></a>
		</div>
	</div>
</div>
</body>
</html>
