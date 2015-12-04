<?php require_once('Connections/connection.php');
	if ($_SESSION['id'] == ""){
		header("Location: login.php");
	}
?>

<?php
// 建立 session
	if (!isset($_SESSION)) 
	{
	  session_start();
	}
// 前一個網頁
	$_SESSION['PrevPage'] = "login.php";
	$_SESSION['borrow_result'] = "";
	$id = $_SESSION["id"];
	$passwd = $_SESSION["passwd"];
?>

<?php
	$result = mysql_query("select * from member where id = '$id'", $connection);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <LINK REL="SHORTCUT ICON" HREF="favicon3.ico"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>會員中心</title>
<link href="CSS/main.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 1;
}
.a11 {	font-family: "微軟正黑體", "標楷體", "新細明體";
	color: #000;
}
body,td,th {
	font-family: "微軟正黑體", "標楷體", "新細明體";
}
</style>
</head>
<body class="a1">

<table width="100%" border="0" align="center">
  <tr>
    <td bgcolor="#000066">&nbsp;</td>
    <td bgcolor="#000066" class="a1">圖書借閱系統</td>
    <td bgcolor="#000066">&nbsp;</td>
  </tr>
  <tr class="a2">
    <td height="1" bgcolor="#999999">&nbsp;</td>
    <td height="10" bgcolor="#999999" class="a1">借閱歷史</td>
    <td height="1" bgcolor="#999999">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr bgcolor="#CCCCCC">
    <td width="0" height="10" class="a2"><span class="a1"><span class="a2"></span></span></td>
  </tr>
</table>

<table width="100%" border="0">
  <tr>
    <td width="81%">&nbsp;</td>
    <td width="19%"><table width="100%" border="0" align="center">
      <tr>
        <td align="center" valign="middle"><input name="button3" type="submit" class="a11" id="button2" onclick="location.href=&quot;main.php&quot;" value="回首頁" /></td>
        <td align="center" valign="middle"><input name="button2" type="submit" class="a11" id="button3" onclick="location.href=&quot;logout.php&quot;" value="登出" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" align="center">
  <tr>
    <td align="center">借閱紀錄：</td>
  </tr>
</table>
<table border="1" align="center" cellpadding="1" cellspacing="1" class="a1">
  <tr>
    <th scope="col">書名</th>
    <th scope="col">作者</th>
    <th scope="col">出版社</th>
    <th scope="col">CD</th>
    <th scope="col">條碼</th>
    <th scope="col">借閱時間</th>
    <th scope="col">歸還時間</th>
  </tr>
  
<?php
	//查詢自己借閱中的書
	$query2 = "SELECT * from list where id = '$id';";
	$result2 = mysql_query($query2, $connection);
	
	if ($result2) 
	{
		$total_rows = mysql_num_rows($result2);
		
		//echo $total_rows;
		//mysql_query("SELECT * from book where barcode 
	}
?>

<?php
	for ($i = 0; $i < $total_rows; $i++)
	{
		$row2 = mysql_fetch_assoc($result2);	
		
		//查詢顯示借閱中那本書的書目資料
		$result3 = mysql_query("SELECT * FROM book WHERE barcode = " . $row2['barcode'], $connection);
		$row3 = mysql_fetch_assoc($result3);	
		
		echo "<tr>";
		//echo "<form method='post' action='return_result.php?" . $row2['barcode'] . "'>";
		//echo "<th><input type='submit' value='歸還'></th>";
		
		echo "<td>" . $row3["bName"] . "</td>";
		echo "<td>" . $row3["author"] . "</td>";
		echo "<td>" . $row3["publisher"] . "</td>";
		if ($row2["bor_CD"]=='1'){echo "<td>有</td>";} else {echo "<td>無</td>";};
		//echo "<td>" . $row2["bor_CD"] . "</td>";
		echo "<td>" . $row2["barcode"] . "</td>";
		echo "<td>" . $row2["borrow_time"] . "</td>";
		if ($row2["return_time"] == '0000-00-00 00:00:00') {echo "<td></td>";} else { echo "<td>" . $row2["return_time"] . "</td>"; }
		//echo "<td>" . $row2["return_time"] . "</td>";
		echo "</tr>";
	}
?>

</table>
<p>&nbsp;</p>
<table width="100%" border="0" align="center">
  <tr>
    <td align="left">書目查詢：</td>
  </tr>
</table>
<form action="search.php" method="post" name="form1" class="a1" id="form1">
  <p class="a1">
    <label for="select"></label>
    <select name="keyword_category" class="a1" id="select">
      <option selected="selected">書名</option>
      <option>作者</option>
      <option>出版社</option>
      <option>索書號</option>
      <option>條碼</option>
      <option>ISBN</option>
      <option>關鍵字</option>
    </select>
    <label for="textfield"></label>
    <input name="keyword" type="text" class="a1" id="textfield" />
    <input name="button" type="submit" class="a1" id="button" value="查詢" />
  </p>
</form>
</body>
</html>