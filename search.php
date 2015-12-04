<?php require_once('Connections/connection.php');
	if ($_SESSION['id'] == ""){
		header("Location: login.php");
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查詢結果</title>
<style type="text/css">
a1 {
	font-family: "微軟正黑體", "標楷體", "新細明體";
}
.a1 {
	font-family: "微軟正黑體", "標楷體", "新細明體";
	color: #000;
}
.a2 {
	font-size: 24px;
}
.a1 .a2 {
	color: #FFF;
	font-weight: bold;
}
.a2 .a1 {
	font-size: 16px;
	color: #FFF;
	font-weight: bold;
}
#apDiv1 {
	position: absolute;
	width: 236px;
	height: 53px;
	z-index: 1;
	left: 165px;
	top: 360px;
}
body,td,th {
	font-family: "微軟正黑體", "標楷體", "新細明體";
}
.aa1 {
	font-size: 24px;
	color: #FFF;
	text-align: left;
}
.aa2 {
	font-size: 16px;
}
.aaa1 {
	font-weight: bold;
}
.a11 {font-family: "微軟正黑體", "標楷體", "新細明體";
}
.a21 {	font-size: 16px;
}
.a21 {	color: #FFF;
}
.a3 {	font-size: 24px;
	color: #FFF;
	font-weight: bold;
}
.a5 {	font-weight: bold;
}
</style>
</head>

<body>
<table width="100%" border="0" align="center">
  <tr>
    <td bgcolor="#000066">&nbsp;</td>
    <td align="center" bgcolor="#000066" class="a11"><span class="a3">圖書借閱系統</span></td>
    <td bgcolor="#000066">&nbsp;</td>
  </tr>
  <tr class="a21">
    <td height="1" bgcolor="#999999">&nbsp;</td>
    <td height="10" align="center" bgcolor="#999999" class="a11"><span class="a5">查詢結果</span></td>
    <td height="1" bgcolor="#999999">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr bgcolor="#CCCCCC">
    <td width="0" height="10" class="a21"><span class="a11"></span></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="86%"><form id="form1" name="form1" method="post" action="">
      <p>
        <label for="select3"><br />
        </label>
        <select name="keyword_category" class="a1" id="select3">
          <option>書名</option>
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
      <p>&nbsp; </p>
    </form></td>
    <td width="14%"><table width="100%" border="0" align="center">
      <tr>
        <td align="center" valign="middle"><input name="button3" type="submit" class="a1" id="button3" onclick="location.href=&quot;main.php&quot;" value="回首頁" /></td>
        <td align="center" valign="middle"><input name="button2" type="submit" class="a1" id="button2" onclick="location.href=&quot;logout.php&quot;" value="登出" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>
  <?php
  	if ($_SESSION['borrow_result'] == 'borrow_result') {
		$_POST['keyword_category'] = $_SESSION['keyword_category'];
		$_POST['keyword'] = $_SESSION['keyword'];
	}

		$_SESSION['keyword_category'] = $_POST['keyword_category'];
		//echo $_SESSION['keyword_category'];
		$_SESSION['keyword'] = trim($_POST['keyword']);
		
	$keyword_category = $_SESSION['keyword_category'];
	$keyword = $_SESSION['keyword'];

	$database_array = array("bName", "author", "publisher", "idbook", "barcode", "ISBN");
	$category_array = array("書名", "作者", "出版社", "索書號", "條碼", "ISBN");
	
//顯示所有書目
if ($keyword == 'allbooks') {
	echo "搜尋條件： 類別[" . $keyword_category . "]、搜尋字元[" . $keyword . "]";
	$result = mysql_query("SELECT * FROM book;", $connection);
} else {
	//若以關鍵字搜尋
	if ($keyword_category == "關鍵字")
	{
		echo "搜尋條件： 類別[" . $keyword_category . "]、搜尋字元[" . $keyword . "]";
		$query = "SELECT * FROM book WHERE barcode LIKE '%" . $keyword . "%' OR 
		idbook LIKE '%" . $keyword . "%' OR 
		bName LIKE '%" . $keyword . "%' OR 
		author LIKE '%" . $keyword . "%' OR 
		publisher LIKE '%" . $keyword . "%' OR 
		ISBN LIKE '%" . $keyword . "%'";
		
		$result = mysql_query($query, $connection) or die(mysql_error());
	}
	else
	{
		//若以其他欄位搜尋("書名", "作者", "出版社", "索書號", "ISBN")
		foreach ($category_array as $key => $value)
		{
		// 找到尋找範圍
			if ($keyword_category == $value)
			{	
				echo "搜尋條件： 類別[" . $keyword_category . "]、搜尋字元[" . $keyword . "]";
				$query = "SELECT * FROM book WHERE " . $database_array[$key] . " LIKE '%" . $keyword . "%'";
				$result = mysql_query($query, $connection) or die(mysql_error());
			}
		}	
	}
}


?>
</p>
<table border="1" align="center" cellpadding="1" cellspacing="1" class="a1">
  <tr>
    <th width="46" scope="col">&nbsp;</th>
    <th width="46" scope="col">條碼</th>
    <th width="65" scope="col">索書號</th>
    <th width="84" scope="col">書名</th>
    <th width="87" scope="col">作者</th>
    <th width="72" scope="col">出版社</th>
    <th width="109" scope="col">ISBN</th>
    <th width="45" scope="col">CD</th>
    <th width="45" scope="col">狀態</th>
  </tr>

  <?php   
	/*//陣列式顯示
	while ($row2 = mysql_fetch_assoc($result2)) 
	{
		print_r($row2);
		echo "<br />";	
	}*/

				
  if (!empty($keyword)) {
	// 顯示所有記錄
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
	{
		echo "<form method='post' action='borrow_result.php?" . $row['barcode'] . "'>";
		echo "<th><input type='submit' value='借閱'></th>";
		
		echo "<td>" . $row["barcode"] . "</td>";
		echo "<td>" . $row["idbook"] . "</td>";
		echo "<td>" . $row["bName"] . "</td>";
		echo "<td>" . $row["author"] . "</td>";
		echo "<td>" . $row["publisher"] . "</td>";
		echo "<td>" . $row["ISBN"] . "</td>";
		if ($row["CD"]=="1"){echo "<td>有</td>";} else {echo "<td>無</td>";};
		//echo "<td>" . $row["CD"] . "</td>";		
		if ($row["state"]=="1"){echo "<td>可外借</td>";} else {echo "<td>不在館內</td>";};
		//echo "<td>" . $row["state"] . "</td>";
		echo "</tr></form>";
	?>



    <?php /*
		// 顯示所有紀錄的寫法-1
		// 顯示每一筆記錄
		foreach ($row as $record) 
		{	if ($row['CD']) echo "是"; else echo "否";
			echo $record['CD'];
			//if ($record = "1") { $record = "是";}
			//else {$record = "否";}
	?>
    
    <td><?php echo $record;  */?></td>
    <?php
		} //echo "</form>  <tr>"; 
	}
	
	?>

  </tr>
</table>
<p class="a1">&nbsp;</p>
</body>
</html>