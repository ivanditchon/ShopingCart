<?php
	include('db.php');

		$id = $_GET['id'];
		if(isset($_GET['id']))
		{	
			$qry = "DELETE FROM product WHERE product_id = '$id'";
			$sqry = mysqli_query($con,$qry);
			
			if($sqry)
			{	
				$img = $_GET['img'];
				unlink("product_images/".$img);
				echo "<script>window.open('adminpage.php','_self')</script>";
				
			}

			
		}




?>