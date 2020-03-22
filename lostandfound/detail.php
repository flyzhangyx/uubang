<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CQUPT-lost&found</title>
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
	<script type="text/javascript">
            $(document).ready(function() {
                $("#min_img").click(function(){
                    var _this = $(this);//将当前的min_img元素作为_this传入函数
                    imgShow("#outerdiv", "#innerdiv", "#max_img", _this);
                });
            });
            function imgShow(outerdiv, innerdiv, max_img, _this){
                var src = _this.attr("src");//获取当前点击的min_img元素中的src属性
                $("#max_img").attr("src", src);//设置#max_img元素的src属性

                /*获取当前点击图片的真实大小，并显示弹出层及大图*/
                $("<img/>").attr("src", src).load(function(){
                    var windowW = $(window).width();//获取当前窗口宽度
                    var windowH = $(window).height();//获取当前窗口高度
                    var realWidth = this.width;//获取图片真实宽度
                    var realHeight = this.height;//获取图片真实高度
                    var imgWidth, imgHeight;
                    var scale = 0.8;//缩放尺寸，当图片真实宽度和高度大于窗口宽度和高度时进行缩放

                    if(realHeight>windowH*scale) {//判断图片高度
                        imgHeight = windowH*scale;//如大于窗口高度，图片高度进行缩放
                        imgWidth = imgHeight/realHeight*realWidth;//等比例缩放宽度
                        if(imgWidth>windowW*scale) {//如宽度扔大于窗口宽度
                            imgWidth = windowW*scale;//再对宽度进行缩放
                        }
                    } else if(realWidth>windowW*scale) {//如图片高度合适，判断图片宽度
                        imgWidth = windowW*scale;//如大于窗口宽度，图片宽度进行缩放
                        imgHeight = imgWidth/realWidth*realHeight;//等比例缩放高度
                    } else {//如果图片真实高度和宽度都符合要求，高宽不变
                        imgWidth = realWidth;
                        imgHeight = realHeight;
                    }
                    $("#max_img").css("width",imgWidth);//以最终的宽度对图片缩放

                    var w = (windowW-imgWidth)/2;//计算图片与窗口左边距
                    var h = (windowH-imgHeight)/2;//计算图片与窗口上边距
                    $(innerdiv).css({"top":h, "left":w});//设置#innerdiv的top和left属性
                    $(outerdiv).fadeIn("fast");//淡入显示#outerdiv及.pimg
                });

                $(outerdiv).click(function(){//再次点击淡出消失弹出层
                    $(this).fadeOut("fast");
                });
            }
        </script>
</head>
<body>
<div class="container top">
	<div class="row clearfix">
		<div class="col-xs-12 column" style="text-align: center;">
			<img src="images/cqupt.jpg">
			<span style="text-align:center;padding-right:65px;">失物招领</span>
		</div>
	</div>
</div>
<div style="height: 180px;"></div>
<div style="height: 50px; font-size: 40px;font-weight: bolder;padding-left: 30px;">详细信息</div>
<?php
require_once("link.php");
if (isset($_GET["id"])) {
	// $link=mysqli_connect("localhost","root","","findlost");
	$link=create_connect("findlost");
	if(!$link)
	{
		echo "<script>alett('数据库连接失败');history.back();</script>";
	}
	else
	{
		$id=$_GET['id'];
		$sql="SELECT * FROM `findpeople` WHERE id=$id";
		$result=mysqli_query($link,$sql);
		if(!$result)
		{
			echo "没有查到相关内容";
		}
		else
		{
			while($rows=mysqli_fetch_assoc($result))
			{
			echo "<div class='container detail'>
					<div class='row clearfix'>
						<div class='col-xs-12 column'>
						<div>
							<img src=".$rows['photo']." id='min_img' style='width:500px;height:400px;'>
							<center>（点击图片可查看大图）</center>
						</div>
						<div id='outerdiv' style='position:fixed;top:0;left:0;background:rgba(0,0,0,0.7);z-index:4;width:100%;height:100%;display:none;'>
							<div id='innerdiv' style='position:absolute;'>
								<img id='max_img' style='border:5px solid #fff;' src='' />
							</div>
						</div>
							<div class='text'>
								<p class='iteam'><span>名称: </span>".$rows['name']."</p>
								<p class='iteam'><span>类别: </span>".$rows['attribute']."</p>
								<p class='iteam'><span>描述: </span>".$rows['describes']."</p>
								<p class='iteam'><span>地址: </span>".$rows['findaddress']."</p>
								<p class='iteam'><span>时间: </span>".$rows['sendtime']."</p>
								<p class='iteam'><span>电话: </span>".$rows['phone']."</p>";
								if ($rows['class']==0) {
									echo "<p class='iteam'><span>拾到人：</span>".$rows['finder']."</p>";
								}
								else
								{
									echo "<p class='iteam'><span>寻物人:</span>".$rows['finder']."</p>";
								}
							echo "
							</div>
						</div>
					</div>
				</div>";
			}
		}
	}
}
?>
<div class="container bottom">
	<div class="row clearfix">
		<div class="col-xs-6 column" style="text-align: center;">
			<a href="index.php">
			<img src="images/message.png"><br />
			<span>招领广场</span></a>
		</div>
		<div class="col-xs-6 column" style="text-align: center;">
			<a href="people.php">
			<img src="images/user.png"><br/>
			<span>个人中心</span></a>
		</div>
	</div>
</div>
</body>
</html>
