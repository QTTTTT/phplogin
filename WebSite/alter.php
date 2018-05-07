<?php
header('Content-Type: text/html; charset=utf-8');
$gender = $_POST["gender"];
$internet = $_POST["internet"];
$number = $_POST["numberflag"];
$flag=0;
$interest="";
if(is_array($internet))
foreach ( $internet as $i)
{
	if($flag==0){
		//echo "兴趣：".$i;
		$interest =$i;
		$flag=1;
	}
	else{
	//echo "和".$i;
	$interest .=" ";
	$interest .=$i;
	}
}
$con = mysql_connect("localhost","root","123456");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("all", $con);
mysql_query("set names utf-8"); 
echo $interest;
echo $gender;
$sql="UPDATE user SET gender = '$gender' , interest = '$interest' where number = '$number'";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "修改成功";

mysql_close($con);
?>