<?php require_once('Connections/connection.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <LINK REL="SHORTCUT ICON" HREF="favicon3.ico"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增帳號處理</title>
</head>
<body>

<?php
	$id = $_POST["id"];
	$passwd = $_POST["passwd"];
	$name = $_POST["name"];
	$class = $_POST["class"];
	$sex = $_POST["sex"];
	$email = $_POST["email"];
	$tel = $_POST["tel"];
	
	//驗證是否有重複的帳號
	$result2 = mysql_query("SELECT * FROM member WHERE id = '$id';", $connection);
	$total = mysql_num_rows($result2);
	if ($total == '1') {
		?>
		<script language="JavaScript">
			alert("失敗，已有重複的帳號。請重新輸入");
			location.href="member_new.php";
		</script> <?php
	}
	
	//echo $id . " " . $name . " " . $passwd . " " . $class . " " . $sex . " " . $email . " " . $tel;
	
	$query="INSERT INTO member(id, name, passwd, class, sex, email, tel) VALUES ('$id', '$name', '$passwd', '$class', '$sex', '$email', '$tel');";
	//echo $query;
	
	$result=mysql_query($query, $connection);
	
	if($result){?>
		<script language="JavaScript">
			alert("成功，轉至登入畫面");
			location.href="login.php";
		</script><?php
	}
	else
	{
		?>
		<script language="JavaScript">
			alert("失敗，請重新輸入");
			location.href="member_new.php";
		</script> <?php
	}
?>


</body>
</html>