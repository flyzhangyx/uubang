<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CQUPT-Find Partner</title>
</head>
<body>
<?php
require_once("link.php");
if(isset($_POST["name"])&&!($_COOKIE["user"]=="none")&&$_POST["name"]!="")
{
	$name=$_POST["name"];
	$sex=$_POST["sex"];
	$major=$_POST["major"];
	$request=$_POST["request"];
	$strength=$_POST["strength"];
//	$class=$_POST["class"];
  $senduser=$_COOKIE["user"];
	//$senduser="123456";
	$contest=$_POST["contest"];
	//$data=$_FILES['photo_data']['tmp_name'];
	$sendtime=date("Y-m-d H:i:s");
	//$upload_dir='pic/';
	//echo $name." ".$attribute." ".$describes." ".$findaddress." ".$phone." ".$class." ".$finder." ".$photo." ".$sendtime;
	$link=create_connect("findlost");
	// if(!file_exists($upload_dir))
	// {
	// mkdir($upload_dir,0777);
	// }

	$sql="INSERT INTO `findpartner`( `name`, `sex`, `major`, `contest`, `sendtime`, `request`, `strength`, `senduser`) VALUES ('".$name."','".$sex."','".$major."','".$contest."','".$sendtime."','".$request."','".$strength."','".$senduser."')";
	// echo $sql;
	// $link=mysqli_connect("localhost","root","","findlost");
	// if(!move_uploaded_file($data,$photo))
	// {
	// 	echo "<script>alert('上传照片失败!');history.back();</script>" ;
	// }
	// else
	if(!$link)
	{
		echo "<script>alert('连接失败');history.back();</script>" ;
	}
	else
	{
		$result=mysqli_query($link,$sql);
		if(!$result)
		{
				//echo $photo;
				echo $name.$sex.$senduser.$strength;
			echo "<script>alert('发送失败');</script>";
		}
		else
		{
			echo "<script>window.location.href='index.php';</script>";
		}
	}
}else {
	   echo "<script>window.location.href='index.php';</script>";
}
?>
</body>
</html>
