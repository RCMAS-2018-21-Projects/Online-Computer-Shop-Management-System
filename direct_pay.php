<?php

session_start();
if(isset($_SESSION['Username']))
{
  $q=$_SESSION['Username'];


}
   else{
header("location:log.php");

   }
require('conn.php');
$m="";
$ms="";

if(isset($_POST['c-btn'])&&isset($_POST['c_qty'])&&$_POST['item_id']>=1)
   {
       $iid=$_POST['item_id'];    
       $c_qty=$_POST['c_qty'];
       $rus=$_SESSION['Username'];
  /*     $_SESSION['cart'][$iid]['c_qty']=$c_qty;
        header("location:cart.php");*/
/*    if(isset($_SESSION['Username']))
    {
         $rus=$_SESSION['Username'];
         $s="select * from tbl_cart where item_id='$iid' AND cust_username='$rus'";
         $res=mysqli_query($con,$s);
         if(mysqli_num_rows($res)>0){
          
              $m='item already exist in Cart';
             
               }
          else
          {*/
            $s="select *from tbl_item where item_id='$iid'";
         $ress=mysqli_query($con,$s);
         if(!$ress)
         {
           echo "error".mysqli_error($con);
           die();
         }
         $er=mysqli_fetch_assoc($ress);
         $qtt=$er['qty'];
        
         
      
         if($c_qty>$qtt)
         {
          $ms="Sorry.Specified Quantity Not Available";
          
        
         }
         else{
      
              $ql="insert into tbl_cart(item_id,cust_username,product_qty,status) Values('$iid','$rus','$c_qty','pay')";
              $result=mysqli_query($con,$ql);  
             if($result)
             {
                header("location:pay.php?buy=$iid");
               
             } 
             else
             {
                echo "error".mysqli_error($con);
             } 
             } 
          } 
         
  
   else
   {
    /*header("location:log.php?iid=$iid");*/
   }


      
 require("search.php");
?>






<!DOCTYPE html>
<html>
<head>


	</style>
	<title>Slider</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Lato:wght@900&display=swap" rel="stylesheet">
 
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style2.css?v=<?php echo time();?>">
	<link rel="stylesheet" type="text/css" href="css/pdstyle.css?v=<?php echo time();?>">
	<link rel="stylesheet" type="text/css" href="css/mm.css?v=<?php echo time();?>">
</head>
<body style="position: relative;">

	<div class="header">

   <div class="searchp">
     <form method="post">
    <input type="text" name="search" placeholder="search for products">
     <button name="s-btn" type="submit">Search</button>
    </form>
    </div>
<div class="container">

  <div class="navbar">

 <div id="logo"><a href="index.php"><image src="image/logo3.png" width="155px"></a></div>

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
   
      </div>
   

	<div id="content-wrapper">
		
 
		<div class="column"> 
			<?php

if(isset($_GET['id']))
 {
  $id=$_GET['id'];
    
   $sql="select tbl_item.*,tbl_category.cat_name,tbl_subcategory.sub_name,tbl_brand.brand_name from tbl_item,tbl_category,tbl_subcategory,tbl_brand where tbl_item.cat_id=tbl_category .cat_id AND tbl_item.sub_id=tbl_subcategory.sub_id AND tbl_item.brand_id=tbl_brand.brand_id AND tbl_item.item_id='$id'";    

   $res=mysqli_query($con,$sql);
    if(!$res)
    {
      echo "error".mysqli_error($con);
        die();
    } 
    else
    {
      if(mysqli_num_rows($res)>0)
      {


				while($row=mysqli_fetch_array($res))
				{




				?>
			<img id=featured src="../media/product/<?php echo $row['item_image'] ?>">

			<div id="slide-wrapper" >
				
				<img id="slideLeft" class="arrow" src="image/arrow-left.png">

				<div id="slider">
					<?php

					 if($row['item_image']!='')

					echo "<img class='thumbnail' src='../media/product/".$row['item_image']."'alt='error'>";

                    if($row['image2']!='')

					echo "<img class='thumbnail' src='../media/product/".$row['image2']."'alt='error'>";

					if($row['image3']!='')

					echo "<img class='thumbnail' src='../media/product/".$row['image3']."'alt='error'>";

					if($row['image4']!='')

					echo "<img class='thumbnail' src='../media/product/".$row['image4']."'alt='error'>";

				    if($row['image5']!='')

					echo "<img class='thumbnail' src='../media/product/".$row['image5']."'alt='error'>";

				     ?>
				</div>

				<img id="slideRight" class="arrow" src="image/arrow-right.png">
			</div>
		</div>

		<div class="column">
			<h1><?php echo $row['item_name'];  ?></h1>
			<hr>
			<h3><?php echo number_format($row['rate'],2)." Rs";  ?></h3>
      <h4 style="text-decoration: line-through;"><?php echo number_format($row['mrp'],2)." Rs";  ?></h4>

			<p>Model-no <?php echo $row['model_no'];  ?></p>

			<form method ="post"><input value=1 type="number" name='c_qty' style="width: 80px;">
         <input type="text" name="item_id" value="<?php echo $row['item_id'];  ?>" hidden>

       <?php
         if($row['status']==1)
         {
         
       ?>


      <button type="submit" name="c-btn"  id="getbt" style="background: #000;color:#fff;padding: 5px;">Proceed to Payement</button>
       <!-- <br><?php echo $m; ?> -->
       <br><?php echo $ms; ?>
     <?php }?>
        <?php
        if($row['status']==0)
         {
         
       ?>


      <button   class="c-bt" id="getbt">Not Available</button>
       <br><?php echo $m; ?>
     <?php }?>


    </form>




     
		  </div>
      
      <article style="margin-right: 10px;"><p align="justify" style="margin-right: 30px;line-height: 40px;"><?php  echo $row['item_dcp'];?></p></article>
        <?php


    }
   }
  }
 }
?>
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







	<script type="text/javascript">
		let thumbnails = document.getElementsByClassName('thumbnail')

		let activeImages = document.getElementsByClassName('active')

		for (var i=0; i < thumbnails.length; i++){

			thumbnails[i].addEventListener('mouseover', function(){
				console.log(activeImages)
				
				if (activeImages.length > 0){
					activeImages[0].classList.remove('active')
				}
				

				this.classList.add('active')
				document.getElementById('featured').src = this.src
			})



}
		


		let buttonRight = document.getElementById('slideRight');
		let buttonLeft = document.getElementById('slideLeft');

		buttonLeft.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft -= 180
		})

		buttonRight.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft += 180
		})


	</script>

<div>    
	<div class="footer-con">
  <div class="footer" >
    
  <div class="foot-ele1">
    <img src="image/footerlogo.png">
    
  </div>

  <div class="foot-ele3">
    <ul>
      <li> Social Media:</li>
       <li> <a href=""><i class="fa fa-instagram fa-lg" aria-hidden="true" Instagram></i>&nbsp;nstagram</a></li>
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

   <center><p class="fon2" style="margin-bottom: 0; padding-bottom: 0;">Copyright<i class="fa fa-copyright fa-lg" aria-hidden="true"></i> 2020 Master Tech All Rights Reserved 2020</p>
   </center>
   
</div>
</div>


</body>
</html>