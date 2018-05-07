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
	if(!$number){
		echo "请输入学号或姓名";
	}
	else{
		$user_query = mysql_query("select * from user where number = '$number'" );
	}
}
else{
	if(!$number){
		$user_query = mysql_query("select * from user where name = '$name'" );
	}else
	$user_query = mysql_query("select * from user where number = '$number' and name = '$name'" );

}


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
	<?php echo $number;?>
	<form>
	<h2>查询信息</h2>
	学生姓名: <?php echo $row["name"]; ?><br>
	<span>学号: </span><?php echo $row["number"]; ?><br>
    <div>
		<input type="file"  id = "file" name="file" hidden="" /> <br>
		<?php echo '<img style="width: 100px" src="'.$imgsrc.'" id="img"/>'?>
	</div>  
	性别： <?php echo $gender; ?><br>
	兴趣： <?php echo $interest; ?><br>
	<a href="javascript:history.back(-1);">返回</a>
	</form>
</body>
</html>
