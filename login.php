<?php require_once('Connections/connection.php'); ?>


<?php
	//設定表單標題
	
	//if ($_SESSION['login_form_title'] = ""){
		$_SESSION['login_form_title'] = "會員登入"; 
	//}
	
	
	if (isset($_POST['id']) && isset($_POST['passwd'])) 
{
	$id = $_POST["id"];
	$passwd = $_POST["passwd"];
	
	
	
	//查詢帳號密碼
	$result = mysql_query("select id, passwd from member where id = '$id' AND passwd = '$passwd';", $connection);

	if ($result) 
	{
		//查詢到的總筆數
		$totalRows = mysql_num_rows($result);
		if ($totalRows) 
		{
			$_SESSION["id"] = $id;
			$_SESSION["passwd"] = $passwd;
			// 登入成功後，跳轉到main.php
			header("Location: main.php");
		}
		else 
		{
			$_SESSION['login_form_title'] = "帳號或密碼錯誤";
			// 重新登入, 前往login.php 
			//header("Location: login.php");
		}
	}
	else
	{
		$_SESSION['login_form_title'] = "帳號或密碼錯誤";
		// 重新登入, 前往login.php 
		//header("Location: login.php");
	}
}
	
	//mysql_free_result($result);
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <LINK REL="SHORTCUT ICON" HREF="favicon3.ico"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>會員登入</title>
<style type="text/css">
#form1 {
	text-align: center;
}
.a1 {
	color: #FFF;
	text-align: center;
	font-family: "微軟正黑體", "標楷體", "新細明體";
	font-weight: bold;
	font-size: 24px;
}
.a2 {
	color: #999;
}
.a3 {
	font-family: "微軟正黑體", "標楷體", "新細明體";
}
#form1 #form1 {
	font-size: 24px;
	font-family: "微軟正黑體", "標楷體", "新細明體";
}
.a4 {
	font-size: 14px;
	font-family: "微軟正黑體", "標楷體", "新細明體";
}
body,td,th {
	font-family: "微軟正黑體", "標楷體", "新細明體";
}
</style>
</head>

<body>
<table width="100%" border="0" align="center">
  <tr>
    <td bgcolor="#000066">&nbsp;</td>
    <td bgcolor="#000066" class="a1">圖書借閱系統</td>
    <td bgcolor="#000066">&nbsp;</td>
  </tr>
  <tr class="a2">
    <td height="1" bgcolor="#999999">&nbsp;</td>
    <td height="10" bgcolor="#999999" class="a1">&nbsp;</td>
    <td height="1" bgcolor="#999999">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr bgcolor="#CCCCCC">
    <td width="0" height="10" class="a2"><span class="a1"><span class="a2"></span></span></td>
  </tr>
</table>

<p></p>
<form action="" method="post" name="form1" id="form1">
  <span class="a3" id="form1">
  <?php
	echo $_SESSION['login_form_title'];
?>
  </span>
  <table width="329" border="0" align="center">
    <tr>
      <td width="203" valign="middle"><span class="a3">帳號(UserID)：</span>        <input name="id" type="text" size="23" maxlength="7" /></td>
    </tr>
    <tr>
      <td valign="middle"><span class="a3">密碼(Password)：</span>        <input name="passwd" type="password" maxlength="45" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle"><input name="button" type="submit" class="a3" id="button" value="登入" /></td>
    </tr>
  </table>
</form>

  <table width="252" border="0" align="center">
    <tr>
      <td width="246" align="center" valign="middle"><table width="200" border="0">
        <tr>
          <td align="center"><input name="member_new2" type="submit" class="a3" id="member_new2" onclick="location.href=&quot;member_passwd.php&quot;" value="忘記密碼" /></td>
          <td align="center"><input name="member_new" type="submit" class="a3" id="member_new" onclick="location.href=&quot;member_new.php&quot;" value="加入會員" /></td>
        </tr>
      </table></td>
    </tr>
  </table>

<table width="100%" border="0" align="center">
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td width="47%" align="right"><p><span class="a3">說明：</span></p></td>
    <td width="53%" align="left"><span class="a3">1. 國立高雄第一科技大學 資訊管理系 </span></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">2. 課程-資料庫管理</td>
  </tr>
  <tr>
    <td align="right">工作團隊：</td>
    <td align="left">0024032 王俞文 - PHP測試、撰寫協助</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">0024036 莊雲皓 - 網頁、資料庫撰寫</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">0024044 黃玟寧 - 企劃書</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">0024084 邱冠程 - ER-Model</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left"><p>帥氣小默 &gt;&lt; :3 <br />
    美麗俞文 &gt;_&lt;&quot;<br />
    可愛維尼 &gt;_O<br />
    煞氣半仙 &lt;3 </p></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" align="center">
  <tr valign="bottom">
    <td align="center" valign="bottom" class="a3"><span class="a4">Copyright&copy;2013, Yun-Hao. All rights reserved.</span></td>
  </tr>
</table>
</body>
</html>