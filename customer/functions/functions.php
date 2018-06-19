<?php

$con=mysqli_connect("localhost","root","","ecommerce");
if(mysqli_connect_errno()){
    echo "Falied to connect to MySQL : ". mysqli_connect_error();
}

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
//creating cart
function cart(){
    if(isset($_GET['add_cart'])){
        global $con;
        $ip=getIp();
        $pro_id=$_GET['add_cart'];
        $check_pro="select * from cart where ip_add='$ip' AND p_id='$pro_id'";
        $run_check=mysqli_query($con,$check_pro);
        if(mysqli_num_rows($run_check)>0){
            echo "";
        }
        else{
            $insert_pro="insert into cart(p_id,ip_add) values('$pro_id','$ip')";
            $run_pro=mysqli_query($con,$insert_pro);
            //echo "<script>window.open('index.php','_self')</script>";
        }

    }
}
//totl no. of items in cart
function total_items(){
    if(isset($_GET['add_cart'])){
        global $con;
        $ip=getIp();
        $get_items="select * from cart where ip_add='$ip'";
        $run_items=mysqli_query($con,$get_items);
        $count_items=mysqli_num_rows($run_items);
    }
    else{
        global $con;
        $ip=getIp();
        $get_items="select * from cart where ip_add='$ip'";
        $run_items=mysqli_query($con,$get_items);
        $count_items=mysqli_num_rows($run_items);
    }
    echo $count_items;
}

//getting total cost of items in cart
function total_price(){
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
            $values=array_sum($product_price);
            $total += $values;
        }

    }
    echo " ₹".$total;
}
//getting the categories
function getCats(){
    global $con;

    $get_cats="select * from categories";
    $run_cats=mysqli_query($con,$get_cats);
    while($row_cats=mysqli_fetch_array($run_cats)){
        $cat_id=$row_cats['cat_id'];
        $cat_title=$row_cats['cat_title'];

        echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
    }


}

function getBrands(){
    global $con;

    $get_brands="select * from brands";
    $run_brands=mysqli_query($con,$get_brands);
    while($row_brands=mysqli_fetch_array($run_brands)){
        $brand_id=$row_brands['brand_id'];
        $brand_title=$row_brands['brand_title'];

        echo "<li><a href='index.php?brands=$brand_id'>$brand_title</a></li>";
    }


}


function getPro(){
    if(!isset($_GET['cat'])){
        if(!isset($_GET['brands'])){
    global $con;

    $get_pro= "select * from products order by RAND() limit 0,6";
    $run_pro= mysqli_query($con, $get_pro);

    while($row_pro=mysqli_fetch_array($run_pro)){
        $pro_id=$row_pro['product_id'];
        $pro_cat=$row_pro['product_cat'];
        $pro_brand=$row_pro['product_brand'];
        $pro_title=$row_pro['product_title'];
        $pro_price=$row_pro['product_price'];
        $pro_image=$row_pro['product_image'];

        echo"
            <div id='single_product'>
                <h3>$pro_title</h3>
                <img src='admin_area/product_images/$pro_image' width='180' height='180'/>
                <h4><b>Price: ₹$pro_price</b></h4>
                <a href='details.php?pro_id=$pro_id'style='float:left'>Details</a>
                <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
            </div>
        ";
    }
    }
    }
}

function getBrandsPro(){
    if(isset($_GET['brands'])){
        $cat_id=$_GET['brands'];
    global $con;

    $get_pro= "select * from products where product_brand='$cat_id'";
    $run_pro= mysqli_query($con, $get_pro);
    $count_cats=mysqli_num_rows($run_pro);
    if($count_cats==0){ echo "<h2>There are no products in this category</h2>";}

    while($row_pro=mysqli_fetch_array($run_pro)){
        $pro_id=$row_pro['product_id'];
        $pro_cat=$row_pro['product_cat'];
        $pro_brand=$row_pro['product_brand'];
        $pro_title=$row_pro['product_title'];
        $pro_price=$row_pro['product_price'];
        $pro_image=$row_pro['product_image'];

        echo"
            <div id='single_product'>
                <h3>$pro_title</h3>
                <img src='admin_area/product_images/$pro_image' width='180' height='180'/>
                <h4><b>Price: ₹$pro_price</b></h4>
                <a href='details.php?pro_id=$pro_id'style='float:left'>Details</a>
                <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
            </div>
        ";
    }
    }
    
}

function getCatsPro(){
    if(isset($_GET['cat'])){
        $cat_id=$_GET['cat'];
    global $con;

    $get_pro= "select * from products where product_cat='$cat_id'";
    $run_pro= mysqli_query($con, $get_pro);
    $count_cats=mysqli_num_rows($run_pro);
    if($count_cats==0){ echo "<h2>There are no products in this category</h2>";}

    while($row_pro=mysqli_fetch_array($run_pro)){
        $pro_id=$row_pro['product_id'];
        $pro_cat=$row_pro['product_cat'];
        $pro_brand=$row_pro['product_brand'];
        $pro_title=$row_pro['product_title'];
        $pro_price=$row_pro['product_price'];
        $pro_image=$row_pro['product_image'];

        echo"
            <div id='single_product'>
                <h3>$pro_title</h3>
                <img src='admin_area/product_images/$pro_image' width='180' height='180'/>
                <h4><b>Price: ₹$pro_price</b></h4>
                <a href='details.php?pro_id=$pro_id'style='float:left'>Details</a>
                <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
            </div>
        ";
    }
    }
    
}

?>