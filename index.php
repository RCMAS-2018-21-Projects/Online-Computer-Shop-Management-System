

<?php
require('conn.php');
   require('search.php');


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time();?>">
    <link rel="stylesheet" type="text/css" href="css/mm.css?v=<?php echo time();?>">


</head>
<body >

 

<div class="header" >





 







        <video id="videoBG" poster="image/im.gif" autoplay muted loop>
    <source src="image/video.mp4" type="video/mp4">
</video>

<div class="container">





   
   <div class="navbar" >
      
   
       
  <div id="logo"><image src="image/logo3.png" width="160px"></div>
    <div class="search">
     <form method="post">
    <input type="text" name="search" placeholder="search for products" >
     <button name="s-btn" type="submit">Search</button>
    </form>
    </div>
     <div class="newnav" >
        <nav>
            
            <label for="drop" class="toggle" id='main-toggle'><span class="nav-icon"></span></label>
            <input type="checkbox" id="drop">
            <ul class="menu">
               <li><a href="index.php">Home</a></li>
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
                    <a href="product.php?c_id=<?php echo $row1['cat_id'];?>" class="fz"><?php echo $row1['cat_name'];  ?>&nbsp;&nbsp;<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    <input type="checkbox" id="drop-<?php echo $j;?>">
                    <ul class="fz2">


                      <?php  
                      $sq2="select *from tbl_subcategory where cat_id='$cat_id'";
                      $res2=mysqli_query($con,$sq2);

                   while ($row2=mysqli_fetch_array($res2)){

                  ?>

                      <li><a href="product.php?s_id=<?php echo $row2['sub_id'];?>"><?php echo $row2['sub_name'];?></a></li>
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



<?php    
if(isset($_SESSION['Username'])&&$_SESSION['Username']!='')
{

?>
<div class="slider">

    <div id="img">
      <img src="image/e.jpg">
    </div>

  </div>
<?php }?>

  <script>

    var images = ['a.jpg', 'b.jpg', 'c.jpg', 'd.jpg', 'e.jpg'];

    var x = 0;

    var imgs = document.getElementById('img');

    setInterval(slider, 2000);


    function slider() {

      if (x < images.length) {
        x = x + 1;
      } else {
        x = 1;
      }


      imgs.innerHTML = "<img src=image/" + images[x - 1] + ">";


    }


  </script>


  <style type="text/css">
    .slider {
      width: 100%;
      height: 440px;
      margin: 30px auto;
      box-sizing: border-box;
      overflow: hidden;
      box-shadow: 5px 5px 10px grey;
      z-index: -100;

    }

    img {
      width: 100%;
      height: 100%;
        animation-delay: 2s;
         animation-fill-mode:backwards;
      animation: ani 2s linear;
      animation-timing-function: ease-in; 
    }

    @keyframes ani {
      0% {
        transform: scale(1.3);
      }
      59% {
        transform: scale(1.2);
      }
      100% {
        transform: scale(1);
      }
    }
  </style>






    <div class="row">

        <div class="c2">
          
            <h1 style="font-weight: bolder;font-size: 170px;font-family: 'Sacramento', cursive"><span class="highlight">Master</span></h1><br><br><br><br><br>
            <h1 style="font-weight: bolder;font-size: 170px;font-family: 'Sacramento', cursive">Tech</h1>
            <br><br><br>
            <p style="font-size:21px;">Best quality products at affordable prices</p>
      
        </div>
          <div class="c2">
            <img  src="image/m.gif" width="85%"> 
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
           <a href="pro_details.php?id=10"><img  class="m1" src="image/icon3.png"><a>
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
   <!-- <div> <img  src="image/th.gif" width="155px" class="non" ></div> -->
  </div>


   <center><p class="fon2">Copyright<i class="fa fa-copyright fa-lg" aria-hidden="true"></i> 2020 Master Tech All Rights Reserved 2020</p>
   </center>
 
</div>
</body>
</html>