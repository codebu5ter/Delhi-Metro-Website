<?php
$a1=$_POST[t1];
$a2=$_POST[t2];
$a3=$_POST[t3];
mysql_connect("localhost","root");
mysql_select_db("metro");
$res=mysql_query("select * from signup where mcn='$a1' and pwd='$a2'");
$cnt=mysql_num_rows($res);
if($cnt==1)
{
	mysql_query("update signup set pwd='$a3' where mcn='$a1' ");
	header("location:pwd1.php?x=2");
}
else
{
	header("location:pwd1.php?x=1");
}
?>