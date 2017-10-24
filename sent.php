<?php
session_start();
$uid=$_SESSION[uid];
include_once("db.php");
if($uid==null)
{
	header("location:login.php?x=4");
}
?>
<center>
	<table width=90%>
		<?php
$a=$_GET[x];
if($a==5)
		{
			echo"<tr bgcolor=yellow><td colspan=2><font color=blue><center>Mail sent...</font></td></tr>";
		}
?>
		<tr>
			<td>Welcome
				<?php echo $uid ; ?></td>
			<td align=right>
				<a href=logout.php>Logout</a>
			</td>
		</tr>
		<tr>
			<td colspan=2><hr></td>
		</tr>
		<tr>
			<td>
				<a href=compose.php>Compose</a><br><br>
				<a href=inbox.php>Inbox</a><br><br>
				<a href=sent.php>Sent</a>
			</td>
			<td>
				<?php $res=mysql_query("select * from mails where sid='$uid' order by sn desc"); $cnt=mysql_num_rows($res); echo"<table border=1>"; echo"<tr><th>To</th><th>Subject</th><th>Message</th><th>Date</th></tr>"; for($i=0;$i<$cnt;$i++) {
				$a1=mysql_result($res,$i,'sn'); $a2=mysql_result($res,$i,'rid'); $a3=mysql_result($res,$i,'sub'); $a4=mysql_result($res,$i,'msg'); $a4=substr($a4,0,10); $a5=mysql_result($res,$i,'dt'); echo"<tr><td>$a2</td><td>$a3</td><td><a
				href=sent1.php?s=$a1>$a4</a></td><td>$a5</td></tr>"; } echo"</table>"; ?>
			</td>
		</tr>

	</table>
</center>
