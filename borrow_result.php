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
//echo
	$query2 = "SELECT * FROM book WHERE barcode = '$barcode' && CD = '1';";
	$result2 = mysql_query($query2, $connection);
	$row2 = mysql_num_rows($result2);
	
	if ($row2 == '1')
	{ 
		$CD = 1;
	}
	else
	{
		$CD = 0;	
	}
	
	//查看書本state
	$row = mysql_num_rows(mysql_query("SELECT * FROM book WHERE barcode = $barcode && state = 1", $connection));
	if ($row == 1)
	{
		$query = "INSERT INTO list (id, barcode, bor_CD, borrow_time, return_time) VALUES ('$id', $barcode, $CD, '$datetime', '0000-00-00 00:00:00');";
	$result = mysql_query($query, $connection);
	
	//更改書本state=0
	mysql_query("UPDATE book SET state = 0 where barcode = $barcode", $connection);
	
		echo "處理中...";
		?>
		<script language="JavaScript">
			alert("成功");
			location.href="main.php"
		</script>
		<?php
	}
	else
	{
		echo "處理中...";
		$_SESSION['borrow_result'] = 'borrow_result';
		?>
		<script language="JavaScript">
			alert("失敗，已被其他人借走");
			//location.back();	
			location.href="search.php";	
		</script> <?php
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>借書</title>
</head>

<body>
</body>
</html>