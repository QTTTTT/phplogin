<?php 
header('Content-Type: text/html; charset=utf-8');
$name = $number =$grade= $gender = $internet = $website = "";
if($_POST["repasswd"]!=$_POST["passwd"]){
  echo "wrong password";
  $passwd = $_POST["passwd"];
}

else{
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
//echo $_FILES["file"]["size"];
$extension = end($temp);     // 获取文件后缀名
if($_FILES["file"]["size"] > 204800)
	   echo "文件太大，请重新上传";
else  // 小于 200 kb
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "上传错误：: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
        //echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";    
        // 判断当期目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        if (file_exists("upload/" . $_FILES["file"]["name"]))
        {
            //echo $_FILES["file"]["name"] . " 文件已经存在。 ";
        }
        else
        {
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            //echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];
            $imgsrc="upload/".$_FILES["file"]["name"];
        }
    }


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//echo "<br>";
	  $name = test_input($_POST["name"]);
    //$name="'".$name."'";
    echo $name;
	  $number = test_input($_POST["number"]);
	  $gender = test_input($_POST["gender"]);
	  $grade = test_input($_POST["grade"]);
	  $internet = $_POST["internet"];
	  $class= $_POST['class'];
	    //echo $class."<br />";
	    $flag=0;
      $interest="";
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
		
	}

$con = mysql_connect("localhost","root","123456");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("all", $con);
mysql_query("set names utf-8"); 
$sql="INSERT INTO user (name ,number ,passwd ,gender,interest,imgsrc ,grade ,remark)
VALUES
('$name','$number','$passwd','$gender', '$interest', '$imgsrc', '$grade', '')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

echo "注册成功";
mysql_close($con);
echo "<a href="."'login.html'".">点击登录</a>";
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  //echo $data;
  //echo "<br>";
  return $data;

}

?>
