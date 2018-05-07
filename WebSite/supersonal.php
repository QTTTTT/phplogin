<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
/*if(!isset($_SESSION['rootloginnumber'])){ 
    header("Location:login.html"); 
    exit(); 
}*/
$rootnumber=$_SESSION["rootloginnumber"];


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的主页</title>
</head>
<body>
	<h2>学生信息管理</h2>
	<form action="stuquery.php" method="post" enctype="multipart/form-data" id="query">
		<h3>查询</h3>
		学生姓名<input type="text" name="stuname" id="newname"><br>
	<span>学号</span><input type="text" name="stunumber" id="newnumber"><br>
	<input type="button" onclick="change_ins()" value="添加">
    <input type="submit" value="查询"  />  

	</form>
	<form action="stuins.php" method="post" enctype="multipart/form-data" id="insert" hidden="true">
		<h3>添加</h3>
		学生姓名<input type="text" name="stuname" id="newname"><br>
	<span>学号</span><input type="text" name="stunumber" id="newnumber"><br>
	<input type="button" onclick="change_que()" value="查询">
	密码为学号
    <input type="submit" value="添加"  />  
	</form>

<script>
	function change_ins(){
		document.getElementById("query").style.display="none";
		document.getElementById("insert").style.display="block";
	}
	function change_que(){
		document.getElementById("query").style.display="block";
		document.getElementById("insert").style.display="none";
	}
</script>
</body>
</html>