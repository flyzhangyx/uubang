<?php
require_once("link.php");
if(isset($_POST["user"]))
{
    $name=$_POST["user"];
    $data=$_FILES['photo_data']['tmp_name'];
    $sendtime=date("Y-m-d H:i:s");
    $upload_dir='reward/pic/';
    //echo $name." ".$attribute." ".$describes." ".$findaddress." ".$phone." ".$class." ".$finder." ".$photo." ".$sendtime;
    $link=create_connect("findlost");
    if(!file_exists($upload_dir))
    {
        mkdir($upload_dir,0777);
    }
    $photo=$upload_dir.$name.time().".png";
    $sql="INSERT INTO `user_info`(`user`, `picpath`, `info`) VALUES ('".$name."','".$photo."','".$sendtime."')";
    // echo $sql;
    $sql1 = "UPDATE `user_info` SET `picpath` = '$photo' WHERE `user_info`.`user` = '$name'";
    $sql2 = "SELECT *  FROM `user_info` WHERE `user` = '$name'";
    // $link=mysqli_connect("localhost","root","","findlost");
    if(!move_uploaded_file($data,$photo))
    {
        echo "<script>alert('上传头像失败!');history.back();</script>" ;
    }
    else
    {
        if(!$link)
        {
            echo "<script>alert('网络错误');history.back();</script>" ;
        }
        else
        {
            $result2=mysqli_query($link,$sql2);
            if(!$result2)
            {
                echo "<script>alert('error');</script>";
            }
            else
            {
                if(mysqli_num_rows($result2)!=0)
                {
                    $result1=mysqli_query($link,$sql1);
                    if(!$result1)
                    {
                        echo "<script>alert('更新头像失败');</script>";
                    }
                }
                else
                {
                    $result=mysqli_query($link,$sql);
                    if(!$result)
                    {
                        //echo $photo;
                        echo "<script>alert('保存头像路径失败');</script>";
                    }
                    else
                    {
                        echo "<script>alert('成功');</script>";
                    }
                }
            }
        }
    }
}
else
{
    echo "illegal";
}
?>
