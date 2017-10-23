<?php
session_start();
include_once("db.php");
$a9=$_POST[t9];
$a10=$_POST[t10];
$res=mysql_query("select * from login where mcn='$a9' and pwd='$a10'");
$cnt=mysql_num_rows($res);
if($cnt==1)
{
	$_SESSION[mcn]=$a9;
	header("location:user.php");
}
else
{
	header("location:login.php?x=3");
}
?>