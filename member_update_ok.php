<?php require_once('Connections/connection.php'); 
	if ($_SESSION['id'] == ""){
		header("Location: login.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <LINK REL="SHORTCUT ICON" HREF="favicon3.ico"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增帳號處理</title>
</head>
<body>

<?php
	$id = $_SESSION['id'];
	$passwd = $_POST["passwd"];
	$name = $_POST["name"];
	$class = $_POST["class"];
	$sex = $_POST["sex"];
	$email = $_POST["email"];
	$tel = $_POST["tel"];
	
	//echo $id . " " . $name . " " . $passwd . " " . $class . " " . $sex . " " . $email . " " . $tel;
	
	$query = "UPDATE member SET name = '$name', passwd = '$passwd', class = '$class', sex = '$sex', email = '$email', tel = '$tel' WHERE id = '$id';";
	
	//echo $query;
	
	$result=mysql_query($query, $connection);
	
	if($result){?>
		<script language="JavaScript">
			alert("成功，轉至會員中心");
			location.href="main.php";
		</script><?php
	}
	else
	{
		?>
		<script language="JavaScript">
			alert("失敗，請重新輸入");
			location.href="member_update.php";
		</script> <?php
	}
?>


</body>
</html>