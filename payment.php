<!DOCTYPE HTML>
<head>
<title> Confirm payment page </title>
</head>
<body>
<h2> Pay Now with PayPal </h2>
<p style="text-align:center"><img src="images/paypal.jpg" width="300" height="200"/></p>
<form action="" method="post" >
<input type="submit" name="order_conf" value="Pay Now"/>
</form>



<?php

if(isset($_POST['order_conf'])){

    $ip=getIp();
    $cus_email=$_SESSION['customer_email'];
    $order_query="select * from cart where ip_add='$ip'";
    $run_query=mysqli_query($con,$order_query);
    while($row_order=mysqli_fetch_array($run_query)){
        $order_pro_id=$row_order['p_id'];
        
    $order_update="insert into orders (pro_id,cus_email,cus_ip,order_status) values ('$order_pro_id','$cus_email','$ip','pending')";
    $run_order=mysqli_query($con,$order_update);
    }
    $cart_empty="delete from cart";
    $run_empty=mysqli_query($con,$cart_empty);
    
    if($run_order AND $run_empty){
        echo "<script>alert('Payment Successful,Order confirmed!!')</script>";
        echo "<script>
         
            function Redirect() {
               window.location='index.php';
            }
            
            
            setTimeout('Redirect()', 100);
         
      </script>";
    }

}

?>
</body>
</html>