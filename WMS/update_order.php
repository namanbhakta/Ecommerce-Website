<!DOCTYPE HTML>
<html>
<body>
<form action="" method="post" enctype="multipart/form-data"> 
 <input type='submit' name="fulfill" value='Fulfill Order'>

 </form>

 </body>
 </html>
 <?php
 include("includes/db.php");
 if(isset($_POST['fulfill'])){
	$pro_id1=$_GET['process_ord'];
	$cus_email=$_GET['cus_email'];
    $update_order="update orders set order_status='fulfilled' where pro_id='$pro_id1' and cus_email='$cus_email'";
	$run_query=mysqli_query($con,$update_order);
 if($run_query){
        echo "<script>alert('Order fulfilled!!')</script>";
		echo "<script>
         
            function Redirect() {
               window.location='view_orders.php';
            }
            
            
            setTimeout('Redirect()', 100);
         
      </script>";
        
    }
	
    }
?>