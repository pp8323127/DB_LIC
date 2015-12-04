<?php require_once('Connections/connection.php');
	if ($_SESSION['id'] == ""){
		header("Location: login.php");
	}
	
	$barcode = $_SERVER['QUERY_STRING'];
	//echo $barcode;

	$id = $_SESSION["id"];
	//echo $id;

	
	date_default_timezone_set('Asia/Taipei');
	$datetime = date("Y-m-d H:i:s");
	//echo $datetime;
	
	
	//$CD = $_PSOT['CD'];
	//echo $CD;
	
	//echo
	$query = "UPDATE list SET return_time = '$datetime', success = '1' WHERE barcode = '$barcode' && return_time = '0000-00-00 00:00:00';";
	$result = mysql_query($query, $connection);
	
	//更改書本state=1
	mysql_query("UPDATE book SET state = 1 where barcode = '$barcode'", $connection);
	
	if($result){
		echo "處理中...";
		?>
		<script language="JavaScript">
			alert("成功");
			//history.back();
			location.href="main.php"
		</script>
		<?php
	}
	else
	{
		echo "處理中...";
		?>
		<script language="JavaScript">
			alert("失敗，這本書尚未借閱");
			location.back();
		</script> <?php
	}
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <LINK REL="SHORTCUT ICON" HREF="favicon3.ico"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>還書</title>
</head>

<body>
</body>
</html>