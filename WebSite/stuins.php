<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
// if(!isset($_SESSION['rootloginnumber'])){ 
//     header("Location:login.html"); 
//     exit(); 
// }
$number=$_POST["stunumber"];
$name=$_POST["stuname"];

$con = mysql_connect("localhost","root","123456");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("all", $con); 

if(!$name){
	echo "学号和姓名不能为空";
}
else{
	if(!$number){
		echo "学号和姓名不能为空";
	}else
	$user_query = mysql_query("INSERT INTO user (name ,number ,passwd ,gender,interest,imgsrc ,grade ,remark)
VALUES
('$name','$number','$number','', '', '', '', '')" );

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的主页</title>
</head>
<body>
	<form>
	<h2>添加成功</h2>
	学生姓名: <?php echo $name; ?><br>
	<span>学号: </span><?php echo $number; ?><br>
	<a href="javascript:history.back(-1);">返回</a>
	</form>
</body>
</html>
