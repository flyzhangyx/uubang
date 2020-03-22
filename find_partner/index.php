<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>拼队友</title>
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
      			<span  style="font-size: 36px;text-align:center;padding-right:65px;">找队友</span>
      		</div>
      </div>
    <div style="height: 150px;"></div>
    <br>
    <!-- <input type="button"value="发表" text-align: center; style="border-radius: 15px;padding-top: : 20px;padding-left: 50px;background-color: white;width:15%;height:80px;border:5px pink dashed;">
    <input type="button"value="返回" text-align: center; style="padding-right: 50px;padding-top: : 20px;border-radius: 15px;background-color: white;width:15%;height:80px;border:5px pink dashed;float:right;"> -->
    <!-- <img src="cat.jpg" alt="Note" style="height:10%;width:10%;border-radius:50%;"> -->
    <?php
    require_once("link.php");
    if (isset($_POST["user"])&&$_POST["user"]!="") {
    	setcookie("user",$_POST["user"]);
    }
    //setcookie("user","test");
   if (isset($_COOKIE["user"])&&$_COOKIE["user"]!="none")
   {
    $link=create_connect("findlost");
    // $link=mysqli_connect("localhost","root","","findlost");
    if(!$link)
    {
     echo "<script>alert('数据库连接失败');</script>";
    }
    else
    {
      $sql="SELECT * FROM findpartner ORDER BY sendtime DESC";
      $result=mysqli_query($link,$sql);
      while ($rows=mysqli_fetch_assoc($result))
      {
       echo "
        <div style='font-size:40px; margin-bottom:10px'>
                <div style='border:2px dashed #ebcce8;margin:9px;border-radius:10px;'>
                <center>
                <div style='height:15px;'>
                </div>
                    <p><span>比赛名称: </span>".$rows['contest']."</p>
                    <p><span>我的专业: </span>".$rows['major']."</p>
                    <div class='godadd'>
                       <a href='detail.php?id=".$rows['id']."'>详情</a>
                    </div>
                    <div style='height:10px;'>
                    </div>
                </center>
            </div>
            </div>
       ";
      }
    }
  }
    else {
       //echo "<script>alert('Illegal');</script>";
    }
?>
<div style='font-size:40px; margin-bottom:10px'>
    <div style='border:2px dashed #ebcce8;margin:9px;border-radius:10px;'>
      <center><br><span>到底啦</span>
      <br><br></center>
    </div>
  </div>
<div class='container bottom'>
	<div class='row clearfix'>
		<div class='col-xs-6 column' style='text-align: center;'>
			<img src='images/message.png'><br />
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
