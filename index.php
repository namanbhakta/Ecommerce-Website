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
          <img id="banner" src="images/banner.jpg"/>
        </div>
        <!--Header ends here-->

        <!--Menubar starts here-->
        <div class="menubar">
            <ul id="menu">
                <li> <a href="index.php">Home</a> </li>
                <li> <a href="customer/my_account.php">My Account</a> </li>
                <li> <a href="all_products.php">All Products</a> </li>
                <li> <a href="cart.php">Shopping Cart</a> </li>
                <li> <a href="customer_registration.php">Sign Up</a> </li>
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
                       <a href="cart.php"style="color:yellow;">Go To Cart</a>
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
                   <?php getPro(); ?>
                   <?php getCatsPro(); ?>
                   <?php getBrandsPro(); ?>
               </div>
            </div>


        </div>

        

        <div id="footer"><h2 style="text-align:center; line-height:75px;"> &copy; www.onlineshop.com </h2> </div>



    </div>
    <!--Main container ends here-->
</body>
</html>