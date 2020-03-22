<?php
function login_post($url,$cookie,$post,$fromurl)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.125 Safari/537.36');
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER,true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  //不自动输出数据，要echo才行//
  curl_setopt($ch, CURLOPT_COOKIEFILE,$cookie);
  curl_setopt($ch, CURLOPT_COOKIE,$cookie);
  if($post!="")
  {
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);  //重要，抓取跳转后数据
    curl_setopt($ch,CURLOPT_POSTFIELDS,$post);  //post提交数据
  }
  else
  {
    curl_setopt($ch, CURLOPT_REFERER,$fromurl);
    curl_setopt($ch,CURLOPT_BINARYTRANSFER,true);
  }
  $result=curl_exec($ch);
  curl_close($ch);
  return $result;
}//curl请求
 ?>
