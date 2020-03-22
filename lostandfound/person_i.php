<div class="info">
	账号：<?php echo $_COOKIE["user"]; ?><input type="button" style="border-radius:15px;" value="注销" class="button" onclick="Login_out();">
</div>
<center>
<div class="people" style="margin-top: 100px;"><a href="findthing.php">我丢失了物品  <img src="images/more.png"></a></div>
<div class="people"><a href="findpeople.php">我拾到了物品  <img src="images/more.png"></a></div>
<div class="people"><a href="guanli.php">管理我发布的信息  <img src="images/more.png"></a></div>
</center>
<div class="container bottom">
	<div class="row clearfix">
		<div class="col-xs-6 column" style="text-align: center;">
			<a href="index.php">
			<img src="images/message.png"><br />
			<span>招领广场</span></a>
		</div>
		<div class="col-xs-6 column" style="text-align: center;">
			<img src="images/user.png"><br/>
			<span>个人中心</span>
		</div>
	</div>
</div>
<script type="text/javascript">
  function Login_out()
  {
    clearCookie("user");
    alert('退出成功!');
    window.location.reload();
  }
  </script>
</body>
</html>
