<?php
session_start();
require('conn.php');
if(isset($_SESSION['staff'])){

 header("location:../admin/index.php?type='s'");
 die();
}
if(isset($_SESSION['Admin'])){
header("location:../admin/index.php");
 die();
}

  //create connection

if(isset($_POST['login'])){

    if (isset($_POST['Username'])&&isset($_POST['password'])) { 
  
 $username=$_POST['Username'];
   $password=$_POST['password'];
   $ar='';
            
            $c="select * from tbl_login where Username='$username'";
            $rs=mysqli_query($con,$c);

            if(mysqli_num_rows($rs)<=0)
            {
              $ar="Username does not exist";
              
            }
            else{

          
                $a=mysqli_fetch_array($rs);

                
                if($a['Username']==$username && $a['password']==$password)
                 {


                  if($a['User_type']=='Admin')
                  {
              
                  $_SESSION['Admin']=$username;
                  $_SESSION['type']='Admin';
                  header("location:../admin/index.php");
                  exit();
                 } 
                 if($a['User_type']=='staff')
                  {
                    if($a['status']==0){
              
                  $_SESSION['staff']=$username;
                  $_SESSION['type']='staff';
                  header("location:../admin/index.php?type='s'");
                  exit();
                }
                else
                {
                  header('location:../user/log.php');
                  die();
                }
                 }
                 if($a['User_type']=='customer')
                  {
                     if($a['status']==0){
                  $_SESSION['Username']=$username;
                  $_SESSION['type']='customer';
                  if(isset($_GET['iid']))
                  {
                   
                    $id=$_GET['iid'];
                     header("location:http://localhost/comp/php/user/pro_details.php?id=$id");

                  }
                  else{
                  header("location:index2.php");
                  exit();
                  }
                }
                else
                {
                  header("location:log.php");
                  die();

                }
                 }
                
                                 
                 }

                 else
                 {
                  $ar= "incorrect password";
                 }
               }
                
            }
            }     
                
              
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/stylee.css?=<?php echo time();?>">
  <link rel="stylesheet" type="text/css" href="css/mm.css?=<?php echo time();?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link href="https://fonts.googleapis.com/css2?family=Lato:wght@900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
    
</head>
<body>
<div class="header">  
<div class="container">
    <div class="navbar">
       <div class="logo">
      <a href="index.php"> <image src="image/logo1.png" width="125px"></a><br><br>
       <h1>Login to <font color="#008080">MASTER</font> TECH</h1>
        <div class="newnav" >
        <nav>
            
            <label for="drop" class="toggle" id='main-toggle'><span class="nav-icon"></span></label>
            <input type="checkbox" id="drop">
            <ul class="menu">
               <li><a href="index.php">Home</a></li>
              <li> 
                
                
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
                    
                    <label for="drop-<?php echo $j;?>" class="toggle fz"><?php echo $row1['cat_name'];  ?>&nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></label>
                    <a href="product.php" class="fz"><?php echo $row1['cat_name'];  ?>&nbsp;&nbsp;<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    <input type="checkbox" id="drop-<?php echo $j;?>">
                    <ul class="fz2">


                      <?php  
                      $sq2="select *from tbl_subcategory where cat_id='$cat_id'";
                      $res2=mysqli_query($con,$sq2);

                   while ($row2=mysqli_fetch_array($res2)){

                  ?>

                      <li><a href="product.php"><?php echo $row2['sub_name'];?></a></li>
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
       <div class="logo">
      
       
         
       </div> 
       </div>
     </div>
     </div>
   
      </div>


 <div class="account-page">
  <div class="container">
    <div class="row">
      <div class="c2">
        <img src="image/acc.png" width="100%">
      </div>
      <div class="c2">
        <div class="form-container2">
         <div> <img src="image/accm.png" width="150px"> </div>




           <form id="regs"  method="post">

               
            <input type="text" name="Username" id="email" placeholder="Email" required>
              <div><?php if(isset($er))echo $er; ?></div>
           
            <input type="password" name="password" placeholder="password" required>
            <div><?php if(isset($ar))echo $ar; ?></div>
            <input  type="submit" class="btn" value="Login" name="login"> <br>
           


            Not a user yet?<a href="register.php"><u>Register</u></a>
         
          </form>

            </div>  
      </div>
      </div>
      </div>
      </div>


        <script>
    var MenuItems = document.getElementById("MenuItems");

    MenuItems.style.maxHeight = "0px";

    function menutg(){
      if(MenuItems.style.maxHeight == "0px")
      {
        MenuItems.style.maxHeight = "200px";
      }
      else
      {
        MenuItems.style.maxHeight = "0px";
        }
    }
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
           
“Whoever said that money <br>can't buy happiness simply<br> didn't know where to go shopping.”
   
   </div> 

 
  </div>
   <center><p class="fon2">Copyright <i class="fa fa-copyright fa-lg" aria-hidden="true"></i> 2020 Master Tech All Rights Reserved 2020</p></center>
   
</div>
</body>
</html>