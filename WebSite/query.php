<?php
header('Content-Type: text/html; charset=utf-8');
$number=$_POST["userloginnumber"];
$passwd=$_POST["userloginpass"];

$con = mysql_connect("localhost","root","123456");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("all", $con); 
$sql="select passwd,name from user where number = '$number' ;";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
if($row['passwd']==$passwd) 
{
	echo "Login Succeed!";
	//session_start(); 
    $_SESSION['userloginnumber'] = $userloginnumber;  
	echo $row['name'],' 欢迎你！进入 <a href="personal.php">用户中心</a><br />';
	echo '点击此处 <a href="query.php?action=logout">注销</a> 登录！<br />'; 
	exit;
}
else{
	 echo "Wrong password or Wrong number!";
	exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> ');
}

if($_GET['action'] == "logout"){ 
    $_SESSION['userloginnumber'] = $userloginnumber;  
    echo '注销登录成功！点击此处 <a href="login.html">登录</a>'; 
    exit; 
}
?>