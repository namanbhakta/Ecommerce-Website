<table width="750" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="5"><h2>My Orders</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S No.</th>
		<th>Title</th>
		<th>Image</th>
		<th>Price</th>
        <th>Date</th>
		
	</tr>
	<?php 
	include("includes/db.php");
	$cus_email=$_SESSION['customer_email'];
	$get_ord = "select * from orders where cus_email='$cus_email'";
	
	$run_ord = mysqli_query($con, $get_ord); 
	
	$i = 0;
	
	while ($row_ord=mysqli_fetch_array($run_ord)){
		
		$ord_id = $row_ord['pro_id'];
		$ord_email = $row_ord['cus_email'];
		$ord_date = $row_ord['date'];
		$i++;

        $get_det="select * from products where product_id='$ord_id'";
        $run_det=mysqli_query($con,$get_det);
        while ($row_det=mysqli_fetch_array($run_det)){
        $ord_img=$row_det['product_image'];
        $ord_price=$row_det['product_price'];
        $ord_title=$row_det['product_title'];
        }

	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
        <td style="line-height:15px;"><?php echo $ord_title;?></td>
		<td><img src="../admin_area/product_images/<?php echo $ord_img;?>" width="60" height="60"/></td>
		<td><?php echo "₹".$ord_price;?></td>
        <td><?php echo $ord_date;?></td>
	
	</tr>
	<?php } ?>
</table>
