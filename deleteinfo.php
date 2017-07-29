<?php
	
	include('db.php');

		$did = $_GET['did'];
		if(isset($_GET['did']))
		{	
			$qry = "DELETE FROM user_info WHERE user_id = '$did'";
			$sqry = mysqli_query($con,$qry);
			
			if($sqry)
			{
				
				echo "<script>alert('Successfuly Deleted')</script>";
				echo "<script>window.open('adminpage.php','_self')</script>";
				
			}

			
		}


?>