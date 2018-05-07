<?php
header('Content-Type: text/html; charset=utf-8');
$number=$_POST["rootloginnumber"];
$passwd=$_POST["rootloginpass"];

$con = mysql_connect("localhost","root","123456");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("all", $con); 
$sql="select passwd,name from suser where number = '$number' ;";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
if($row['passwd']==$passwd) 
{
	echo "Login Succeed!";
	//session_start(); 
    $_SESSION['rootloginnumber'] = $rootloginnumber;  
	echo "管理员",$row['name'],' 欢迎你！进入 <a href="supersonal.php">用户中心</a><br />';
	echo '点击此处 <a href="rootquery.php?action=logout">注销</a> 登录！<br />'; 
	exit;
}
else{
	 echo "Wrong password or Wrong number!";
	exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> ');
}

if($_GET['action'] == "logout"){ 
    $_SESSION['rootloginnumber'] = $rootloginnumber;  
    echo '注销登录成功！点击此处 <a href="login.html">登录</a>'; 
    exit; 
}
?>