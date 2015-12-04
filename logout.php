<?php require_once('Connections/connection.php');

	if (!empty($_SESSION["id"])) {
		$id = $_SESSION["id"];
		echo "謝謝您($id)的使用。";
		$_SESSION["id"] = "";
		
		?>
		<script language="JavaScript">
			alert("登出成功");
			location.href="login.php"
		</script>
		<?php	
	} else {
		?>
		<script language="JavaScript">
			alert("你尚未登入");
			location.href="login.php"
		</script>
		<?php	
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <LINK REL="SHORTCUT ICON" HREF="favicon3.ico"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登出</title>
</head>

<body>
</body>
</html>