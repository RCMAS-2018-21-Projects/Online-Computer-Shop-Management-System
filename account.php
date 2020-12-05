
<?php
require('conn.php');
 require('search.php');
session_start();
if(!isset($_SESSION['Username']))
{
  $h='index.php';
header("location:log.php");
exit();
}
else
{
  $h='index2.php';
}

if(isset($_POST['out']))
{

if(isset($_SESSION['Username']))
{
unset($_SESSION['Username']);

session_destroy();
header("location:log.php");
exit();
}

}
if(isset($_SESSION['Username']))
{
$username=$_SESSION['Username'];


$sql="select * from tbl_customer where cust_username='$username'";
$res=mysqli_query($con,$sql);

if(!$res)
{
  echo"error".mysqli_error($con);
  die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logout</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/stylee.css?v=<?php echo time();?>">
   <link href="https://fonts.googleapis.com/css2?family=Lato:wght@900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/mm.css?v=<?php echo time();?>">
    
</head>
<body>
  <div class="search2">
     <form method="post">
    <input type="text" name="search" placeholder="search for products">
     <button name="s-btn" type="submit">Search</button>
    </form>
    </div>
<div class="header">  
<div class="container">
  <div class="navbar">

         <div class="newnav" >
        <nav>
            
            <label for="drop" class="toggle" id='main-toggle'><span class="nav-icon"></span></label>
            <input type="checkbox" id="drop">
            <ul class="menu">
               <li><a href="<?php echo   $h ?>">Home</a></li>
              <li> 
                
                <!-- First Tier Drop Down -->
                <label for="drop-2" class="toggle">Products&nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></label>
                <a href="product.php">Products&nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>
                <input type="checkbox" id="drop-2">
                <ul>

                   <?php  
                   $sq1="select *from tbl_category order by cat_name";
                   $res1=mysqli_query($con,$sq1);
                    $cat_id='';
                    $j=3;
                   while ($row1=mysqli_fetch_array($res1)){
                     $cat_id=$row1['cat_id'];

                  ?>

                  <li> 
                    
                    <!-- Second Tier Drop Down -->
                    <label for="drop-<?php echo $j;?>" class="toggle fz"><?php echo $row1['cat_name'];  ?>&nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></label>
                    <a href="product.php" class="fz"><?php echo $row1['cat_name'];  ?>&nbsp;&nbsp;<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    <input type="checkbox" id="drop-<?php echo $j;?>">
                    <ul class="fz2">


                      <?php  
                      $sq2="select *from tbl_subcategory where cat_id='$cat_id'";
                      $res2=mysqli_query($con,$sq2);

                   while ($row2=mysqli_fetch_array($res2)){

                  ?>

                      <li><a href="product.php?"><?php echo $row2['sub_name'];?></a></li>
                       <?php

                        }

                       ?>
                    
                    </ul>
                  </li>
                  <?php
                  $j+=1;
                    }
                  ?>
                </ul>
              </li>

               <li><a href="account.php">Account</a></li>
                 <li><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true" style="width: 38px;"></i></a></li>
             
            </ul>
          </nav>   
        </div>
     </div>
     </div>
   
      </div>


 <div class="account-page">
  <div style="position: absolute;top: 20px;left: 20px;"><image src="image/logo3.png" width="155px"></div>
  <div class="container">
    <div class="row">
      <div class="c2">
        <img src="image/acc.png" width="100%">
      </div>
      <div class="c2" style="margin-top: 8px; ">
        <div class="form-container2">
         <div> <img src="image/accm.png" width="150px"> </div>
         <div style="font-size: 21px;">
          <?php
          $row=mysqli_fetch_array($res);
          
          echo " <center>".$row['cust_name']."</center>";
           echo " <center>".$row['cust_house']."</center>";
           }

         
         ?>
       </div>
          <form   method="post">
            <!--<center><input type="submit" name="out"  class="btt third" value="LogOut"></center>  --> 
            <center><button  class="btt third" name="out" type="submit">Log Out</button></center>
         
          </form>
            </div>  
      </div>
      </div>
      </div>
      </div>


     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.menu-toggle').click(function(){
        $('nav').toggleClass('active')
      })
      $('ul li').click(function(){
        $(this).toggleClass('active')
      })
    })
  </script>


<div class="footer-con">
  <div class="footer">
    
  <div class="foot-ele1">
    <img src="image/footerlogo.png">
  </div>

  <div class="foot-ele3">
    <ul>
      <li> Social Media:</li>
       <li><i class="fa fa-instagram fa-lg" aria-hidden="true"></i> <a href="">Instagram</a></li>
        <li><i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i> <a href="">Facebook</a></li>
         <li><i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i> <a href="">Twitter</a></li>
    </ul>
  </div>

  <div class="foot-ele3">
    <ul>
      <li> Contact Us:</li>
       <li><i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i> mtech.mt@gmail.com</li>
        <li><i class="fa fa-phone-square fa-lg" aria-hidden="true"></i> +918976756450</li>
         <li>abcdabcd</li>
    </ul>
  </div>
   
    <div class="foot-ele2" style="color: violet;">
           
“Whoever said that money<br> can't buy happiness<br> simply didn't know where<br> to go shopping.”
   
   </div> 
 
  </div>
   <center><p class="fon2">Copyright <i class="fa fa-copyright fa-lg" aria-hidden="true"></i> 2020 Master Tech All Rights Reserved 2020</p></center>
   
</div>

</body>
</html>