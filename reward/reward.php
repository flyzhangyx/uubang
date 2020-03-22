<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>uubang</title>
      <!-- <script src="gg.js"></script> -->
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="css/style.css">
    	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="js/index.js"></script>
      <script type="text/javascript">
    		function checkdata()
    		{
    			if (document.add.price.value.length!=0)//&&document.add.$request.length!=0&&document.add.strength.length!=0&&document.add.contest.value.length!=0
    			{
    				add.submit();
    			}
    			else
    			{
    				alert("填全信息");
    			}

    		}
    	</script>

    	<style type="text/css">
    		.adds
    		{
    			width: 100%;
    			margin-top: 30px;
    			text-align: center;
    		}
    		.adds input
    		{
    			width: 80%;
    			height: 100px;
    			font-size: 40px;
    			padding: 20px;
    			margin-top: 20px;
    			border-radius: 10px;
    			border:5px solid #2f6baa;
    		}
        body{
          background-color: #dde9eb
        }
        #submitbutton
    		{
    			width: 36%;
    			height: 120px;
    			font-size: 50px;
    			padding: 20px;
    			margin-top: 40px;
    			border-radius: 15px;
    			border:9px pink dashed;
          background-color: #f7f7f7
    		}
        .adds textarea
    		{
    			width: 80%;
    			height: 100px;
    			font-size: 40px;
    			padding: 20px;
    			margin-top: 20px;
    			border-radius: 10px;
    			border:5px solid #2f6baa;
    		}
    	</style>
  </head>
  <body>
    <div class="container top" >
    	<div class="row clearfix">
    		<div class="col-xs-12 column" style="text-align: center;">
    			<img src="images/cqupt.jpg" >
          <span style="text-align:center;padding-right:65px;" >邮你帮</span>
    		</div>
    	</div>
    </div>
    <div style="height: 150px;"></div>
    <div style="font-size: 40px;font-weight: bolder;padding: 30px;">发布悬赏消息</div>
    <!-- <div style="font-size: 40px;font-weight: bolder;padding: 30px;">
      <center>
    <button value="返回"style="background-color: white; width:20%;height:70px;border-radius:15px;border:5px pink dashed;">返回</button>
    </center></div> -->
<div class="adds">
  <center>

<br>
 <img src="cat.jpg" alt="Note" style="height:20%;width:20%;border-radius:50%;">
   <form name="add" action="new_reward.php" method="post">


   <!-- <input type="text"name="name"required="required" placeholder="名字" style="overflow:visible;">
   <br> -->


   <!-- <input type="text"name="sex"required="required" placeholder="性别" style="overflow:visible;">
   <br> -->


    <input type="hidden" id="WIDout_trade_no"  name="WIDout_trade_no" >
   <br>

   <input type="text" name="price" required="required" placeholder="悬赏金额" style="overflow:visible;">
   <br>

   <textarea row="3" cols="18" width ="80%"name="content" maxlength="100"placeholder="悬赏内容"required></textarea>

   <br>
   <!-- <textarea row="3" cols="18" name="strength" width="80%" maxlength="100" placeholder="个人优势" required></textarea> -->
   <input type="button" value="发布" id="submitbutton" onclick="checkdata()">
   </form>
 </center>
 <br>
</div>
<div style='font-size:40px; margin-bottom:10px'>
    <div style='margin:9px;border-radius:0px;'>
      <center><br><span>到底啦</span>
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
<script language="javascript">
	function GetDateNow() {
		var vNow = new Date();
		var sNow = "";
		sNow += String(vNow.getFullYear());
		sNow += String(vNow.getMonth() + 1);
		sNow += String(vNow.getDate());
		sNow += String(vNow.getHours());
		sNow += String(vNow.getMinutes());
		sNow += String(vNow.getSeconds());
		sNow += String(vNow.getMilliseconds());
		document.getElementById("WIDout_trade_no").value =  sNow;
		//document.getElementById("WIDsubject").value = "测试";
	//	document.getElementById("WIDtotal_amount").value = "0.01";
      //  document.getElementById("WIDbody").value = "购买测试商品0.01元";
	}
 GetDateNow();
</script>
  </body>
  </html>
