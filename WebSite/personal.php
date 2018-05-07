<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
if(!isset($_SESSION['userloginnumber'])){ 
    header("Location:login.html"); 
    exit(); 
}
$number=$_SESSION["userloginnumber"];
$con = mysql_connect("localhost","root","123456");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("all", $con); 
$user_query = mysql_query("select * from user where number = '$number'");
$row = mysql_fetch_array($user_query); 
$imgsrc=$row['imgsrc'];
//echo $imgsrc;
$gender=$row['gender'];
$interest=$row['interest'];
$grade=$row['grade'];
/*$sql="INSERT INTO user (name ,number ,passwd ,gender,interest,imgsrc ,grade ,remark)
VALUES
('$name','$number','$passwd','$gender', '$interest', '$imgsrc', '$grade', '')";
//echo $number;*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的主页</title>
</head>
<body>
	<form action="alter.php" method="post" enctype="multipart/form-data">
	<h2>个人信息</h2>
	学生姓名: <?php echo $row["name"]; ?><br>
	<span>学号: </span> <?php echo '<input type="text" name="numberflag" value="'.$number.'"readonly="readonly">' ?><br>
    <div>
		<input type="file"  id = "file" name="file" hidden="" /> <br>
		<?php echo '<img style="width: 100px" src="'.$imgsrc.'" id="img"/>'?>
	</div>  
	性别：<?php echo '<input type="text" value="'.$gender.'" name="gender">' ?><br>请在框内修改
	兴趣： <?php echo $interest; ?><br>
		<input type="checkbox" name="internet[]" value="basketball" checked="checked" />basketball
		<input type="checkbox" name="internet[]" value="swim" />swim
		<input type="checkbox" name="internet[]" value="music" />music<br />
	<input type="submit" name="alter" value="修改信息">
	</form>
</body>
</html>
