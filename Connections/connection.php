<?php
// ?إ? MySQL ???Ʈw???s?u
	$connection = mysql_connect('localhost', 'root', 'root') or 
	trigger_error(mysql_error(), E_USER_ERROR);
// ?]?w?b?Τ??ݨϥ?UTF-8???r????
	mysql_set_charset('utf8', $connection);
	mysql_select_db('db_lic', $connection) or die('???Ʈwdb_lic???s?b');	
// ?إ? session

	if (!isset($_SESSION)) 
	{
	  session_start();
	}
?>
<head>
  <LINK REL="SHORTCUT ICON" HREF="favicon3.ico"> 
</head>