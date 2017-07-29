<?php
	
	include('db.php');

	$id = $_GET['id'];
	if(isset($_POST['submit']))
	{
		$firstname = $_POST['firstname'];
		$lastname  = $_POST['lastname'];
		$email 	   = $_POST['email'];
		$password  = $_POST['pwd'];
		$address   = $_POST['address'];
		$mobile    = $_POST['mobile'];

		mysqli_query($con,"UPDATE user_info SET firstname 	 = '$_POST[firstname]', 
									   lastname  	 		 = '$_POST[lastname]', 
									   email 	  			 = '$_POST[email]', 
									   password              = '$_POST[pwd]', 
									   mobile  		         = '$_POST[mobile]', 
									   address 		         = '$_POST[address]',
									   address2 	         = '$_POST[address2]'  
									   WHERE user_id 	     = '$id'");
		echo "<script>alert('Successfuly Updated')</script>";

	}



?>


<!DOCTYPE>
<html>
<head>
	<title>Manage Customer</title>
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
</head>
<style type="text/css">

.icon-size{
	font-size:16px;

}

</style>	
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand"><span = class="glyphicon glyphicon-cog icon-size"><b>ADMIN_Engineering</b></a></span>
				<ul class="nav navbar-nav">
				<li><a href="adminpage.php"><span class="glyphicon glyphicon-home icon-size">Home</a></li></span>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user icon-size"></span>WELCOME:&nbsp<b>ADMIN</b></a>
					<ul class="dropdown-menu">
						<li><a href="logout.php" style="text-decoration:none">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<p></br></p>
	<p></br></p>
	<p></br></p>
	<center><div class="panel panel-info" style="width:280px;">
				<div class="panel panel-heading" style="font-family: cooper black; font-size: 30px;">Manage Customer Information</div>
					<div class="panel panel-body">
								<?php
								include('db.php');

								$id = $_GET['id'];
								if(isset($_GET['id']))
								{
									$sql = "SELECT * FROM user_info WHERE user_id = '$id'";
									$qry = mysqli_query($con,$sql);
							
								 	$row = mysqli_fetch_array($qry);
									
								
							  			$first_name 	= $row['firstname'];
							  			$last_name 		= $row['lastname'];
							  			$email 			= $row['email'];
							  			$password 		= $row['password'];
							  			$mobile_number  = $row['mobile'];
							  			$address 		= $row['address'];
							  			$address2 		= $row['address2'];
							  	
							  	?>
								<form action="" method="POST" enctype="multipart/form-data">
									<label for="firstname" style="float:left">Firstname:</label>
									<input type="text" id="firstname" class="form-control" name="firstname" value="<?php echo $first_name;?>" required>
									<label for="lastname" style="float:left">Lastname:</label>
									<input type="text" id="lastname" class="form-control" name="lastname" value="<?php echo $last_name;?>" required>
									<label for="emailadd" style="float:left">Email:</label>
									<input type="email" id="emailadd" class="form-control" name="email" value="<?php echo $email;?>" required> 
									<label for="pwd" style="float:left">Password:</label>
									<input type="text" name="pwd" id="pwd" class="form-control" value="<?php echo $password;?>" required>
									<label for="mobile" style="float:left">Mobile_number:</label>
									<input type="text" id="mobile" class="form-control" name="mobile" value="<?php echo $mobile_number;?>" required>
									<label for="address" style="float:left">Address:</label>
									<input type="text" id="address" class="form-control" name="address" value="<?php echo $address;?>" required>
									<label for="address2" style="float:left">Address2:</label>
									<input type="text" id="address2" class="form-control" name="address2" value="<?php echo $address2;?>" required>
									<p></br></p>
									<input style="float:right;" type="submit" name="submit" value="Update" class="btn btn-danger">
								</form>
								<?php } ?>
					</div>
			</div>
</center>
	
</body>
</html>

