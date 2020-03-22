<?php
require_once("link.php");
if(isset($_COOKIE["user"])&&!($_COOKIE["user"]=="none"))
{
	// $name=$_POST["name"];
	// $sex=$_POST["sex"];
	// $major=$_POST["major"];
	// $request=$_POST["request"];
	// $strength=$_POST["strength"];
//	$class=$_POST["class"];
  $senduser=$_COOKIE["user"];
	//$senduser="123456";
	$content=$_POST["describes"];
	//$data=$_FILES['photo_data']['tmp_name'];
	$sendtime=date("Y-m-d H:i:s");
	$price=$_POST["price"];
	//$upload_dir='pic/';
	//echo $name." ".$attribute." ".$describes." ".$findaddress." ".$phone." ".$class." ".$finder." ".$photo." ".$sendtime;
	$link=create_connect("findlost");
	// if(!file_exists($upload_dir))
	// {
	// mkdir($upload_dir,0777);
	// }
	 //$post=array('WIDsubject'=>"悬赏付款",'WIDtotal_amount'=>$price);



	//$con2=login_post("/alipay/wappay/pay.php","",http_build_query($post),"");
	$sql="INSERT INTO `reward` (`describes`, `price`, `senduser`, `sendtime`) VALUES ('".$content."','".$price."','".$senduser."','".$sendtime."')";
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
				//echo $name.$sex.$senduser.$strength;
			echo "<script>alert('发送失败');</script>";
		}
		else
		{
			//echo $con2;
			//echo "<script>window.location.href='index.php';</script>";

		}
	}
}else {
	   echo "<script>window.location.href='index.php';</script>";
}
?>
<?php
/* *
 * 功能：支付宝手机网站支付接口(alipay.trade.wap.pay)接口调试入口页面
 * 版本：2.0
 * 修改日期：2016-11-01
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 请确保项目文件有可写权限，不然打印不了日志。
 */

header("Content-type: text/html; charset=utf-8");


require_once dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'alipay/wappay/service/AlipayTradeService.php';
require_once dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php';
require dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'/alipay/config.php';
if (!empty($_POST['WIDout_trade_no'])&& trim($_POST['WIDout_trade_no'])!=""){
    //商户订单号，商户网站订单系统中唯一订单号，必填
    $out_trade_no = $_POST['WIDout_trade_no'];

    //订单名称，必填
    $subject = "悬赏付款";

    //付款金额，必填
    $total_amount = $_POST['price'];

    //商品描述，可空
    $body = "悬赏"; //$_POST['WIDbody'];

    //超时时间
    $timeout_express="1m";

    $payRequestBuilder = new AlipayTradeWapPayContentBuilder();
    $payRequestBuilder->setBody($body);
    $payRequestBuilder->setSubject($subject);
    $payRequestBuilder->setOutTradeNo($out_trade_no);
    $payRequestBuilder->setTotalAmount($total_amount);
    $payRequestBuilder->setTimeExpress($timeout_express);

    $payResponse = new AlipayTradeService($config);
    $result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);

    return ;
}
?>
<!DOCTYPE html>
<html>
	<head>
	<title>支付宝手机网站支付接口</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
    *{
        margin:0;
        padding:0;
    }
    ul,ol{
        list-style:none;
    }
    body{
        font-family: "Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
    }
    .hidden{
        display:none;
    }
    .new-btn-login-sp{
        padding: 1px;
        display: inline-block;
        width: 75%;
    }
    .new-btn-login {
        background-color: #02aaf1;
        color: #FFFFFF;
        font-weight: bold;
        border: none;
        width: 100%;
        height: 30px;
        border-radius: 5px;
        font-size: 16px;
    }
    #main{
        width:100%;
        margin:0 auto;
        font-size:14px;
    }
    .red-star{
        color:#f00;
        width:10px;
        display:inline-block;
    }
    .null-star{
        color:#fff;
    }
    .content{
        margin-top:5px;
    }
    .content dt{
        width:100px;
        display:inline-block;
        float: left;
        margin-left: 20px;
        color: #666;
        font-size: 13px;
        margin-top: 8px;
    }
    .content dd{
        margin-left:120px;
        margin-bottom:5px;
    }
    .content dd input {
        width: 85%;
        height: 28px;
        border: 0;
        -webkit-border-radius: 0;
        -webkit-appearance: none;
    }
    #foot{
        margin-top:10px;
        position: absolute;
        bottom: 15px;
        width: 100%;
    }
    .foot-ul{
        width: 100%;
    }
    .foot-ul li {
        width: 100%;
        text-align:center;
        color: #666;
    }
    .note-help {
        color: #999999;
        font-size: 12px;
        line-height: 130%;
        margin-top: 5px;
        width: 100%;
        display: block;
    }
    #btn-dd{
        margin: 20px;
        text-align: center;
    }
    .foot-ul{
        width: 100%;
    }
    .one_line{
        display: block;
        height: 1px;
        border: 0;
        border-top: 1px solid #eeeeee;
        width: 100%;
        margin-left: 20px;
    }
    .am-header {
        display: -webkit-box;
        display: -ms-flexbox;
        display: box;
        width: 100%;
        position: relative;
        padding: 7px 0;
        -webkit-box-sizing: border-box;
        -ms-box-sizing: border-box;
        box-sizing: border-box;
        background: #1D222D;
        height: 50px;
        text-align: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        box-pack: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        box-align: center;
    }
    .am-header h1 {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        box-flex: 1;
        line-height: 18px;
        text-align: center;
        font-size: 18px;
        font-weight: 300;
        color: #fff;
    }
</style>
</head>
<body text=#000000 bgColor="#ffffff" leftMargin=0 topMargin=4>
<header class="am-header">
        <h1>支付宝手机网站支付接口快速通道(接口名：alipay.trade.wap.pay)</h1>
</header>
<div id="main">
        <form name=alipayment action='' method=post target="_blank">
            <div id="body" style="clear:left">
                <dl class="content">
                    <dt>商户订单号
：</dt>
                    <dd>
                        <input id="WIDout_trade_no" name="WIDout_trade_no" />
                    </dd>
                    <hr class="one_line">
                    <dt>订单名称
：</dt>
                    <dd>
                        <input id="WIDsubject" name="WIDsubject" />
                    </dd>
                    <hr class="one_line">
                    <dt>付款金额
：</dt>
                    <dd>
                        <input id="WIDtotal_amount" name="WIDtotal_amount" />
                    </dd>
                    <hr class="one_line">
                    <dt>商品描述：</dt>
                    <dd>
                        <input id="WIDbody" name="WIDbody" />
                    </dd>
                    <hr class="one_line">
                    <dt></dt>
                    <dd id="btn-dd">
                        <span class="new-btn-login-sp">
                            <button class="new-btn-login" type="submit" style="text-align:center;">确 认</button>
                        </span>
                        <span class="note-help">如果您点击“确认”按钮，即表示您同意该次的执行操作。</span>
                    </dd>
                </dl>
            </div>
		</form>
        <div id="foot">
			<ul class="foot-ul">
				<li>
					支付宝版权所有 2015-2018 ALIPAY.COM
				</li>
			</ul>
		</div>
	</div>
</body>
<!-- <script language="javascript">
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
		document.getElementById("WIDsubject").value = ;
		document.getElementById("WIDtotal_amount").value =;
        document.getElementById("WIDbody").value = "悬赏";
	}
	GetDateNow();
</script> -->
</html>

</body>
</html>
