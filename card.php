  
<?php
session_start();
require('conn.php');
if(isset($_SESSION['Username']))
{
  $q=$_SESSION['Username'];


}
  if(isset($_POST['p-bt']))
 {
 	$type=$_POST['type'];
 	$number=$_POST['number'];
 	$date=$_POST['date'];
 	$cvv=$_POST['cvv'];
 	header("location:success.php");
 }
 ?>