<!DOCTYPE HTML>
<?php
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
                <li> <a href="@">My Account</a> </li>
                <li> <a href="all_products.php">All Products</a> </li>
                <li> <a href="@">Shopping Cart</a> </li>
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
               <div id="shopping_cart">
                   <span style="float:right; text-align:center; line-height:45px;padding-right:10px;"> 
                       Welcome Guest <b style="color:yellow;">Shopping Cart - Total items:Total Price  </b>
                       <a href="cart.php"style="color:yellow;">Go To Cart</a>
                   </span>
                   

               </div>
               <div id="products_box">
                   <?php
                   if(isset($_GET['pro_id'])){
                       $product_id=$_GET['pro_id'];
                   $get_pro= "select * from products where product_id='$product_id'";
    $run_pro= mysqli_query($con, $get_pro);

    while($row_pro=mysqli_fetch_array($run_pro)){
        $pro_id=$row_pro['product_id'];
        
        $pro_title=$row_pro['product_title'];
        $pro_price=$row_pro['product_price'];
        $pro_image=$row_pro['product_image'];
        $pro_desc=$row_pro['product_desc'];

        echo"
            <div id='single_product' style='align:center';>
                <h3>$pro_title</h3>
                <br>
                <img src='admin_area/product_images/$pro_image' width='400' height='300' />
                <br>
                <h4><b>₹$pro_price</b></h4>
                <br>
                <p> $pro_desc </p>
                <br>
                <a href='index.php'style='float:left'>Go Back</a>
                <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
            </div>
        ";
    }
    }

                   ?>
               </div>
            </div>


        </div>

        

        <div id="footer"> &copy; www.onlineshop.com  </div>



    </div>
    <!--Main container ends here-->
</body>
</html>