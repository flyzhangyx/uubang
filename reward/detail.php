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
  			<span  style="font-size: 40px;text-align:center;padding-right:65px;">悬赏</span>
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
		echo "<script>alert('数据库连接失败');history.back();</script>";
	}
	else
	{
		$id=$_GET['id'];
		$sql="SELECT * FROM `reward` WHERE id='".$id."'";
    $sql1="SELECT * FROM `rewardcomment` WHERE belongto='".$id."'";

		$result=mysqli_query($link,$sql);
    $result1=mysqli_query($link,$sql1);
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
					$url_temp=$rows2['picpath'];
					$url=substr($url_temp,7);
				}
				else {
					$url="cat.jpg";
				}
				//echo "<script>alert('$url');</script>";
			echo "<div class='container detail'>
					<div class='row clearfix'>
						<div class='col-xs-12 column'>
            <div>
							<img src='$url' id='min_img' style='width:500px;height:600px;'>
						</div>
							<div class='text' >
              <br>
                <p class='iteam'><span>&nbsp</span></p><br>
								<p class='iteam'><span>悬赏描述:</span>".$rows['describes']."</p>
								<p class='iteam'><span>赏    金:</span>".$rows['price']."</p>
                <p class='iteam'><span>评    论:</span></p><br>";
                if(!$result1)
            		{
            			echo "没有评论";
            		}
            		else
            		{
            			while($rows1=mysqli_fetch_assoc($result1))
            			{
                    echo "<p style='font-size:15px'><span style='font-size:32px;'>".$rows1['sendtime']."</span></p><br>
                    <p class='iteam'><span style='font-size:32px;word-wrap:break-word;'>".$rows1['senduser'].':'.$rows1['content']."</span></p><br>";
                  }
                }
                echo "</div>
  						</div>
  					</div>
  				</div>
          <div class='godadd'>
             <a href='uubang://flyzhangyx/param?id=".$rows['senduser']."' style='text-decoration:none;'>联系他/她！</a>
             <a href='uubang://flyzhangyx/param?id=".$rows['senduser']."' style='text-decoration:none;'>抢单！</a>
          </div>";
			}
		}
	}
}
?>
<div style='font-size:40px; margin-bottom:10px'>
    <div style='margin:9px;border-radius:0px;'>
      <center><br><br><span>到底啦</span>
      <br><br></center>
    </div>
  </div>
<div class='container bottom'>
	<div class='row clearfix'>
		<div class='col-xs-6 column' style='text-align: center;'>
			<a href='index.php'><img src='images/message.png'><br />
			<span>悬赏主页</span>
		</div>
		<div class='col-xs-6 column' style='text-align: center;'>
			<a href='me.php'><img src='images/user.png'><br/>
			<span>个人中心</span></a>
		</div>
	</div>
</div>
</body>
</html>
