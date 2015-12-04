<?php require_once('Connections/connection.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <LINK REL="SHORTCUT ICON" HREF="favicon3.ico"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>密碼查詢處理</title>
</head>
<body>

<?php
	$id = $_POST["id"];
	$email = $_POST["email"];
	
	//echo $id . " " . $name . " " . $passwd . " " . $class . " " . $sex . " " . $email . " " . $tel;
	
	$query="SELECT * FROM member WHERE id = '$id' && email = '$email';";
	//echo $query;
	
	$result=mysql_query($query, $connection);
	$row = mysql_fetch_assoc($result);	
	$trow = mysql_num_rows($result);
	//echo $trow;
	
	if($trow == '1'){?>
		<script language="JavaScript">
			alert("您的密碼是：<?php echo $row['passwd']; ?>    ；轉至登入畫面");
			location.href="login.php";
		</script><?php
	}
	else
	{
		?>
		<script language="JavaScript">
			alert("失敗，資料不符。請重新輸入");
			location.href="member_passwd.php";
		</script> <?php
	}
?>


</body>
</html>