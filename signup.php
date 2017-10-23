<?php
include_once("db.php");
$a1=$_POST[t1];
$a2=$_POST[t2];
$a3=$_POST[t3];
$a4=$_POST[t4];
$a5=$_POST[t5];
$a6=$_POST[t6];

$res=mysql_query("select * from login where mcn='$a3'");
$cnt=mysql_num_rows($res);
if($cnt==1)
{
	header("location:login.php?x=1");
}
else
{
	mysql_query("insert into login values('$a3','$a6')");
	mysql_query("insert into signup values('$a1','$a2','$a3','$a4','$a5','$a6',250)");
	header("location:login.php?x=2");

}
?>
