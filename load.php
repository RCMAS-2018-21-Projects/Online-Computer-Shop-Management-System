
<?php
session_start();

if(isset($_SESSION['Username']))
{
  $q=$_SESSION['Username'];

}

if(isset($_GET['a'])&&isset($_GET['b'])&&isset($_GET['c'])&&isset($_GET['direct']))
{
	$or=$_GET['a'];
	$pay=$_GET['b'];
	$del=$_GET['c'];
	$direct=$_GET['direct'];
}
else
{
	echo "error..... NOT FOUND";
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>loading</title>
	<style type="text/css">
		body{
			position: relative;
			width: 100%;
			
		}
/*		img{
            position: absolute;
           top: 50%;
            left: 50%;
           
            transform: translate(-50%,50%);

		}*/
	</style>
</head>
<body onLoad="myFunction()">

<center><img src="image/load.gif"></center>
<script>
function myFunction() {
  setTimeout(function(){ window.location.href="success.php?or=<?php echo $or;?>&pay=<?php echo $pay;?>&del=<?php echo $del;?>&direct=<?php echo $direct?>"; }, 3000);
}
</script>

</body>
</html>