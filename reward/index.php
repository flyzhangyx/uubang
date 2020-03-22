<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>帮一帮</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="css/style.css">
    	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="js/jquery/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="js/index.js"></script>
      <script type="text/javascript">
    		function checkdata()
    		{
	// 　　      var name = $("#comment").val();
	// 　        if(name == null || name == "" ){
	// 　　　       alert("评论内容不能为空");　　
  //           }else
  //             {
                  comm.submit();
            //  }

　　}
    	</script>
  </head>
  <body>
    <div id="header">
    <h1>打  赏  帮</h1>
  </div>
  <br>
  <a href="reward.php" style="text-decoration:none;"><input type="button"value="发表"style="font-size:30px;background-color: white;width:30%;height:30%;border:5px green dashed;"></a>
  <a href="me.php" style="text-decoration:none;"><input type="button"value="个人"style="font-size:30px;background-color: white;width:30%;height:30%;border:5px green dashed;float:right;"></a>
 <br>
  <div style="height: 20px;"></div>
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
  $sql="SELECT * FROM `reward` ORDER BY `sendtime` DESC";
  $result=mysqli_query($link,$sql);
  while ($rows=mysqli_fetch_assoc($result))
  {
   echo "<div style='font-size:40px; margin-bottom:10px'>
           <div style='border:2px dashed #ebcce8;margin:9px;border-radius:10px;'>
           <center>
           <span>内容详情:</span>
            <div width='100%' style='tex-align:center;word-wrap:break-word;'>".$rows['describes']."
            </div>
            <div class='godprice'><span>悬赏金额:￥ </span>".$rows['price']."</div>
            <a href='detail.php?id=".$rows['id']."' style='text-decoration:none;'> <input class='godadd' type='button'value='详情'></a></center>
            <center>  <form name='comm' action='comment.php'  target='frameName'  method='post'>
                 <input type='hidden' name='id' value=".$rows['id'].">
                 <input type='hidden' name='name' value=".$rows['senduser'].">
                 <input maxlength='40' type='text' name='comment' required='required' placeholder='最多评论40字' style='overflow:visible;'>
	               <input type='submit' value='评论'  >
              </form>
              </center>";
              $sql1="SELECT * FROM `rewardcomment` WHERE `belongto`='".$rows['id']."'";
              $result1=mysqli_query($link,$sql1);
              if(!$result1)
              {
                echo "拉取评论失败";
              }
              else{
                while($rows1=mysqli_fetch_assoc($result1))
          			{
                echo "<span style='font-size:20px;word-wrap:break-word;padding:0 0 0 10px'>".$rows1['senduser']."</span><span style='font-size:20px;word-wrap:break-word;'>:</span><span style='font-size:20px;word-wrap:break-word;'>".$rows1['content']."</span><br>";
                }
              }
        echo " </div>
        </div>";
      }
    }
  }else {
    echo "illegal";
  }
?>
<br>
<br>
</body>
</html>
