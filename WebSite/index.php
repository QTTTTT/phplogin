<?php
    if ($_GET["act"] == "phpinfo"){
        phpinfo();
        exit();
    }
    function IsZend(){ 
        if(defined("OPTIMIZER_VERSION")) return OPTIMIZER_VERSION; 
        return "Enabled"; 
    }
    function IsMySQL(){
    	if(function_exists("mysql_close")){
    		return mysql_get_client_info();
    	}
    	return "Enabled";
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>Easy2PHP</title>
	<style>
	body { font: normal 12px Verdana;}
	table{ border-collapse:collapse;}
	a:link,a:visited,a:active,a:hover { color:#000; font-family: Arial, Helvetica, sans-serif; }
	</style>
</head>
<body>

<table align="center" border="1" cellpadding="0" cellspacing="1" bordercolor="#d1d1d1">
<tr><th colspan="2" align="left" bgcolor="#FF6600">Easy2PHP:</th></tr>
<tr>
	<td>Apache:</td>
	<td><?=$_SERVER['SERVER_SOFTWARE']?></td>
</tr><tr>
	<td>PHP:</td>
	<td><?=PHP_VERSION?></td>
</tr><tr>
	<td>MySQL:</td>
	<td><?=IsMySQL()?></td>
</tr><tr>
	<td>PHPMyAdmin:</td>
	<td><?="2.11.0"?></td>
</tr><tr>
	<td>Zend Optimizer:</td>
	<td><?=IsZend()?></td>
</tr>
	
<tr><th colspan="2" align="left" bgcolor="#F6BF1C">Server:</th></tr>
<tr>
	<td>服务器时间:</td>
	<td><?=gmdate("Y年n月j日 H:i:s",time()+8*3600)?></td>
</tr><tr>
	<td>服务器域名/IP地址:</td>
	<td><?=$_SERVER['SERVER_NAME']."(".@gethostbyname($_SERVER['SERVER_NAME']).")"?></td>
</tr><tr>
	<td>服务器解译引擎:</td>
	<td><?=$_SERVER['SERVER_SOFTWARE']?></td>
</tr><tr>
	<td>WEB服务端口:</td>
	<td><?=$_SERVER['SERVER_PORT']?></td>
</tr><tr>
	<td>网站文档目录:</td>
	<td><?=$_SERVER["DOCUMENT_ROOT"]?></td>
</tr>
<tr><td colspan="2" align="center"><a href="?act=phpinfo">Go to PHPInfo</a>&nbsp;&nbsp;<a href="phpMyAdmin/index.php">Go to PHPMyAdmin</a></td></tr>
</table>

</body>
</html>
