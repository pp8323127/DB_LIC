<?php require_once('Connections/connection.php'); 
	$id = $_SESSION['id'];
	
	$result = mysql_query("SELECT * FROM member WHERE id = $id", $connection);
	$row = mysql_fetch_assoc($result);	
	
	echo $id;
	echo $row['id'];
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <label for="textfield"></label>
  <input name="textfield" type="text" id="textfield" value="<?php echo $row['id']; ?>" />
</form>
</body>
</html>