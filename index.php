<?php
session_start();
//CAnnot direct into index without clicking log out//
if(isset($_SESSION["uid"]))
{
	header("location:profile.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Home</title>
		<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<script src="pwdcheck.js"></script>
		<style>
			
.icon-size
{
	font-size:18px;
}
.icon-size1
{
	font-size:20px;
	cursor: pointer;
}
.icon-size1:hover
{
	color:#9d9597;
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
.panel-head
{
	border-color: gray;
	background-color: #ACB3B8;

}
#register1 .weak
{
	font-weight:bold;
	color:#FF0000;
	font-size:larger;
}
#register1 .good
{
	font-weight:bold;
	color:#057DFC;
	font-size:larger;
}
#register1 .strong
{
	font-weight:bold;
	color:#0BFF55;
	font-size:larger;
}
#register1 .toostrong
{
	font-weight:bold;
	color: #0ACA04;
	font-size:larger;
}
.scrollbar{
	overflow: auto;
	max-height: 500px;
	max-width: 600px;
	padding-right: 7px;
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
				<li><a href="faq.php"><span class="glyphicon glyphicon-info-sign icon-size"></span>FAQ's</a></li>
				<li><a href="aboutus.php"><span class="glyphicon glyphicon-question-sign icon-size"></span>AboutUs</a></li>
				<li><a href="vissionmission.php"><span class="glyphicon glyphicon-eye-open icon-size"></span>&nbspVision-Mission</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<!--<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart icon-size"></span>Cart<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3"><b>ID.No</b></div>
									<div class="col-md-3"><b>Product Image</b></div>
									<div class="col-md-3"><b>Product Name</b></div>
									<div class="col-md-3"><b>Price in Php.</b></div>
								</div>
							</div>
							<div class="panel-body"></div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>-->
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user icon-size"></span>SignIn</a>
					<ul class="dropdown-menu">
						<div style="width:250px;">
							<div class="panel panel-primary">
								<div class="panel-heading"><b>Login</b></div>
							</div>
								<div class="panel-body">
								<form action="login.php" method="post">
									<label for="email">Email:</label>
									<input type="email" id="email" class="form-control" name="email">
									<label for="password">Password:</label>
									<input type="password" id="password" class="form-control" name="password">
									<p></br></p>
									<input style="float:right;" type="submit" name="submit" value="Login" class="btn btn-danger">
								</form>
								</div> 
							
						</div>
						
					</ul>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span = class="glyphicon glyphicon-user icon-size"></span>SignUp</a>
					<ul class="dropdown-menu">
						<div style="width:255px;">
							<div class="panel panel-primary">
								<div class="panel-heading"><b>SignUp</b></div>
							</div>
								<div class="panel-body">
									<div class="scrollbar">
									<form action="signup.php" method="post" id="register1">
									<label for="firstname">Firstname:</label>
									<input type="text" id="firstname" class="form-control" name="firstname">
									<label for="lastname">Lastname:</label>
									<input type="text" id="lastname" class="form-control" name="lastname">
									<label for="email">Email:</label>
									<input type="email" id="email" class="form-control" name="email">
									
									<label for="password1">Password:</label>
									<input type="password" id="password1" class="form-control" name="password">
									<b style="color:#AFB5AD;">Password Strength:</b>&nbsp<span id="result" style="font-family: Arial;"></span><br><br>
									<label for="confirmpassword">Confirm Password:</label>
									<input type="password" id="confirmpassword" class="form-control" name="confirm">
									
									<label for="mobile">Mobile Number:</label>
									<input type="text" id="mobile" class="form-control" name="mobilenum" maxlength="11">
									<label for="address">Address1:</label>
									<input type="text" id="address" class="form-control" name="address">
									<label for="address">Address2:</label>
									<input type="text" id="address2" class="form-control" name="address2">
									<p></br></p>
									<input style="float:right;" type="submit" name="submit" value="Register" class="btn btn-danger">
									</form>
									</div>
								</div> 
							
						</div>
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
			<div class="col-md-2 col-xs-12">
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
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-head">
					<div class="panel-heading"><h3 style="font-family: arial black;"><center><img src="product_images/nike.png" style="width: 70px; height: 37px;"><img src="product_images/adidas.png" style="width: 70px; height: 37px;">&nbsp<img src="product_images/underarmour.png" style="width: 50px; height: 40px;"><img src="product_images/fredperry3.png" style="width: 70px; height: 40px;"><img src="product_images/v3.gif" style="width: 50px; height: 40px;"></center></h3></div>
					<div class="panel-body" style="background-color: #F8F9F9">
						<div id="get_product">
							<!--Heres on how to get the in table product jquery Ajax Request-->
						</div>
						<!--<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">product title</div>
								<div class="panel-body">
									product image
								</div>
								<div class="panel-heading">product price
									<button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
								</div>
							</div>
						</div> -->
					</div>
					<center><div class="panel-footer"><b style="font-family: forte; font-size:17px;">Follow us on:</b>
												   <img src="product_images/facebook.png" style="width: 28px;" class="icon-size1">&nbsp
												   <img src="product_images/twitter.png" style="width: 30px;" class="icon-size1">&nbsp
												   <img src="product_images/steam.png" style="width: 28px;" class="icon-size1">&nbsp
												   <img src="product_images/instagram.jpeg" style="width: 28px;" class="icon-size1">&nbsp
												   <img src="product_images/google.png" style="width: 28px;" class="icon-size1">
												   &nbsp&nbsp
												   <b style="font-family: forte; font-size:17px;">Payments:</b>
												   <img src="product_images/paypal.png" style="width: 40px;" class="icon-size1">&nbsp
												   <img src="product_images/visa.png" style="width: 65px;" class="icon-size1">&nbsp
												   <img src="product_images/american.jpg" style="width: 45px;" class="icon-size1">&nbsp
												   &nbsp&nbsp
												   <b style="font-family: forte; font-size:17px;">Couriers:</b>
												   <img src="product_images/lbc.jpg" style="width: 70px;">
												   <img src="product_images/jrs.png" style="width: 50px;">
												   <center>&copy;2017</center>

					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>
















































