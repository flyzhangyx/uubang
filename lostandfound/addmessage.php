<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CQUPT-lost&found</title>
</head>
<body>
<?php
require_once("link.php");
if(isset($_POST["name"])&&!($_COOKIE["user"]=="none")&&$_POST["name"]!="")
{
	$name=$_POST["name"];
	$attribute=$_POST["attribute"];
	$describes=$_POST["describes"];
	$findaddress=$_POST["findaddress"];
	$phone=$_POST["phone"];
	$class=$_POST["class"];
	$finder=$_COOKIE["user"];
	$data=$_FILES['photo_data']['tmp_name'];
	$sendtime=date("Y-m-d H:i:s");
	$upload_dir='pic/';
	//echo $name." ".$attribute." ".$describes." ".$findaddress." ".$phone." ".$class." ".$finder." ".$photo." ".$sendtime;
	$link=create_connect("findlost");
	if(!file_exists($upload_dir))
	{
	mkdir($upload_dir,0777);
	}
	$photo=$upload_dir.$name.time().".png";
	$sql="INSERT INTO `findpeople`(`name`, `attribute`, `describes`, `findaddress`, `sendtime`, `phone`, `finder`, `photo`, `class`) VALUES ('".$name."','".$attribute."','".$describes."','".$findaddress."','".$sendtime."','".$phone."','".$finder."','".$photo."','".$class."')";
	// echo $sql;
	// $link=mysqli_connect("localhost","root","","findlost");
	if(!move_uploaded_file($data,$photo))
	{
		echo "<script>alert('上传照片失败!');history.back();</script>" ;
	}
	else
	if(!$link)
	{
		echo "<script>alert('连接失败');history.back();</script>" ;
	}
	else
	{
		$result=mysqli_query($link,$sql);
		if(!$result)
		{
				echo $photo;
			echo "<script>alert('上传失败');</script>";
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
