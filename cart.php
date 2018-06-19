<!DOCTYPE HTML>
<?php
session_start();
include("functions/functions.php");
?>
<head>
<title> Online Shop </title>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>
    <!--Main container starts here-->
    <div class="main_wrapper">
        <!--Header starts here-->
        <div class="header_wrapper"> 
          <a href="index.php"><img id="logo" src="images/logo.jpg" /></a>
          <img id="banner" src="images/banner.gif"/>
        </div>
        <!--Header ends here-->

        <!--Menubar starts here-->
        <div class="menubar">
            <ul id="menu">
                <li> <a href="index.php">Home</a> </li>
                <li> <a href="customer/my_account.php">My Account</a> </li>
                <li> <a href="all_products.php">All Products</a> </li>
                <li> <a href="cart.php">Shopping Cart</a> </li>
                <li> <a href="@">Sign Up</a> </li>
                <li> <a href="@">Contact Us</a> </li>
            </ul>


                <div id="form">
                    <form method="get" action="results.php" enctype="multipart/form-data">
                        <input type="text" name="user_query" placeholder="Enter your query"/>
                        <input type="submit" name="search" value="Search"  />
                    </form>
                </div>

        </div>
        <!--Menubar ends here-->


        <div class="content_wrapper">

           <div id="sidebar">
               <div id="sidebar_title">Categories</div>

               <ul id="cats">
                   <?php getCats();?>
                   
                </ul>

                <div id="sidebar_title">Brands</div>

               <ul id="cats">
                   <?php getBrands();?>
                </ul>

                   
           </div>

           <div id="content_area">
                <?php cart();?>
               <div id="shopping_cart">
                   <span style="float:right; text-align:center; line-height:45px;padding-right:10px;"> 
                   <?php 
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style=color:yellow;margin-left:10px;>Your</b>" ;
					}
					else {
					echo "<b>Welcome Guest:</b>";
					}
					?>
                       <b style="color:yellow;margin-right:10px;">Shopping Cart - Total items:<?php total_items();?>    Total Price:<?php total_price()?>  </b>
                       <a href="index.php"style="color:yellow;">Back To Shop</a>
                       <?php 
					if(!isset($_SESSION['customer_email'])){
					
					echo "<a href='checkout.php' style='color:orange;'>Login</a>";
					
					}
					else {
					echo "<a href='logout.php' style='color:orange;'>Logout</a>";
					}
					
					
					
					?>
                   </span>
                   

               </div>
               <div id="products_box">
                    
                   <form action="" method="post" enctype="multipart/form-data">
                    <table width="700px" align=center bgcolor=skyblue>
                    <tr>
                    <th>Remove</th>
                    <th>Product (s)</th>
                    <!--<th>Quantity</th>-->
                    <th>Price</th>

                    </tr>

                    <?php
                    $total=0;
    global $con;
    $ip=getIp();
    $sel_price="select * from cart where ip_add='$ip'";
    $run_price=mysqli_query($con,$sel_price);
    while($p_price=mysqli_fetch_array($run_price)){
        $pro_id=$p_price['p_id'];
        $pro_price="select * from products where product_id='$pro_id'";
        $run_pro_price=mysqli_query($con,$pro_price);
        while($pp_price=mysqli_fetch_array($run_pro_price)){
            $product_price=array($pp_price['product_price']);
            $product_title=($pp_price['product_title']);
            $product_image=($pp_price['product_image']);
            $single_price=($pp_price['product_price']);
            $values=array_sum($product_price);
            $total += $values;
      
             


                    ?>

                    <tr>
                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"</td>
                    <td><?php echo $product_title; ?><br>
                    <img src="admin_area/product_images/<?php echo $product_image?>" width="60" height="60"/> 
                    </td>
                   <!-- <td><input type="text" name="qty" size="3px" /></td>-->
                    <?php
                    //if(isset($_POST['update_cart'])){
                       // $qty=$_POST['qty'];
                      //  $update_qty="update cart set qty='$qty'";
                       // $run_qty=mysqli_query($con,$update_qty);
                       // echo $qty;
                      //  $total=$total*$qty;
                    //}
                    ?>
                    <td><?php echo " ₹ ".$single_price; ?> </td>
                    </tr>
                    
       <?php } } ?>
                        <tr align="right">
                        <td colspan="3"><b>Sub-Total:</b></td>
                        <td colspan="3" align="left"><?php echo " ₹ ".$total; ?></td>
                        </tr>
                        <tr>
                        <td><input type="submit" name="removeb" value="Remove Selected Items"</td>
                        <!--<td><input type="submit" name="update_cart" value="Update Quantity"</td>-->
                        <td><input type="submit" name="continue" value="Continue Shopping"</td>
                        <td><button><a href="checkout.php"style=" text-decoration:none ;color:black";>Continue To Payment</a></button></td>
                        </tr>


                    </table>
                 </form>
                 <?php
                 
                 
        
                    
                 //function updateCart(){
                 $ip=getIp();

                 if(isset($_POST['removeb'])){
                     foreach($_POST['remove'] as $remove_id){
                         $delete_product="delete from cart where p_id='$remove_id' AND ip_add='$ip'";
                         $run_delete=mysqli_query($con,$delete_product);
                         if($run_delete){
                             echo "<script>window.open('cart.php','_self')</script>";
                         }

                     }
                 }
                 if(isset($_POST['continue'])){
                     echo "<script>window.open('index.php','_self')</script>";
                 }
                 //echo @$up_cart=updateCart();
                 //}
                 ?>
               </div>
            </div>


        </div>

        

        <div id="footer"><h2 style="text-align:center; line-height:75px;"> &copy; www.onlineshop.com </h2> </div>



    </div>
    <!--Main container ends here-->
</body>
</html>