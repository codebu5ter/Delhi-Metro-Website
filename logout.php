 <?php
 session_start();
 unset($_SESSION[mcn]);
 header("location:index.php");
?>