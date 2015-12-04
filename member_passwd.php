<?php require_once('Connections/connection.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>密碼查詢</title>
<style type="text/css">
.a11 {font-family: "微軟正黑體", "標楷體", "新細明體";
	color: #000;
}
.a1 {
	font-size: 36px;
}
.a1 {
	color: #FFF;
	font-family: "微軟正黑體", "標楷體", "新細明體";
	font-weight: bold;
	font-size: 24px;
}
.a2 .a2 {
	font-size: 16px;
	color: #FFF;
	font-family: "微軟正黑體", "標楷體", "新細明體";
	font-weight: bold;
}
.a12 {font-family: "微軟正黑體", "標楷體", "新細明體";
}
.a4 {	font-size: 20px;
}
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>

<body>
<table width="100%" border="0" align="center">
  <tr>
    <td bgcolor="#000066">&nbsp;</td>
    <td align="center" bgcolor="#000066" class="a1">圖書借閱系統</td>
    <td bgcolor="#000066">&nbsp;</td>
  </tr>
  <tr class="a2">
    <td height="1" bgcolor="#999999">&nbsp;</td>
    <td height="10" align="center" bgcolor="#999999" class="a2">會員中心</td>
    <td height="1" bgcolor="#999999">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr bgcolor="#CCCCCC">
    <td width="0" height="10" class="a2"><span class="a1"></span></td>
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
<form id="form1" name="form1" method="post" action="member_passwd_ok.php">
  <table width="200" border="0" align="center">
    <tr>
      <td align="center" valign="middle" class="a12"><span class="a4">密碼查詢</span></td>
    </tr>
  </table>
  <table width="100%" border="0" align="center" class="a12">
    <tr>
      <td width="47%" align="right" valign="middle">帳號：</td>
      <td width="53%"><span id="sprytextfield1">
        <label for="id2"></label>
        <input type="text" name="id" id="id2" />
        <span class="textfieldRequiredMsg">需要有一個值。</span><span class="textfieldInvalidFormatMsg">格式無效。</span></span></td>
</tr>
    <tr>
      <td align="right" valign="middle">E-mail：</td>
      <td><span id="sprytextfield5">
        <label for="email"></label>
        <input type="text" name="email" id="email" />
        <span class="textfieldRequiredMsg">需要有一個值。</span><span class="textfieldInvalidFormatMsg">格式無效。</span></span></td>
</tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td align="left"><table width="200" border="0">
        <tr>
          <td width="77">&nbsp;</td>
          <td width="113"><input name="button" type="reset" class="a12" value="清除"/>
            <input name="button" type="submit" class="a12" value="送出"/></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="100%" border="0" align="center" class="a12">
    <tr> </tr>
    <tr> </tr>
    <tr> </tr>
    <tr> </tr>
    <tr> </tr>
    <tr> </tr>
    <tr> </tr>
    <tr> </tr>
  </table>
</form>
<p>&nbsp;</p>
<script type="text/javascript">
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "email", {validateOn:["blur"]});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "custom", {validateOn:["blur"]});
</script>
</body>
</html>