<?php require_once('Connections/connection.php'); ?>
<?php
// 建立 session
if (!isset($_SESSION)) {
  session_start();
}
?>

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
	$result = mysql_query("select id, passwd from member where id = $id AND passwd = $passwd", $connection);

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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>會員登入</title>
<style type="text/css">
#form1 {
	text-align: center;
}
</style>
</head>

<body>

<form action="" method="post" name="form1" id="form1"> 
 <p><img src="images/title.jpg" width="960" height="150" alt="title" /></p>  
  <span id="form1">
  <?php
	echo $_SESSION['login_form_title'];
?>
  </span>
  <table width="215" height="98" border="0" align="center">   
    <tr>
      <td width="203" height="21" valign="middle">帳號
        <input name="id" type="text" maxlength="7" /></td>       
    </tr>
    <tr>
      <td height="21" valign="middle">密碼
        <input name="passwd" type="password" maxlength="45" /></td>
    
    </tr>
    <tr>
      <td height="23" align="right" valign="middle"><input type="submit" name="button" id="button" value="登入" /></td>
    </tr>
    
  </table>
  <p>&nbsp;</p>
</form>

<form id="form2" name="form2" method="post" action="member_new.php">
 <table width="900" border="0" align="center">
   <tr>
     <td><div align="center">
       <input name="member_new" type="submit" id="member_new" value="加入會員"  />
     </div></td>
   </tr>
   <tr>
     <td><table width="921" height="706" border="0" align="center">
       <tr>
         <td width="921" height="25" align="center" valign="middle"><p>&nbsp; </p>
           <p>&nbsp;</p></td>
       </tr>
       <tr> <img src="images/6.jpg" width="1024" height="772" alt="back"  /> </tr>
     </table></td>
   </tr>
 </table>
</form>
</body>
</html>