<?php

session_start();
$user = $_SESSION['user'];

if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Profile</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<style>
			@media screen and (max-width:480px){
				#search{width:80%;}
				#search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}
			}
.icon-size
{
	font-size:18px;
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
	height: 550px;
	width: 380px;

}
.rangetxt{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<a href="#" class="navbar-brand"><img src="product_images/logo5.png" style="width: 100px; height: 37px;"></a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home icon-size"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window icon-size"></span>Product</a></li>
				<li><a href="faq.php"><span class="glyphicon glyphicon-info-sign icon-size"></span>FAQ</a></li>
				<li><a href="aboutus.php"><span class="glyphicon glyphicon-question-sign icon-size"></span>AboutUs</a></li>
				<li><a href="vissionmission.php"><span class="glyphicon glyphicon-eye-open icon-size"></span>&nbspVision-Mission</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3"><b>ID No.</b></div>
									<div class="col-md-3"><b>Product Image</b></div>
									<div class="col-md-3"><b>Product Name</b></div>
									<div class="col-md-3"><b>Price in php</b></div>
								</div>
							</div>
							<div class="panel-body">
								<div class="scrollbar">
								<div id="cart_product">
								</div>
								</div>
							</div>
							<!--<div class="panel-footer"></div>-->
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Welcome:&nbsp<b><?php echo $user; ?></b></a>
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration:none; color:black;"><span class="glyphicon glyphicon-shopping-cart">MyCart</a></li>
						<li class="divider"></li>
						<li><a href="" style="text-decoration:none; color:black;">Change Password</a></li>
						<li class="divider"></li>
						<li><a href="" style="text-decoration:none; color:black;">Manage Information</a></li>
						<li class="divider"></li>
						<li><a href="" style="text-decoration:none; color:black;">Settings</a></li>
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration:none; color:black;">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div>
		<ul>
			 <center><input type="text" class="form-control txtsearch btnsearch" id="search" placeholder="Search products..." required/>
			 <button class="btn btn-danger" id="search_btn">Search</button></center>
		</ul>

	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div id="get_category">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
				<div id="get_brand">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Brand</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
				<br>
						<label>Price Ranged:</label><br>
							
								<input type="text" id="min" class="rangetxt" style="width: 70px; height: 30px;">
								<p class="glyphicon glyphicon-minus"></p>
								<input type="text" id="max" class="rangetxt" style="width: 65px; height: 30px;" >
								<button id="range_btn"><span class="glyphicon glyphicon-play" style="color:green;"></span></button>
							
			</div>
			<div class="col-md-8">	
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-primary" id="scroll" style="border-color: gray;">
					<div class="panel-heading"><h3 style="font-family: arial black;">Products:</h3></div>
					<div class="panel-body">
						<div id="get_product">
							<!--Here we get product jquery Ajax Request-->
						</div>
						<!--<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Samsung Galaxy</div>
								<div class="panel-body">
									<img src="product_images/images.JPG"/>
								</div>
								<div class="panel-heading">$.500.00
									<button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
								</div>
							</div>
						</div> -->
					</div>
					<div class="panel-footer"><center>&copy; 2017</center></div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<center>
					<ul class="pagination" id="pageno">
						<li><a href="#">1</a></li>
					</ul>
				</center>
			</div>
		</div>
	</div>
</body>
</html>
















































