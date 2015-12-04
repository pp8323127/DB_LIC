<?php require_once('Connections/connection.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <LINK REL="SHORTCUT ICON" HREF="favicon3.ico"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>加入會員</title>
<style type="text/css">
#form1 table tr td {
	font-family: 微軟正黑體, 標楷體, 新細明體;
}
#form1 table tr td {
	font-family: "微軟正黑體", "標楷體", "新細明體";
}
.a1 {
	font-family: "微軟正黑體", "標楷體", "新細明體";
}
a3 {
	font-size: 24px;
}
.a3 {
	font-size: 24px;
	color: #FFF;
	font-weight: bold;
}
.a2 {
	font-size: 16px;
}
.a2 {
	color: #FFF;
}
.a11 {	font-family: "微軟正黑體", "標楷體", "新細明體";
	color: #000;
}
</style>
</head><body class="a1">
<table width="100%" border="0" align="center">
  <tr>
    <td bgcolor="#000066">&nbsp;</td>
    <td align="center" bgcolor="#000066" class="a1"><span class="a3">圖書借閱系統</span></td>
    <td bgcolor="#000066">&nbsp;</td>
  </tr>
  <tr class="a2">
    <td height="1" bgcolor="#999999">&nbsp;</td>
    <td height="10" align="center" bgcolor="#999999" class="a1">會員中心</td>
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
    <td width="86%">&nbsp;</td>
    <td width="14%"><table width="100%" border="0" align="center">
      <tr>
        <td align="center" valign="middle"><input name="button3" type="submit" class="a11" id="button3" onclick="location.href=&quot;main.php&quot;" value="回首頁" /></td>
        <td align="center" valign="middle"><input name="button3" type="submit" class="a11" id="button2" onclick="location.href=&quot;logout.php&quot;" value="登出" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<form action='member_new_ok.php' method="post" class="cmxform" id="form1">
  <table width="200" border="0" align="center">
    <tr>
    <td align="center" valign="middle">加入會員</td>
  </tr>
</table>
<table border="0" align="center" class="a1">
  <tr>
  <td>帳號：</td>
  <td><input type="text" name="id" /></td>
</tr>
<tr>
<td>姓名：</td>
<td><input type="text" name="name" /></td>
</tr>
<tr>
<td>密碼：</td>
<td><input type="password" name="passwd" /></td>
</tr>
<tr>
<td>班級：</td>
<td><input type="text" name="class" />
</td>
<tr>
<td>性別：</td>
<td><input name="sex" type="radio" id="radioM" value="男" checked="checked" />
  男
<label for="radio"></label>
<input type="radio" name="sex" id="radioF" value="女" />
女
</td>
<tr>
<td>E-mail：</td>
<td><input type="text" name="email" />
</td>
<tr>
<td>電話：</td>
<td><input type="text" name="tel" />
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="right"><input name="button2" type="reset" class="a1" value="清除"/>
  <input name="button" type="submit" class="a1" value="送出"/></td>
</tr>
</table></form>
<P></P>

</body>
</html>