<?php require_once('Connections/connection.php'); ?>
<?php

function checking($conncetion, $value)
{
	if (function_exists('get_magic_quotes_gpc'))
	{
		if (get_magic_quotes_gpc())
		{
			$value = stripslashes($value);
		}
	}
	if (!is_numeric($value)) {
		$value = "'" . mysqli_real_escape_string($conncetion, $value) . "'";
	} 
	else 
	{
		$value = mysqli_real_escape_string($conncetion, $value);	
	}
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
</body>
</html>