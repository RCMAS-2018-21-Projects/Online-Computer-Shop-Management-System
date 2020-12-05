<!-- Cart ---->
<?php
session_start();
require('conn.php');
$ms="";
$mg=array();
if(isset($_SESSION['Username']))
{

  $h='index2.php';
  $q=$_SESSION['Username'];


}
   else{
    $h='index.php';
header("location:log.php");
die();

   }

   require('search.php');
 
   if(isset($_GET['ccd']))
   {
   	$ccd=$_GET['ccd'];

  $s="delete from tbl_cart where cart_id='$ccd'";
  $res=mysqli_query($con,$s);
   }

   if(isset($_POST['update'])&&isset($_POST['cc_qty'])&&isset($_POST['cart_id']))
  {
    $iid=$_POST['cart_id'];
    $qty=$_POST['cc_qty'];


           $s="select tbl_cart.*,tbl_item.qty from tbl_cart,tbl_item where cart_id='$iid' AND tbl_cart.item_id=tbl_item.item_id";
         $ress=mysqli_query($con,$s);
         if(!$ress)
         {
           echo "error".mysqli_error($con);
           die();
         }
         $er=mysqli_fetch_assoc($ress);
         $itd=$er['qty'];
          
        if($qty>$itd)
         {
          $ms="Sorry.Specified Quantity Not Available";
  
         }
          
        else{
       $s="update tbl_cart set product_qty='$qty' where cart_id='$iid'";
       $r= mysqli_query($con,$s);
       if(!$r)
       {
        echo "error".mysqli_error($con);
       }
      }
  }
   /*
   function get_product($con,$limit='',$product_id=''){
	$sql="select * from tbl_item where item_id='$product_id'";
	if($limit!=''){
		$sql.=" limit $limit";
	}
	
	$res=mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}
if(isset($_POST['update'])&&isset($_POST['cc_qty'])&&isset($_POST['iid']))
{
  $iid=$_POST['iid'];
 $qty=$_POST['cc_qty'];
 $_SESSION['cart'][$iid]['c_qty']=$qty;

}*/
if(isset($_POST['pdb'])){

  $s2="select *from tbl_cart where cust_username='$q' AND status='wait'";
    $r2=mysqli_query($con,$s2);

    if(!$r2){
    mysqli_error($con);
    die();
     }
     $i=0;
    while($row2=mysqli_fetch_assoc($r2))
      {
    
      $a=$row2['item_id'];
      $b=$row2['product_qty'];

      $s22="select *from tbl_item where item_id='$a'";
      $r22=mysqli_query($con,$s22);

       if(!$r22){
    mysqli_error($con);
    die();
     }
        
      $row22=mysqli_fetch_assoc($r22);
      $itqy=$row22['qty'];
      $itnam=$row22['item_name'];
      if($itqy<=0)
      {
        $mg[$i]="Item ".$itnam." is out of stock";
        
      }
      $i++;
    }

    if(count($mg)==0)
    {
      header("location:pay.php");
    }
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
    <link rel="stylesheet" type="text/css" href="css/mm.css?v=<?php echo time();?>">
<style type="text/css">
   .cf-btt:hover{
    color:#000;
    text-decoration:none;
    border:1px solid #000;
    padding: 15px;
    background: #fff; 
    font-weight: bolder;
}
</style>

</head>
<body >

 

<div class="header" >


<div class="container">
   
   <div class="navbar" >
      
   
       
  <div id="logo"><image src="image/logo3.png" width="160px"></div>
    <div class="search3">
     <form method="post">
    <input type="text" name="search" placeholder="search for products">
     <button name="s-btn" type="submit">Search</button>
    </form>
    </div>
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
	
  <section class="cart-list">
    <p style="color: red;font-size:15px; "><?php  if(isset($mg)&&count($mg)>0){foreach ($mg as $key => $value){ echo $value; }}  ?></p>
  <!-- 	<?php
  
                /*$tot=0;$c=0;
                if(isset($_SESSION['cart'])){
                	
				foreach($_SESSION['cart'] as $key=>$val){
	            $productArr=get_product($con,'',$key);
	            $pname=$productArr[0]['item_name'];
				$price=$productArr[0]['rate'];
				$image=$productArr[0]['item_image'];
				$y=$productArr[0]['item_id'];
				$i=$key;
				$c++;
				$qty=$val['c_qty'];
				$q=$c+$qty;
				$subtot=$price*$qty;
				$tot=$tot+$subtot;*/

            ?> -->
            <?php
          
            $S="select tbl_cart.*,tbl_item.* from tbl_cart,tbl_item where tbl_cart.item_id=tbl_item.item_id AND tbl_cart.cust_username='$q'";
               $rez=mysqli_query($con,$S);
               if(!$rez)
               {
                echo "error".mysqli_error($con);
               }
               $c=0;$i=0;$tot=0;
               if(mysqli_num_rows($rez)>0){
               while($e=mysqli_fetch_assoc($rez)){

                $cart_id=$e['cart_id'];
                $qty=$e['product_qty']; 
                $i+=$qty;
                $price=$e['rate']; 
                $subtot=$qty*$price;
                $tot+=$subtot;
            ?>
  	 <div class="cart-container">
       	<div class="cart-card">
       			<div class="c-img">
			<img src="../media/product/<?php
      echo $e['item_image'];
	?>" width="190px">
		</div>
       		<div class="c-text" >
	<?php
      echo $e['item_name'];
	?>
		</div>
	
			<div class="c-qty">
		<form method="post"><input value="<?php  echo $e['product_qty'];  ?>" type="number" name='cc_qty' class="numb"> Units
                        <input type="text" name="cart_id" value="<?php  echo $cart_id;  ?>" hidden>
                        <input type="submit" name="update" value="update">
                        <br><?php echo $ms; ?>
    </form>
			
		</div>
		<div class="c-price">
		<?php
      echo number_format($subtot)." Rs";
      
	?>
			
		</div>
		<button class="rbt" type="submit" name="pdrb" >
     <a href="?ccd=<?php echo $cart_id; ?>">Remove</a>
		</button>
       	</div>
       </div>
   <?php
}
}
?>
<?php
 if(mysqli_num_rows($rez)<=0)
{
?>
 <div style="width: 100%;height: 500px;background:#fff">
       	<div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);">
    <center><h1><img src="image/emptycart.png"></h1></center>
    
       </div>
      <?php
  }
      ?>
  </section>
  <section class="total">
  	<div class="total-container">
  		<?php
  	 if(mysqli_num_rows($rez)>0){

  			?>
  		<div class="total-card">
  			     			<div class="c-text" >
		Total NO.Of Items: <?php echo $i?>
		</div>
		<div class="c-img">
			
		</div>
			<div class="c-qty">
		
	
			
		</div>
		<div class="c-price">
		Total Amount: <?php echo number_format($tot)." Rs" ?>
	
			
		</div>
		
		
		<button class="sbt" type="submit" name="pccdb" >
     <a href="product.php">continue shopping</a>
		</button>
    <form method="post">
  <button class="cf-btt" type="submit" name="pdb" >
     Proceed to Pay
    </button>
  </form>
   
  		</div>
  	</div>
       
<?php  }?>
     <center><button class="c-btt" type="submit" name="pdvb" style="margin-top: 20px;">
     <a href="view_order.php">View My Orders</a>
    </button></center>
  </section>
      



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


 
