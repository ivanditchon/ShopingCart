<?php

session_start();

if(!isset($_SESSION['admin']))
{
	header("location:index.php");
}
//if the user is in the profile page he cannot direct to the admin page//
if(isset($_SESSION['uid']))
{
	header("location:profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		
		

<style type="text/css">

.icon-size{
	font-size:16px;

}
.txtsearch
{
	width:300px;
	left:10px;
    right:10px;
	top:8px;
}
.btnsearch{
	background-image:url("search2.png");
 	background-position: 3px 0.5px;
  	background-repeat: no-repeat;
  	background-size: 10%;
  	padding-left: 35px;
}
.scrollbar{
	overflow: auto;
	max-height: 600px;
	max-width: 651px;
}


</style>	

</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand"><span = class="glyphicon glyphicon-cog icon-size"><b>ADMIN_Engineering</b></a></span>
				<ul class="nav navbar-nav">
				<li><a href="adminpage.php"><span class="glyphicon glyphicon-home icon-size">Home</a></li></span>
				<li><a href="addproducts.php"><span = class="glyphicon glyphicon-plus icon-size">Add_Products</a></span></li>

				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user icon-size">ManageCustomer_Information</span></a>
					<div class="dropdown-menu" style="width:900px;">
						<div class="panel panel-info">
					<div class="panel-heading"><h4><b>Customer Information:</b></h4></div>
					<div class="panel-body">
						<div class="col-md-15">
							<div class="panel panel-info">
							<?php 
							include('db.php');
							
							$sql = "SELECT * FROM user_info";
							$qry = mysqli_query($con,$sql);
							?>
								
								<table class="table table-striped">
								<tr class="active">
									<th><center>User ID #  &nbsp</th>
									<th><center>Firstname &nbsp</th> 
									<th><center>Lastname &nbsp</th>    
									<th><center>Email &nbsp</th>    
									<th><center>Password &nbsp</th>
									<th><center>Mobile Number &nbsp</th>	
									<th><center>Address &nbsp</th>
									<th colspan = 3><center>Action</center></th>
								</tr>
								
								<?php
								while($row=mysqli_fetch_array($qry))
									{ ?>
										<td><center><?php echo $row['user_id'];?></td>
										<td><center><?php echo $row['firstname'];?></td>
										<td><center><?php echo $row['lastname'];?></td>
										<td><center><?php echo $row['email'];?></td>
										<td><center><?php echo $row['password'];?></td>
										<td><center><?php echo $row['mobile'];?></td>
										<td><center><?php echo $row['address'];?></td>
										<td><a class='glyphicon glyphicon-pencil icon-size' style='color:green' 
										href='updateinfo.php?id=<?php echo $row['user_id'];?>'></a></td>
										<td><a class='glyphicon glyphicon-remove icon-size' style='color:red' href='deleteinfo.php?did=<?php echo $row['id']; ?>'></a></td>
										</tr>
								<?php } ?>
								
								</table>
								
							</div>
						</div>

					</div>
			
				</div>
					</div>
				</li>


				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user icon-size">CustomerCart_Information</span></a>
					<div class="dropdown-menu">
						<div class="panel panel-info" style="width: 680px;">
					<div class="panel-heading"><h4><b>Customer Cart:</b></h4></div>
					<div class="panel-body">
						<div class="col-md-15">

							<div class="panel panel-info">
							<?php 
							include('db.php');
							$sql = "SELECT * FROM cart";
							$qry = mysqli_query($con,$sql);
							?>
								<div class="scrollbar">
								<table class="table table-striped">
								<tr class="active">

									<th><center>Product ID &nbsp</th>
									<th><center>User ID &nbsp</th> 
									<th><center>Product Title &nbsp</th>    
									<th><center>Product Image &nbsp</th>    
									<th><center>Quantity &nbsp</th>
									<th><center>Price &nbsp</th>	
									<th><center>TotalAmount &nbsp</th>
								</tr>
								
								<?php
								while($row=mysqli_fetch_array($qry))
									{ ?>
										<td><center><?php echo $row['p_id'];?></td>
										<td><center><?php echo $row['user_id'];?></td>
										<td><center><?php echo $row['product_title'];?></td>
										<td><center><img src="<?php echo "product_images/".$row['product_image']?>" style="width:30px;"></td>
										<td><center><?php echo $row['qty'];?></td>
										<td><center><?php echo $row['price'];?></td>
										<td><center><?php echo $row['total_amt'];?></td>
										</tr>
								<?php } ?>
								
								</table>
								</div>
							</div>
						</div>
					</div>
			
				</div>
					</div>
					
				</li>



			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user icon-size"></span>WELCOME:&nbsp<b>ADMIN</b></a>
					<ul class="dropdown-menu">
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<p><br></p>
	<p><br></p>
	<p><br></p>
	<p><br></p>
	<div>
		<ul>
			 <center><input type="text" class="form-control txtsearch btnsearch" id="search1" placeholder="Search products..." required/>
			 <button class="btn btn-danger" id="search_btn1">Search</button></center>
		</ul>

	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div id="get_category1">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Clothes</a></li>
					<li><a href="#">Shoes</a></li>
					<li><a href="#">Cap</a></li>
					<li><a href="#">Pants</a></li>
				</div>-->
				<div id="get_brand1">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Brand</h4></a></li>
					<li><a href="#">Nike</a></li>
					<li><a href="#">Adidas</a></li>
					<li><a href="#">UnderArmour</a></li>
					<li><a href="#">FredPerry</a></li>
				</div>-->	
			</div>
			<div class="col-md-9">
				<div class="panel panel-info">
					<div class="panel-heading"><h3><b style="font-family: cooper black;">Products Information:</b></h3></div>
					<div class="panel-body">
						<div class="col-md-15">
							<div class="panel panel-info">
								<div id="get_product1">
								</div>
							</div>
						</div>
					</div>
			
				</div>
			</div>
			<div class="col-mid-1"></div>
				
				</div>
			</div>
		</div>
	</div>
</body>
</html>