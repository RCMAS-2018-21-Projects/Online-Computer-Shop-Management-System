

<?php
session_start();
if(isset($_SESSION['Username']))
{
  $q=$_SESSION['Username'];


}
   else{
header("location:log.php");
   }
 

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time();?>">


</head>
<body>

 

<div class="header">

        <video id="videoBG" poster="image/im.gif" autoplay muted loop>
    <source src="image/video.mp4" type="video/mp4">
</video>

<div class="container">
   
   <div class="navbar" >
      
   
       <header>
      <div class="logo">
             <a href="index.php"><image src="image/logo1.png" width="125px"></a>

      </div>
  
      <nav>
        <ul>
          <li><a href="index.php"><i class="fa fa-home fa-lg" aria-hidden="true"></i>&nbsp;Home</a></li>
           
            <li class="sub-menu"><a href="#">product</a>
              <ul>
                <li><a href="product.php">Input/Output Devices</a></li>
             <li><a href="product.php">Storage Devices</a></li>
                <li><a href="product.php">CPU Accessories</a></li>
                <li><a href="product.php">Other Computer Accessories</a></li>
              </ul>
            </li>
            <li><a href="#">About</a></li>
             
              <li><a href="#">Contact Us</a></li>
               <li><a href="account.php"><i class="fa fa-user fa-lg" aria-hidden="true"></i>&nbsp;Account</a></li>
        </ul>      
         </nav>  
         <div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
            </header>
      
     </div>

    <div class="row">

        <div class="c2">
            <h1><span class="highlight">Master</span><br><br><br>Tech</h1>

        
        <p>Best quality products at affordable prices</p>
      
        </div>
          <div class="c2">
            <img  src="image/this.gif" width="85%"> 
          </div>
     </div>     
</div>
</div> 

   <div class="cat">

    <div class="sc">
    
    <div class="row"> 

      <div class="c3">
           <img class="m1" src="image/icon1.png"> 
      </div>

      <div class="c3">
           <img  class="m1" src="image/icon2.png"> 
      </div>

      <div class="c3">
           <img  class="m1" src="image/icon3.png">
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
       <li> <a href=""><i class="fa fa-instagram fa-lg" aria-hidden="true" Instagram></i>&nbsp;Instagram</a></li>
        <li> <a href=""> <i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i>&nbsp;Facebook</a></li>
         <li> <a href=""><i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i> &nbsp;Twitter</a></li>
    </ul>
  </div>

  <div class="foot-ele3">
    <ul>
      <li> Contact Us:</li>

       <li><i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i> &nbsp;mtech.mt@gmail.com</li>

        <li><i class="fa fa-phone-square fa-lg" aria-hidden="true"></i> &nbsp;+918976756450</li>

         <li>&nbsp;abcdabcd</li>
    </ul>
  </div>
   
     <div class="foot-ele2" style="color:violet;">
           
“Whoever said that money <br>can't buy happiness simply<br> didn't know where to go shopping.”<br>

   </div> 
    <img  src="image/th.gif" width="155px" class="non"> 
  </div>


   <center><p class="fon2">Copyright<i class="fa fa-copyright fa-lg" aria-hidden="true"></i> 2020 Master Tech All Rights Reserved 2020</p>
   </center>
 
</div>
</body>
</html>