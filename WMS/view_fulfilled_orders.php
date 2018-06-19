<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="8"><h2>View All Orders Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>Cart No.</th>
        <th>Customer Email</th>
		<th>Title</th>
		<th>Image</th>
		<th>Price</th>
		<th>Address</th>
        <th>Date</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_ord = "select * from orders where order_status='fulfilled'";
	
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

        $add_cus="select * from customers where customer_email='$ord_email'";
        $run_add=mysqli_query($con,$add_cus);
        $row_add=mysqli_fetch_array($run_add);
        $ord_add=$row_add['customer_address'];


	
	?>
	<tr align="center">
		<td><?php echo $ord_id;?></td>
		<td style="line-height:15px;"><?php echo $ord_email;?></td>
        <td style="line-height:15px;"><?php echo $ord_title;?></td>
		<td><img src="product_images/<?php echo $ord_img;?>" width="60" height="60"/></td>
		<td><?php echo "₹".$ord_price;?></td>
        <td><?php echo $ord_add;?></td>
        <td><?php echo $ord_date;?></td>
		
	
	</tr>
	<?php } ?>
</table>
