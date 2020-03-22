<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>上传头像</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript">
		function checkdata()
		{
			if (document.add.photo_data.value.length!=0)
			{
				var file = document.add.photo_data.value;
                if (file == null||file == ""){
                     alert("请选择要上传的图片!");
                     return false;
                }
                if (file.lastIndexOf('.')==-1){    //如果不存在"."
                    alert("路径不正确!");
                    return false;
                }
                var AllImgExt=".jpg|.jpeg|.gif|.bmp|.png|";
                var extName = file.substring(file.lastIndexOf(".")).toLowerCase();//（把路径中的所有字母全部转换为小写）
                if(AllImgExt.indexOf(extName+"|")==-1)
                {
                    ErrMsg="该文件类型不允许上传。请上传 "+AllImgExt+" 类型的文件，当前文件类型为"+extName;
                    alert(ErrMsg);
                    return false;
                }
				add.submit();
			}
			else
			{
				alert("请选择图片");
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
			border-radius: 20px;
			border:3px solid blue;
		}
		#file
		{
			text-align: center;
		}
	</style>
</head>
<body>
<div class="container top">
	<div class="row clearfix">
		<div class="col-xs-12 column" style="text-align: center;">
			<img src="images/cqupt.jpg">
			<span style="text-align:center;padding-right:65px;">头像上传</span>
		</div>
	</div>
</div>
<div style="height:350px;"></div>
<div style="font-size: 40px;font-weight: bolder;padding: 30px;"></div>
<div class="adds">
	<form name="add" action="add_userhead2server.php" method="post" enctype="multipart/form-data">
		<!-- <input type="text" name="phone" placeholder="输入联系方式"><br> -->
		<center>
		<input type="file" name="photo_data" ><br>
	</center>
  <?php
    if(isset($_POST["user"]))
    {

     $user=$_POST['user'];
    //$user="test";
	echo "<input type='hidden' name='user' value=".$user.">
		<input type='button' value='上传' class='button' onclick='checkdata()'>
	</form>
</div>
";
}
else {
  // code...
}
?>
<div style='padding-bottom: 200px;padding-top: 30px; font-size: 40px;padding-left: 20px;'>
	我是有底线的
</div>

</body>
</html>
