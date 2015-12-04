<?php require_once('Connections/connection.php'); 
	if ($_SESSION['id'] == ""){
		header("Location: login.php");
	}
	
	$id = $_SESSION['id'];
	
	$result = mysql_query("SELECT * FROM member WHERE id = $id", $connection);
	$row = mysql_fetch_assoc($result);	
	
	//echo $id;
	//echo $row['id'];
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <LINK REL="SHORTCUT ICON" HREF="favicon3.ico"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>加入會員</title>
<style type="text/css">
.a1 {	font-family: "微軟正黑體", "標楷體", "新細明體";
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
.a4 {
	font-size: 20px;
}
.a5 {
	font-weight: bold;
}
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>

<script language="javascript">
function chkpas(chkpasswd) {
	if (document.getElementById("passwd").value==chkpasswd) {
		return true;	
	} else {
		return false;	
	}
}
</script>

</head>

<body>
<table width="100%" border="0" align="center">
  <tr>
    <td bgcolor="#000066">&nbsp;</td>
    <td align="center" bgcolor="#000066" class="a1"><span class="a3">圖書借閱系統</span></td>
    <td bgcolor="#000066">&nbsp;</td>
  </tr>
  <tr class="a2">
    <td height="1" bgcolor="#999999">&nbsp;</td>
    <td height="10" align="center" bgcolor="#999999" class="a1"><span class="a2"><span class="a5">會員中心</span></span></td>
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
        <td align="center" valign="middle"><input name="button3" type="submit" class="a1" id="button3" onclick="location.href=&quot;main.php&quot;" value="回首頁" /></td>
        <td align="center" valign="middle"><input name="button3" type="submit" class="a1" id="button2" onclick="location.href=&quot;logout.php&quot;" value="登出" /></td>
      </tr>
    </table></td>
  </tr>
</table>

<form id="form1" name="form1" method="post" action="member_update_ok.php">
<table width="200" border="0" align="center">
    <tr>
    <td align="center" valign="middle" class="a1"><span class="a4">修改會員資料</span></td>
  </tr>
</table>
<table width="100%" border="0" align="center" class="a1">
    <tr>
      <td width="47%" align="right" valign="middle">帳號：</td>
      <td width="53%"><?php echo $row['id']; ?>&nbsp;</td>
    </tr>
    <tr>
      <td align="right" valign="middle">姓名：</td>
      <td><span id="sprytextfield2">
        <label for="name"></label>
        <input name="name" type="text" id="name" value="<?php echo $row['name']; ?>" />
      <span class="textfieldRequiredMsg">需要有一個值。</span></span></td>
    </tr>
    <tr>
      <td align="right" valign="middle">密碼：</td>
      <td><span id="sprypassword1">
        <label for="passwd"></label>
        <input name="passwd" type="password" id="passwd" value="<?php echo $row['passwd']; ?>" />
      <span class="passwordRequiredMsg">需要有一個值。</span></span></td>
    </tr>
    <tr>
      <td align="right" valign="middle">確認密碼：</td>
      <td><span id="sprytextfield3">
      <label for="chkpasswd"></label>
      <input name="chkpasswd" type="password" id="chkpasswd" value="<?php echo $row['passwd']; ?>" />
      <span class="textfieldRequiredMsg">兩次輸入密碼密需相同。</span><span class="textfieldInvalidFormatMsg">兩次輸入密碼密需相同。</span></span></td>
    </tr>
    <tr>
      <td align="right" valign="middle">班級：</td>
      <td><span id="sprytextfield4">
        <label for="class"></label>
        <input name="class" type="text" id="class" value="<?php echo $row['class']; ?>" />
      <span class="textfieldRequiredMsg">需要有一個值。</span></span></td>
    </tr>
    <tr>
      <td align="right" valign="middle">性別：</td>
      <td><span id="spryradio1">
        <label>
          <input name="sex" type="radio" id="sex" value="男" 
		  <?php if (!strcmp($row['sex'],'男'))
		  {echo "checked=\"checked\"";} ?> />
          男</label>   
        <label>
          <input type="radio" name="sex" value="女" id="sex" 
          <?php if (!strcmp($row['sex'],'女'))
		  {echo "checked=\"checked\"";} ?> />
          女</label>
        <br />
        <span class="radioRequiredMsg">請進行選取。</span></span></td>
    </tr>
    <tr>
      <td align="right" valign="middle">E-mail：</td>
      <td><span id="sprytextfield5">
      <label for="email"></label>
      <input name="email" type="text" id="email" value="<?php echo $row['email']; ?>" />
      <span class="textfieldRequiredMsg">需要有一個值。</span><span class="textfieldInvalidFormatMsg">格式無效。</span></span></td>
    </tr>
    <tr>
      <td align="right" valign="middle">電話：</td>
      <td><span id="sprytextfield6">
      <label for="tel"></label>
      <input name="tel" type="text" id="tel" value="<?php echo $row['tel']; ?>" />
      <span class="textfieldRequiredMsg">需要有一個值。</span><span class="textfieldInvalidFormatMsg">格式無效。</span></span></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td align="left"><table width="200" border="0">
          <tr>
            <td width="77">&nbsp;</td>
            <td width="113"><input name="button2" type="reset" class="a1" value="清除"/>
            <input name="button" type="submit" class="a1" value="送出"/></td>
          </tr>
        </table></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "custom", {validation:chkpas, validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["blur"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "email", {validateOn:["blur"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "phone_number", {validateOn:["blur"], format:"phone_custom"});
var spryradio1 = new Spry.Widget.ValidationRadio("spryradio1");


</script>
</body>
</html>