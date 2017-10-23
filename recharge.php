<?php
session_start();
$mcn=$_SESSION[mcn];
mysql_connect("localhost","root");
mysql_select_db("metro");
$bal3=@$_POST[t20];
$sad=$bal3;
mysql_query("update signup set balance=balance+'$sad' where  mcn='$mcn' ");
mysql_query("delete from rides where fare=0");

?>
